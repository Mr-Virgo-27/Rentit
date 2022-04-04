<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\History;
use App\Models\rentApplication;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::latest()->get();
        return view('index',[
            'cars' => $cars
        ]);
    }

    public function adminHome()
    {
        $histCount = History::count();
        $carHistory = History::latest()->paginate(3);
        $carTotal = Car::count();
        $cars = Car::latest()->get();
        $rents = rentApplication::latest()->get();
        return view('adminHome',[
            'rents' => $rents,
            'cars' => $cars,
            'carTotal' =>$carTotal,
            'carHistory' => $carHistory,
            'histCount' => $histCount,
        ]);
    }
}
