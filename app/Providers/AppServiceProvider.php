<?php

namespace App\Providers;

use App\Models\Link;
use App\Models\Location;
use App\Models\Service;
use Illuminate\pagination\paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        paginator::useBootStrap();

        view()
            ->composer(['ui_layout','website.inquiry'], function ($view) {
                $services = Service::take(10)->get();
                $locations = Location::take(10)->get();
                $links = Link::take(10)->get();
                $view->with(['services'=> $services ,'locations' => $locations , 'links' => $links]);
            });

    }
}
