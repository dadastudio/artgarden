@props(['quote' => '', 'quoteAuthor' => ''])
<x-ui.spacer class="xl:px-30 text-pretty bg-green-950 px-10 text-center text-white" py type="md">

	<p class="text-pretty text-2xl leading-tight md:text-3xl lg:text-4xl xl:text-[42px]">“{!! $quote !!}”</p>
	{{-- <p class="text-[34px] leading-tight md:text-4xl lg:text-5xl xl:text-6xl">“{!! $quote !!}”</p> --}}

	<p class="text-sm uppercase tracking-wider text-gray-100 lg:text-base">{{ $quoteAuthor }}</p>
</x-ui.spacer>
