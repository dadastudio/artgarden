<?php

use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>

<nav class="xl:h-42 md:backdrop-blur-xs h-34 relative z-10 flex items-center gap-x-6 border-b border-gray-200 px-6 max-lg:grid max-lg:grid-cols-2 md:h-28 md:justify-between">

	<a href="/" wire:navigate><img alt="ArtGardenLogo" class="flex-initial" src="{{ asset('img/logo.svg') }}"></a>

	<div class="flex h-full flex-row items-center uppercase tracking-wider text-gray-800 max-lg:hidden md:text-sm xl:text-base">

		<div class="flex h-full items-center border-l border-gray-200 lg:px-5 xl:px-10">
			<flux:button class="md:!text-sm xl:!text-base" href="{{ route('offer') }}" inset variant="ghost" wire:current="current" wire:navigate>Oferta</flux:button>
		</div>
		<div class="flex h-full items-center border-l border-gray-200 lg:px-5 xl:px-10">
			<flux:button class="md:!text-sm xl:!text-base" href="{{ route('work') }}" inset variant="ghost" wire:current="current" wire:navigate>Realizacje</flux:button>
		</div>
		<div class="flex h-full items-center border-l border-gray-200 lg:px-5 xl:px-10">
			<flux:button class="md:!text-sm xl:!text-base" href="{{ route('blog') }}" inset variant="ghost" wire:current="current" wire:navigate>Blog</flux:button>
		</div>
		<div class="flex h-full items-center border-l border-gray-200 lg:px-5 xl:px-10">
			<flux:button class="md:!text-sm xl:!text-base" href="{{ route('contact') }}" inset variant="ghost" wire:current="current" wire:navigate>Kontakt</flux:button>
		</div>
		<div class="flex h-full items-center border-l border-gray-200 lg:px-5 xl:px-10">

			<flux:button class="{{ app()->getLocale() === 'pl' ? 'current' : '' }} md:!text-sm xl:!text-base" href="{{ LaravelLocalization::getLocalizedURL('pl', null, [], true) }}" inset variant="ghost">PL</flux:button>
			&nbsp; / &nbsp;
			<flux:button class="{{ app()->getLocale() === 'en' ? 'current' : '' }} md:!text-sm xl:!text-base" href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}" inset variant="ghost">EN</flux:button>

		</div>
	</div>

	<div class="h-full text-sm uppercase tracking-wider text-gray-800 lg:hidden">

		<div class="flex h-full place-content-center items-center border-l border-gray-200 px-5 text-center lg:px-10">
			<a href="#">menu</a>
		</div>
	</div>
</nav>
