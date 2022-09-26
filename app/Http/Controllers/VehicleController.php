<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Page;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class VehicleController extends Controller
{

    protected function getMonthlyPayment($price, $interest, $period)
    {
        $p = $price;
        $i = $interest / 100 / 12;
        $n = $period;

        $monthlyPayment = $p * $i * (pow(1 + $i, $n)) / (pow(1 + $i, $n) - 1);
        return  number_format($monthlyPayment, 2);
    }

    protected function sendEmail($subject,$request){
        try {
            Mail::raw(json_encode($request->except('captchaResponse')), function ($message) use($subject) {
                $message->subject($subject);

                $message->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
    
                $message->to(env('ADMIN_EMAIL'));
            });
            return response()->json([
                "success"=>true
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                "success"=>false,
                "message"=>$th->getMessage()
            ]);
        }
    }

    public function show(Brand $brand, Vehicle $vehicle)
    {
        $page = Page::whereName('financing_calculator')->first();

        $defaultInterest = json_decode($page->attributes)->default_interest;
        $defaultPeriodPayment = json_decode($page->attributes)->default_period_payment_in_months;
        $monthlyPayment = $this->getMonthlyPayment($vehicle->price, $defaultInterest, $defaultPeriodPayment);
        $mediasGallery = count($vehicle->getMedia('pictures'))?$vehicle->getMedia('pictures')->map(function($m){
            return $m->getSrcset('vehicle-media');
        }):false;
        $image360 = count($vehicle->getMedia('three_sixty_image')) ? $vehicle->getFirstMedia('three_sixty_image') : false;

        return view('pages.stock-car-details', compact('vehicle', 'defaultInterest', 'defaultPeriodPayment', 'monthlyPayment','mediasGallery','image360'));
    }

    public function showBookTestDrive(Brand $brand, Vehicle $vehicle)
    {
        return view('pages.book-test-drive', compact('vehicle'));
    }

    public function showInquery(Brand $brand, Vehicle $vehicle)
    {
        return view('pages.inquery', compact('vehicle'));
    }
    
    public function showValueMyCar()
    {
        return view('pages.value-my-car');
    }

    public function postBookTestDrive(Request $request)
    {
        return $this->sendEmail('Book test drive',$request);   
    }
    
    
    public function postInquery(Request $request)
    {
        return $this->sendEmail('Inquery stock car',$request);
    }

    public function postValueMyCar(Request $request)
    {
        return $this->sendEmail('Value my car',$request);   
    }

}
