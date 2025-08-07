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

		Volt::route('/work', 'pages.work-page')->name('work');
		Volt::route('/work/{slug}', 'pages.work-show-page')->name('work.show');


		Volt::route('/contact', 'pages.contact-page')->name('contact');
		Volt::route('/offer', 'pages.offer-page')->name('offer');

		Volt::route("privacy", "pages.privacy-page")->name("privacy");
		Volt::route("terms", "pages.terms-page")->name("terms");
		Volt::route("cookies", "pages.cookies-page")->name("cookies");
		Volt::route("faq", "pages.faq-page")->name("faq");

	}
);


