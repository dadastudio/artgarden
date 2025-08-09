<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
Route::group(
	[
		'prefix' => LaravelLocalization::setLocale(),
		'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
	],
	function () {
		Volt::route('/', 'pages.index-page')->name('index');
		Volt::route('/blog', 'pages.blog-page')->name('blog');
		Volt::route('/blog/{slug}', 'pages.blog-show-page')->name('blog.show');

		Volt::route(LaravelLocalization::transRoute('routes.work'), 'pages.work-page')->name('work');
		Volt::route('/work/{slug}', 'pages.work-show-page')->name('work.show');


		Volt::route(LaravelLocalization::transRoute('routes.contact'), 'pages.contact-page')->name('contact');

		Volt::route(LaravelLocalization::transRoute('routes.offer-1'), 'pages.offer-page')->name('offer');
		Volt::route(LaravelLocalization::transRoute('routes.offer-2'), 'pages.offer-page')->name('offer-2');
		Volt::route(LaravelLocalization::transRoute('routes.offer-3'), 'pages.offer-page')->name('offer-3');




		Volt::route(LaravelLocalization::transRoute('routes.privacy'), "pages.privacy-page")->name("privacy");
		Volt::route(LaravelLocalization::transRoute('routes.terms'), "pages.terms-page")->name("terms");
		Volt::route(LaravelLocalization::transRoute('routes.cookies'), "pages.cookies-page")->name("cookies");
		Volt::route(LaravelLocalization::transRoute('routes.faq'), "pages.faq-page")->name("faq");


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


