<!DOCTYPE html>
<html lang="{{ LaravelLocalization::getCurrentLocale() }}">

<head>
	<meta charset="utf-8" />
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />

	<meta content="{{ csrf_token() }}" name="csrf-token" />
	{{-- @vite('resources/css/app.css') --}}
	@vite(['resources/css/app.css', 'resources/js/app.js'])

	<link href="https://fonts.googleapis.com" rel="preconnect">
	<link crossorigin href="https://fonts.gstatic.com" rel="preconnect">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

</head>

<body class="font-sans antialiased" data-route="{{ Route::currentRouteName() }}">

	<div class="fixed bottom-0 right-0 p-2 text-xs text-gray-500">
		<div class="hidden 2xl:block">2xl</div>
		<div class="hidden xl:max-2xl:block">xl</div>
		<div class="hidden lg:max-xl:block">lg</div>
		<div class="hidden md:max-lg:block">md</div>
		<div class="hidden sm:max-md:block">sm</div>
		<div class="block sm:hidden">base</div>

	</div>

	<div class="container mx-auto">
		{{-- <div class="container mx-auto px-4 sm:px-6 lg:px-8"> --}}

		@livewire('menu-bar')
		{{ $slot }}
		@livewire('footer')

	</div>
	@fluxScripts
</body>

</html>
