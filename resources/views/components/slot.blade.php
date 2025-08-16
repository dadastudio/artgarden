@props([
    'loop' => 1,
    'img' => '',
    'title' => '',
    'text' => '',
    'buttonText' => __('ui.know_more_btn'),
    'route' => 'index',
])

<div {{ $attributes->merge([
    'class' => '



border border-gray-200



',
]) }}>
	<x-ui.spacer class="flex h-full w-full flex-col p-5" type="xs">

		<img class="aspect-4/3 object-cover object-center" src="{{ $img }}">

		<h2 class="line-clamp-2 flex-1 text-pretty uppercase">{!! $title !!}</h2>

		<div class="line-clamp-3 text-[10px]/[14px] uppercase text-gray-700">{!! $text !!}</div>

		<p>&nbsp;</p>

		<flux:button class="flex-none place-self-start" href="{{ $route }}" icon:trailing="arrow" inset variant="ghost" wire:navigate>{!! $buttonText !!}</flux:button>
	</x-ui.spacer>
</div>
