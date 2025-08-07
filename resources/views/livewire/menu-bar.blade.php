<?php

use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>

<nav class="xl:h-42 md:backdrop-blur-xs h-34 relative z-10 flex items-center gap-x-6 border-b border-gray-200 px-6 max-lg:grid max-lg:grid-cols-2 md:h-28 md:justify-between">

	<img alt="ArtGardenLogo" class="flex-initial" src="{{ asset('img/logo.svg') }}">

	<div class="flex h-full flex-row items-center uppercase tracking-wider text-gray-800 max-lg:hidden md:text-sm xl:text-base">

		<div class="flex h-full items-center border-l border-gray-200 lg:px-5 xl:px-10"><a href="{{ route('offer') }}" wire:navigate>Oferta</a></div>
		<div class="flex h-full items-center border-l border-gray-200 lg:px-5 xl:px-10"><a href="{{ route('work') }}" wire:navigate>Realizacje</a></div>
		<div class="flex h-full items-center border-l border-gray-200 lg:px-5 xl:px-10"><a href="{{ route('blog') }}" wire:navigate>Blog</a></div>
		<div class="flex h-full items-center border-l border-gray-200 lg:px-5 xl:px-10"><a href="{{ route('contact') }}" wire:navigate>Kontakt</a></div>
		<div class="flex h-full items-center border-l border-gray-200 lg:px-5 xl:px-10"><a href="#">PL / EN</a></div>
	</div>

	<div class="h-full text-sm uppercase tracking-wider text-gray-800 lg:hidden">

		<div class="flex h-full place-content-center items-center border-l border-gray-200 px-5 text-center lg:px-10">
			<a href="#">menu</a>
		</div>
	</div>
</nav>
