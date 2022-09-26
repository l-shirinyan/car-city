<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Whitecube\NovaPage\Pages\Manager;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Manager $pages)
    {
        $pages->register('option', 'testimonials', \App\Nova\Templates\TestimonialsOptions::class);
        $pages->register('option', 'business_information', \App\Nova\Templates\BusinessInfoOptions::class);
        $pages->register('option', 'our_services', \App\Nova\Templates\OurServicesOptions::class);
        $pages->register('option', 'videos_carousel', \App\Nova\Templates\VideoCarouselOptions::class);
        $pages->register('option', 'bottom_section', \App\Nova\Templates\BottomSectionOptions::class);
        $pages->register('option', 'financing_calculator', \App\Nova\Templates\FinancingCalculatorOption::class);
    }
}
