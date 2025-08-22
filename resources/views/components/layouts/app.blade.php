<!DOCTYPE html>
<html lang="{{ LaravelLocalization::getCurrentLocale() }}">

<head>
	@metadata
	<meta charset="utf-8" />
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />

	<meta content="{{ csrf_token() }}" name="csrf-token" />

	{{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
	@vite(['resources/css/app.css'])

	<link href="https://fonts.googleapis.com" rel="preconnect">
	<link crossorigin href="https://fonts.gstatic.com" rel="preconnect">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

	<link href="/favicon-96x96.png" rel="icon" sizes="96x96" type="image/png" />
	<link href="/favicon.svg" rel="icon" type="image/svg+xml" />
	<link href="/favicon.ico" rel="shortcut icon" />
	<link href="/apple-touch-icon.png" rel="apple-touch-icon" sizes="180x180" />
	<meta content="ArtGarden" name="apple-mobile-web-app-title" />
	<link href="/site.webmanifest" rel="manifest" />

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

		@livewire('menu-bar')
		{{ $slot }}
		@livewire('footer')

	</div>
	@fluxScripts
</body>

</html>
