<?php

namespace App\Http\Controllers;

use App\Models\rentApplication;
use Illuminate\Http\Request;

class RentApplicationController extends Controller
{
    public function apply(Request $request)
    {
        $request->validate([
            'pickup_date' => 'required',
            'end_date' => 'required'
        ]);


        rentApplication::create([
            'user_id' => auth()->user()->id,
            'car_id' => $request->car_id,
            'pickup_date' => $request->pickup_date,
            'end_date' => $request->end_date,
        ]);


        session()->flash('message','You Have Applied Successfully.');
        return redirect()->route('cars')->with("message","Application Sent Successfully."); ;
    }
}
