@props(['quote' => '', 'quoteAuthor' => ''])
<x-ui.spacer class="xl:px-30 text-pretty bg-green-950 px-10 text-center text-white" py type="md">
	<p class="text-[34px] leading-tight md:text-4xl lg:text-5xl xl:text-6xl">“{!! $quote !!}”</p>
	<p class="text-xs uppercase tracking-wider text-gray-100">{{ $quoteAuthor }}</p>
</x-ui.spacer>
