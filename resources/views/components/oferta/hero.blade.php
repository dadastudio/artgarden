@props([
    'text' => '',
    'title' => '',
    'img' => '',
])

<div class="flex flex-col gap-x-6 gap-y-5 lg:flex-row">
	<div class="flex justify-center px-5 md:basis-2/3">

		<img class="border border-gray-100 p-5" src="/img/{{ $img }}">
	</div>
	<x-index.hero-text text="{!! $text !!}" title="{{ $title }}" />

</div>
