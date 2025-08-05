@props(['pt' => false, 'pb' => false, 'py' => false, 'type' => 'sm'])

@php

	$spaceY = [
	    'xl' => 'space-y-14 sm:space-y-16 md:space-y-20 lg:space-y-24 xl:space-y-28 2xl:space-y-40',

	    'lg' => 'space-y-10 sm:space-y-12 md:space-y-16 lg:space-y-20 xl:space-y-24 2xl:space-y-32',

	    'md' => 'space-y-6 sm:space-y-8 md:space-y-10 lg:space-y-12 xl:space-y-16 2xl:space-y-20',

	    'sm' => 'space-y-4 sm:space-y-5 md:space-y-5 lg:space-y-6 xl:space-y-7 2xl:space-y-8',

	    'xs' => 'space-y-3 sm:space-y-3 md:space-y-3 lg:space-y-3 xl:space-y-3 2xl:space-y-4',
	    'xxs' => 'space-y-[1px] sm:space-y-1 md:space-y-1 lg:space-y-2 xl:space-y-2 2xl:space-y-[1px]',

	    'grid' => 'space-y-2 sm:space-y-3 md:space-y-4 lg:space-y-5 xl:space-y-6 2xl:space-y-8',
	];

	$class = $spaceY[$type];

@endphp

<div {{ $attributes->merge([
    'class' => $class,
]) }}>

	@if ($pt or $py)
		<div class="before:content-['\00A0']"></div>
	@endif

	{{ $slot }}

	@if ($pb or $py)
		<div class="before:content-['\00A0']"></div>
	@endif
</div>
