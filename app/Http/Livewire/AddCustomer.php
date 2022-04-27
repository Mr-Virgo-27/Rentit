<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class AddCustomer extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $name,
    $email,
    $password,
    $User,
    $User_id;
    public $btn_nm = 'ADD';


    public function render()
    {
        $Users = User::latest()->paginate(6);
        return view('livewire.add-customer',[
            'Users' => $Users,
        ]);
    }



    public function create()
    {
        $this->resetInputFields();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields(){
        $this->name = '';
        $this->password = '';
        $this->email = '';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */



    protected $rules = [
        'name' => 'required|alpha|max:255',
        'password' => 'required|string|min:8',
        'email' => 'required|string|unique:users|max:255|email',
    ];

    public function store()
    {
        $this->validate([
            'name' => 'required|alpha|max:255',
            'password' => 'required|string|min:8',
            'email' => 'required|string|unique:users|max:255|email',
            ]);

        User::create([
            'name' => $this->name,
            'password' => Hash::make($this->password),
            'email' => $this->email,
        ]);


        session()->flash('message','User Added Successfully.');

        $this->resetInputFields();
        $this->btn_nm = 'ADD';
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        $User = User::findOrFail($id);
        $this->User_id = $id;
        $this->name = $User->name;
        $this->password = $User->password;
        $this->email = $User->email;
        $this->btn_nm = 'EDIT';
    }


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        User::find($id)->delete();
        session()->flash('deleted', 'User has been Deleted Successfully.');
    }


    public function modify()
    {
        $this->validate([
        'name' => 'required|alpha|max:255',
        'password' => 'required|string|min:8',
        'email' => 'required|string|max:255|email',
        ]);

        $User = User::find($this->User_id);
            $User->name = $this->name;
            $User->password = $this->password;
            $User->email = $this->email;
            $User->save();


        session()->flash('changed',
            $this->id ? 'User Info Updated Successfully.' : 'User Info Updated Successfully.');

        $this->resetInputFields();
        $this->btn_nm = 'ADD';
    }
}
