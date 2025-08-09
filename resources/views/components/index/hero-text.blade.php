@props([
    'title' => '',
    'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam nec metus vel ante bibendum facilisis.',
    'buttonText' => '',
    'invert' => false,
])

{{-- <div class="backdrop-blur-xs max-md:hiddens flex basis-1/4 items-end px-5 text-left"> --}}
<div class="right-15 bottom-5 max-lg:px-5 max-lg:py-5 lg:absolute">

	<x-ui.spacer>

		<div>
			<img src="/img/up_rect.svg" />
			<h1 class="{{ $invert ? 'text-white' : '' }} text-pretty">{{ $title }}</h1>
		</div>

		<div class="prose prose-sm {{ $invert ? 'prose-invert' : '' }} relative lg:max-w-[325px]">
			{!! $text !!}
			<img class="absolute -bottom-6 right-0 rotate-180" src="/img/up_rect.svg" />
		</div>

		<p class="max-xl:hidden">&nbsp;</p>

		@if ($buttonText)
			<flux:button class="{{ $invert ? '!text-white' : '' }} mb-3" href="{{ route('index') }}" icon:trailing="arrow" inset variant="subtle">{!! $buttonText !!}</flux:button>
		@endif
	</x-ui.spacer>
</div>
