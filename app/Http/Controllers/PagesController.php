<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\rentApplication;
use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only('member','details','more-details');
    }

    public function index(){
        $cars = Car::latest()->paginate(6);
        return view('index',[
            'cars' => $cars
        ]);
    }

    public function cars(){
        $cars = Car::latest()->paginate(6);
        return view('cars',[
            'cars' => $cars
        ]);
    }

    public function member(){
            $user = auth()->user();
            $carHistory = $user->app_history;
            $rents = $user->rent_application;
            if ($rents->isEmpty()) {
                return view('userHome',[
                    'rents' => $rents,
                    'carHistory' => $carHistory,
                ]);
            }
            if(!$carHistory->isEmpty()){
                return view('userHome',[
                    'rents' => $rents,
                    'carHistory' => $carHistory,
                ]);
            }
            return view('userHome',[
                'rents' => $rents,
                'carHistory' => $carHistory
            ]);
    }

    public function about(){
        return view('about-us');
    }

    public function terms(){
        return view('terms');
    }

    public function contact(){
        return view('contact');
    }

    public function details($id){
        $rents = rentApplication::where('car_id', $id)
        ->where('user_id', auth()->user()->id)
        ->first();
        // dd($rents);
        // $rentInstance = new rentApplication;
        // dd($rentInstance->users());

        // if () {
        //     # code...
        // }
        $cars = Car::find($id);

        if (isset($rents->car_id)) {
            if ($cars->id !== $rents->car_id) {
                return view('car-details',[
                    'cars' => $cars,
                ]);
            }
        }else {
            return view('car-details', [
                'cars' => $cars
            ]);
        }

        return redirect()->back()->with('message', 'error....');
    }


    public function moreDetails($id){
        $cars = Car::find($id);
        $rents = rentApplication::where('car_id', $id)
        ->first();
            return view('more-details', [
                'rents' => $rents,
                'cars' =>$cars
            ]);

        return redirect()->back()->with('message', 'error....');
    }

    public function add(){
        return view('liveView.vehcs');
    }
    public function addNew(){
        return view('liveView.addCustomer');
    }
}
