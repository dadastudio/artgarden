<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use Livewire\Livewire;

Route::group(
	[
		'prefix' => LaravelLocalization::setLocale(),
		'middleware' => ['localize', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
	],
	function () {
		Volt::route('/', 'pages.index-page')->name('index');
		Volt::route('/blog', 'pages.blog-page')->name('blog');
		Volt::route(LaravelLocalization::transRoute('routes.post'), 'pages.post-page')->name('post');

		Volt::route(LaravelLocalization::transRoute('routes.work'), 'pages.works-page')->name('works');


		Volt::route(LaravelLocalization::transRoute('routes.contact'), 'pages.contact-page')->name('contact');


		Volt::route(LaravelLocalization::transRoute('routes.offer'), 'pages.offer-page')->name('offer');



		Volt::route(LaravelLocalization::transRoute('routes.privacy'), "pages.privacy-page")->name("privacy");
		Volt::route(LaravelLocalization::transRoute('routes.terms'), "pages.terms-page")->name("terms");
		Volt::route(LaravelLocalization::transRoute('routes.cookies'), "pages.cookies-page")->name("cookies");
		Volt::route(LaravelLocalization::transRoute('routes.faq'), "pages.faq-page")->name("faq");

		Livewire::setUpdateRoute(function ($handle) {
			return Route::post('/livewire/update', $handle);
		});
		// katalog do pobrania
	
		Route::get('download', function () {
			// $filePath = storage_path('app/public/' . $file);
			$filePath = storage_path('app/public/katalog.pdf');

			if (file_exists($filePath)) {
				return response()->download($filePath);
			}
			return redirect()->back()->with('error', 'File not found');
		})->name('download');

	}
);


