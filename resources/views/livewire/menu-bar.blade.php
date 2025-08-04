<?php

use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>

<nav class="h-42 flex items-center justify-between border-b border-stone-200">

	<img alt="Logo" src="{{ asset('img/logo.svg') }}">

	<div class="flex h-full flex-row items-center uppercase tracking-wider text-stone-800">

		<div class="flex h-full items-center border-l border-stone-200 px-10"><a href="{{ route('index') }}">Oferta</a></div>
		<div class="flex h-full items-center border-l border-stone-200 px-10"><a href="{{ route('index') }}">Realizacje</a></div>
		<div class="flex h-full items-center border-l border-stone-200 px-10"><a href="{{ route('index') }}">Blog</a></div>
		<div class="flex h-full items-center border-l border-stone-200 px-10"><a href="{{ route('index') }}">Kontakt</a></div>
		<div class="flex h-full items-center border-l border-stone-200 px-10"><a href="{{ route('index') }}">PL / EN</a></div>
	</div>

</nav>
