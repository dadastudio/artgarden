@props([
    'text' => '',
    'title' => '',
    'img' => '',
])

<div class="relative flex-row lg:flex">

	<div class="2xl:w-75/100 xl:w-70/100 lg:w-63/100 flex flex-row px-5 md:w-full lg:px-16 lg:py-10 xl:px-20">
		<img class="max-h-max w-full border border-gray-100 p-5" src="/img/{{ $img }}">

	</div>

	<x-index.hero-text text="{!! $text !!}" title="{{ $title }}" />

</div>
