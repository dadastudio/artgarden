<!DOCTYPE html>
<html data-theme="mydark" lang="{{ LaravelLocalization::getCurrentLocale() }}">
{{-- <html :class="dark ? 'dark' : ''" lang="{{ LaravelLocalization::getCurrentLocale() }}" x-bind:data-theme="dark ? 'mydark' : 'mylight'" x-cloak x-data="{ dark: true }" x-ref="htmlElement"> --}}

<head>
	<meta charset="utf-8" />
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="{{ csrf_token() }}" name="csrf-token" />
	@vite('resources/css/app.css')
	<link href="https://fonts.googleapis.com" rel="preconnect">
	<link crossorigin href="https://fonts.gstatic.com" rel="preconnect">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

</head>

<body class="font-sans antialiased" data-route="{{ Route::currentRouteName() }}">

	<div class="container mx-auto px-4 sm:px-6 lg:px-8">

		@livewire('menu-bar')
		{{ $slot }}
		@livewire('footer')

	</div>

</body>

</html>
