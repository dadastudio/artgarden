<?php

namespace App\Providers;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;

use Illuminate\Support\ServiceProvider;
use Mcamara\LaravelLocalization\Traits\LoadsTranslatedCachedRoutes;

class AppServiceProvider extends ServiceProvider
{

	use LoadsTranslatedCachedRoutes;

	/**
	 * Register any application services.
	 */
	public function register(): void
	{
		//
	}

	/**
	 * Bootstrap any application services.
	 */
	public function boot(): void
	{
		//

		RouteServiceProvider::loadCachedRoutesUsing(fn() => $this->loadCachedRoutes());


	}
}
