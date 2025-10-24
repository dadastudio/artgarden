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

		// Load translated cached routes for Laravel Localization (Laravel 11+)
		// Required for 'php artisan route:trans:cache' to work correctly
		// Uses LoadsTranslatedCachedRoutes trait to handle localized route caching
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
