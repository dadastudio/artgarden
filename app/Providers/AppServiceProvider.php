<?php

namespace App\Providers;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;

use Illuminate\Support\ServiceProvider;
use Mcamara\LaravelLocalization\Traits\LoadsTranslatedCachedRoutes;
use BezhanSalleh\FilamentLanguageSwitch\LanguageSwitch;

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
		LanguageSwitch::configureUsing(function (LanguageSwitch $switch) {
			$switch
				->locales(['pl', 'en'])

				->labels([
					'pl' => 'Polski',
					'en' => 'English',
					// Other custom labels as needed
				]);
		});


	}
}
