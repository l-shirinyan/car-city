<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Page;
use App\Models\Vehicle;
use App\Models\VehicleModel;
use Illuminate\Http\Request;
use Whitecube\NovaPage\Pages\Manager;

class HomeController extends Controller
{
    public function show(Manager $page)
    {

        $featuredCars = Vehicle::featured()->get()->pluck('card');
        
        return view('pages.home', [
            'carModelsAvailable' => $page->option('business_information')->cars_model_available,
            'yearsInBusiness'=> $page->option('business_information')->years_in_business,
            'brandsToSelect' => Brand::with('vehicleModels')->get(),
            'featuredCars' => $featuredCars
        ]);
    }
}
