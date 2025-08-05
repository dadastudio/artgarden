<?php

use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>

<nav class="h-30 lg:h-42 relative z-10 flex items-center gap-x-6 border-b border-gray-200 max-sm:grid max-sm:grid-cols-2 sm:justify-between sm:px-8">

	<img alt="ArtGardenLogo" class="flex-initial" src="{{ asset('img/logo.svg') }}">

	<div class="flex h-full flex-row items-center text-sm uppercase tracking-wider text-gray-800 max-sm:hidden lg:text-base">

		<div class="flex h-full items-center border-l border-gray-200 px-5 lg:px-10"><a href="{{ route('index') }}" wire:navigate>Oferta</a></div>
		<div class="flex h-full items-center border-l border-gray-200 px-5 lg:px-10"><a href="{{ route('index') }}" wire:navigate>Realizacje</a></div>
		<div class="flex h-full items-center border-l border-gray-200 px-5 lg:px-10"><a href="{{ route('index') }}" wire:navigate>Blog</a></div>
		<div class="flex h-full items-center border-l border-gray-200 px-5 lg:px-10"><a href="{{ route('index') }}" wire:navigate>Kontakt</a></div>
		<div class="flex h-full items-center border-l border-gray-200 px-5 lg:px-10"><a href="{{ route('index') }}" wire:navigate>PL / EN</a></div>
	</div>

	<div class="h-full text-sm uppercase tracking-wider text-gray-800 sm:hidden">

		<div class="flex h-full place-content-center items-center border-l border-gray-200 px-5 text-center lg:px-10">
			<a href="#">menu</a>
		</div>
	</div>
</nav>
