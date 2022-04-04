<?php

namespace App\Http\Livewire;

use App\Models\Car;
use Livewire\WithPagination;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddCars extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $vehicle_type,
    $model,
    $brand,
    $location,
    $color,
    $fuel,
    $image_path,
    $mileage,
    $doors,
    $number_of_seats,
    $price,
    $gearbox,
    $year,
    $Car,
    $Car_id;
    public $btn_nm = 'Create';


    public function render()
    {
        $Cars = Car::latest()->paginate(6);
        return view('livewire.add-cars',[
            'Cars' => $Cars,
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
        $this->vehicle_type = '';
        $this->color = '';
        $this->brand = '';
        $this->location = '';
        $this->image_path = '';
        $this->fuel = '';
        $this->model = '';
        $this->mileage = '';
        $this->doors = '';
        $this->number_of_seats = '';
        $this->price = '';
        $this->gearbox = '';
        $this->year = '';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {
        $this->validate([
            'vehicle_type' => 'required',
            'color' => 'required',
            'brand' => 'required',
            'fuel' => 'required',
            'image_path' => 'required|mimes:jpg, png, jpeg',
            'location' => 'required',
            'model' => 'required',
            'mileage' => 'required',
            'doors' => 'required',
            'number_of_seats' => 'required',
            'price' => 'required',
            'gearbox' => 'required',
            'year' => 'required',
        ]);
        $fileName = $this->image_path->getClientOriginalName();
        $this->image_path->storeAs('uploaded',$fileName,'public');
        Car::create([
            'vehicle_type' => $this->vehicle_type,
            'color' => $this->color,
            'brand' => $this->brand,
            'location' => $this->location,
            'fuel' => $this->fuel,
            'image_path' => $fileName,
            'model' => $this->model,
            'mileage' => $this->mileage,
            'doors' => $this->doors,
            'number_of_seats' => $this->number_of_seats,
            'price' => $this->price,
            'gearbox' => $this->gearbox,
            'year' => $this->year,
        ]);


        session()->flash('message','Car Added Successfully.');

        $this->resetInputFields();
        $this->btn_nm = 'Create';
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        $Car = Car::findOrFail($id);
        $this->Car_id = $id;
        $this->vehicle_type = $Car->vehicle_type;
        $this->color = $Car->color;
        $this->brand = $Car->brand;
        $this->location = $Car->location;
        $this->fuel = $Car->fuel;
        $this->image_path = $Car->image_path;
        $this->model = $Car->model;
        $this->mileage = $Car->mileage;
        $this->doors = $Car->doors;
        $this->number_of_seats = $Car->number_of_seats;
        $this->price = $Car->price;
        $this->gearbox = $Car->gearbox;
        $this->year = $Car->year;
        $this->btn_nm = 'Edit';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        Car::find($id)->delete();
        session()->flash('deleted', 'Car has been Deleted Successfully.');
    }


    public function modify()
    {
        $this->validate([
            'vehicle_type' => 'required',
            'color' => 'required',
            'brand' => 'required',
            'location' => 'required',
            'image_path' => 'required',
            'fuel' => 'required',
            'model' => 'required',
            'mileage' => 'required',
            'doors' => 'required',
            'number_of_seats' => 'required',
            'price' => 'required',
            'gearbox' => 'required',
            'year' => 'required',
        ]);

        $Car = Car::find($this->Car_id);
            $Car->vehicle_type = $this->vehicle_type;
            $Car->location = $this->location;
            $Car->brand = $this->brand;
            $Car->image_path = $this->image_path;
            $Car->fuel = $this->fuel;
            $Car->color = $this->color;
            $Car->model = $this->model;
            $Car->mileage = $this->mileage;
            $Car->doors = $this->doors;
            $Car->number_of_seats = $this->number_of_seats;
            $Car->price = $this->price;
            $Car->gearbox = $this->gearbox;
            $Car->year = $this->year;
            $Car->save();


        session()->flash('changed',
            $this->id ? 'Car Info Updated Successfully.' : 'Car Info Updated Successfully.');

        $this->resetInputFields();
        $this->btn_nm = 'Create';
    }
}
