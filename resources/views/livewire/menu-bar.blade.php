<?php

use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>

<nav class="h-42 relative z-10 flex items-center justify-between border-b border-gray-200 px-8">

	<img alt="Logo" src="{{ asset('img/logo.svg') }}">

	<div class="flex h-full flex-row items-center uppercase tracking-wider text-gray-800">

		<div class="flex h-full items-center border-l border-gray-200 px-10"><a href="{{ route('index') }}">Oferta</a></div>
		<div class="flex h-full items-center border-l border-gray-200 px-10"><a href="{{ route('index') }}">Realizacje</a></div>
		<div class="flex h-full items-center border-l border-gray-200 px-10"><a href="{{ route('index') }}">Blog</a></div>
		<div class="flex h-full items-center border-l border-gray-200 px-10"><a href="{{ route('index') }}">Kontakt</a></div>
		<div class="flex h-full items-center border-l border-gray-200 px-10"><a href="{{ route('index') }}">PL / EN</a></div>
	</div>

</nav>
