<?php

namespace App\Http\Livewire;

use App\Models\History;
use App\Models\rentApplication;
use Livewire\Component;

class UpdateStatus extends Component
{
    public $getStatus;
    public function render()
    {
        $history = History::latest()->get();
        $rents = rentApplication::latest()->get();
        return view('livewire.update-status',[
            'rents' => $rents,
            'history' => $history
        ]);
    }

    public function approve($id,$car_id){
        $rentStat = rentApplication::where('user_id','=',$id)->where('car_id','=',$car_id)->get()->first();
        $rentStat->status = 'Approved';
        $rentStat->save();
    }

    public function deny($id,$car_id){
        $rentStat = rentApplication::where('user_id','=',$id)->where('car_id','=',$car_id)->get()->first();
        $rentStat->status = 'Denied';
        $history = History::create([
            'user_id' => $rentStat->user_id,
            'car_id' => $rentStat->car_id,
            'pickup_date' => $rentStat->pickup_date,
            'end_date' => $rentStat->end_date,
            'status' => 'Denied'
        ]);
        $rentStat->delete();
    }

    public function bringIn($id,$car_id){
        $rentStat = rentApplication::where('user_id','=',$id)->where('car_id','=',$car_id)->get()->first();
        $history = History::create([
        'user_id' => $rentStat->user_id,
        'car_id' => $rentStat->car_id,
        'pickup_date' => $rentStat->pickup_date,
        'end_date' => $rentStat->end_date,
        'status' => 'Returned'
        ]);
        $rentStat->delete();
    }

    public function remove($id){
        rentApplication::find($id)->delete();
        session()->flash('deleted', 'Application has been Deleted Successfully.');
    }
}
