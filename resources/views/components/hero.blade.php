@props([
    'text' => '',
    'title' => '',
    'href' => '#',
    'is_left' => true,
    'buttonText' => '',
    'heroImg' => '',
    'imgFull' => true,
])

<div {{ $attributes->merge([
    'class' => 'relative ',
]) }}>

	@if ($imgFull)
		{{ $heroImg->getFirstMedia()->img('hero')->attributes(['class' => 'hidden sm:block']) }}

		{{ $heroImg->getFirstMedia('mobile')->img('hero_mobile')->attributes(['class' => 'sm:hidden']) }}
	@else
		{{-- <div class="2xl:w-75/100 xl:w-70/100 lg:w-63/100 flex flex-row px-5 md:w-full lg:px-16 lg:py-10 xl:px-20">
			<img class="max-h-max w-full border border-gray-100 p-5" src="/img/{{ $img }}">

		</div> --}}
		<div class="2xl:w-75/100 xl:w-70/100 lg:w-63/100 flex flex-row px-5 md:w-full lg:px-16 lg:py-10 xl:px-20">
			{{ $heroImg->getFirstMedia()->img('main')->attributes(['class' => 'max-h-max w-full border border-gray-100 p-5']) }}
		</div>
	@endif

	<x-index.hero-text :$buttonText :$href :$is_left :$text :$title />

</div>
