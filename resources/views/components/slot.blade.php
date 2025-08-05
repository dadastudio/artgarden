@props(['img' => '', 'title' => '', 'text' => ''])
<x-ui.spacer {{ $attributes->merge(['class' => 'border border-gray-300 p-5']) }} type="xs">

	<div class="aspect-4/3 overflow-hidden">
		<img alt="Hero" class="w-full object-cover" src="/img/{{ $img }}">
	</div>

	<h2 class="uppercase">{!! $title !!}</h2>
	<p class="prose text-[10px]/[14px] uppercase text-gray-700">{{ $text }}</p>

	<a class="btn" href="{{ route('index') }}">dowiedz się więcej</a>

</x-ui.spacer>
