@props([
    'title' => '',
    'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam nec metus vel ante bibendum facilisis.',
    'buttonText' => '',
    'href' => route('index'),
    'is_left' => false,
    'invert' => false,
])

<div class="{{ $is_left ? 'left-10' : 'right-15' }} bottom-5 max-lg:px-5 max-lg:py-5 lg:absolute">

	<x-ui.spacer>

		<div class="lg:max-w-[325px]">
			<img src="/img/up_rect.svg" />
			<h1 class="{{ $invert ? 'text-white' : '' }} text-pretty">{!! $title !!}</h1>
		</div>

		<div class="prose prose-sm {{ $invert ? 'prose-invert' : '' }} relative lg:max-w-[325px]">
			{!! $text !!}
			{{ $slot }}
			<img class="absolute -bottom-4 right-0 rotate-180" src="/img/up_rect.svg" />
		</div>

		<p class="max-xl:hidden">&nbsp;</p>

		@if ($buttonText)
			<flux:button class="{{ $invert ? '!text-white' : '' }} mb-3" href="{{ $href }}" icon:trailing="arrow" inset variant="subtle" wire:navigate>{!! $buttonText !!}</flux:button>
		@endif
	</x-ui.spacer>
</div>
