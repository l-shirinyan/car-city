<?php

use App\Http\Controllers\{BrandController, PositionController, HomeController, ContactController, VehicleController};
use App\Nova\Templates\{About, Bodyshop, Faq, Contact, Recalls, Brands, CarFinance, PositionsIndex, Home, PartAccessories, ScheduleService};
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'show'])->template(Home::class)->name('home');
Route::get('/positions', [PositionController::class, 'index'])->template(PositionsIndex::class)->name('positions');
Route::get('/contact', [ContactController::class, 'show'])->template(Contact::class)->name('contact');
Route::get('/value-my-car', [VehicleController::class, 'showValueMyCar'])->name('show-vehicle-value-my-car');
Route::get('/faq', function () {return view('pages.faq');})->template(Faq::class)->name('faq');
Route::get('/part-accessories', function () {return view('pages.part-accessories');})->template(PartAccessories::class)->name('part-accessories');
Route::get('/recalls', function () {return view('pages.recalls');})->template(Recalls::class)->name('recalls');
Route::get('/about-us', function () {return view('pages.about');})->template(About::class)->name('about');
Route::get('/car-finance', function () {return view('pages.car-finance');})->template(CarFinance::class)->name('car-finance');
Route::get('/bodyshop', function () {return view('pages.bodyshop');})->template(Bodyshop::class)->name('bodyshop');
Route::get('/schedule-service', function () {return view('pages.schedule-service');})->template(ScheduleService::class)->name('schedule-service');
Route::get('/inventory', function () { return view('pages.inventory'); });
Route::get('/model', function () { return view('pages.model'); });

Route::get('/{brand:slug}', [BrandController::class, 'show'])->template(Brands::class)->name('brands');
Route::get('/{brand:slug}/showroom', [BrandController::class, 'showroom'])->name('brands-showroom');
Route::get('/{brand:slug}/{vehicle:slug}', [VehicleController::class, 'show'])->name('vehicle-show');
Route::get('/{brand:slug}/{vehicle:slug}/book-test-drive', [VehicleController::class, 'showBookTestDrive'])->name('show-vehicle-book-test-drive');
Route::get('/{brand:slug}/{vehicle:slug}/inquery', [VehicleController::class, 'showInquery'])->name('show-vehicle-inquery');

Route::middleware('recaptcha')->group(function(){
    Route::prefix('/form')->group(function(){
        Route::post('/book-test-drive',[VehicleController::class,'postBookTestDrive'])->name('post-vehicle-book-test-drive');
        Route::post('/inquery',[VehicleController::class,'postInquery'])->name('post-vehicle-inquery');
        Route::post('/value-my-car',[VehicleController::class,'postValueMyCar'])->name('post-vehicle-value-my-car');
    });
});
