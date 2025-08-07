@props(['img' => '', 'title' => '', 'text' => ''])
<x-ui.spacer {{ $attributes->merge(['class' => 'w-full border-l border-gray-300 p-5']) }} type="xs">

	<div class="aspect-4/3 overflow-hidden">
		<img class="w-full object-cover" src="/img/{{ $img }}">
	</div>

	<h2 class="truncate text-pretty uppercase">{!! $title !!}</h2>
	<p class="prose line-clamp-4 text-[10px]/[14px] uppercase text-gray-700">{{ $text }}</p>
	<p>&nbsp;</p>
	<flux:button href="{{ route('index') }}" icon:trailing="arrow" inset variant="ghost"><span class="hidden lg:inline">dowiedz się </span>więcej</flux:button>
</x-ui.spacer>
