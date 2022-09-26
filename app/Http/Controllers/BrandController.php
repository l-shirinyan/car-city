<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Whitecube\NovaPage\Pages\Manager;

class BrandController extends Controller
{

    public function show(Manager $page, Brand $brand)
    {
        $featured =  $brand->vehicles()->featured()->get()->pluck('card');

        return view('pages.brand', [
            'carModelsAvailable'=>$page->option('business_information')->cars_model_available,
            'yearsInBusiness'=>$page->option('business_information')->years_in_business,
            'brandsToSelect' => Brand::with('vehicleModels')->get(),
            'brand' => $brand,
            'featured' => $featured
        ]);
    }

    public function showroom(Brand $brand)
    {
        return view('pages.showroom', [
            'brand' => $brand
        ]);
    }
}
