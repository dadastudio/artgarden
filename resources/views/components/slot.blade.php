@props([
    'loop' => 1,
    'img' => '',
    'title' => '',
    'text' => '',
    'buttonText' => '<span class="hidden lg:inline">dowiedz się </span>więcej',
    'route' => 'index',
])

<div {{ $attributes->merge([
    'class' => '

@if ($loop > 1)
-ml-pxs
@endif


border border-gray-300',
]) }}>
	<x-ui.spacer class="flex h-full flex-col p-5" type="xs">

		<div class="aspect-4/3 flex-none overflow-hidden">
			<img class="w-full object-cover" src="https://picsum.photos/400/300?random={{ $loop }}">
		</div>

		<h2 class="flex-1 truncate text-pretty uppercase">{!! $title !!}</h2>
		<p class="prose line-clamp-4 flex-1 text-[10px]/[14px] uppercase text-gray-700">{!! $text !!}</p>
		<p>&nbsp;</p>

		<flux:button class="flex-none place-self-start" href="{{ $route }}" icon:trailing="arrow" inset variant="ghost" wire:navigate>czytaj więcej</flux:button>
	</x-ui.spacer>
</div>
