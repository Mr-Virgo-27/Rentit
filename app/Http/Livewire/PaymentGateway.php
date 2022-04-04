<?php

namespace App\Http\Livewire;

use App\Models\Car;
use App\Models\rentApplication;
use Livewire\Component;
use Livewire\WithPagination;

class PaymentGateway extends Component
{
    use WithPagination;
    public $cardNum,
    $car_id;


    public function render()
    {
        $rents = rentApplication::latest()->paginate(4);
        return view('livewire.payment-gateway',[
            'rents' => $rents
        ]);
    }

    public function pay($id){
        if ($this->cardNum != '') {
            $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://10.47.12.26:8001/api/payment',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array('card_nm' => $this->cardNum),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    // echo $response;
    $req = json_decode($response,true);
    if (isset($req['success'])) {
        rentApplication::where('car_id',$id)->update(['status' => 'Rented']);
        $this->anything();
    }
    if(isset($req['error'])){
        $this->addError('InvalidCard', 'The Entered Card Number is invalid.');
    }
        }
    }

    public function anything(){
        return redirect()->back()->with('message','Payment Was Successfull');
    }
}
