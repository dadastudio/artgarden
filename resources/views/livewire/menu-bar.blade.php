<?php

use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>

<nav class="container inset-x-0 z-50 mx-auto">

	<div class="xl:h-42 md:backdrop-blur-xs h-34 relative z-50 flex items-center gap-x-6 border-b border-gray-200 px-6 max-lg:grid max-lg:grid-cols-2 md:h-28 md:justify-between">
		<a href="/" wire:navigate><img alt="ArtGardenLogo" class="flex-initial" src="{{ asset('img/logo.svg') }}"></a>

		<div class="flex h-full flex-row items-center uppercase tracking-wider text-gray-800 max-lg:hidden md:text-sm xl:text-base">

			<div class="flex h-full items-center border-l border-gray-200 lg:px-5 xl:px-10">
				<flux:button class="md:!text-sm xl:!text-base" href="{{ route('offer') }}" inset variant="ghost" wire:current="current" wire:navigate>@lang('ui.offer')</flux:button>
			</div>
			<div class="flex h-full items-center border-l border-gray-200 lg:px-5 xl:px-10">
				<flux:button class="md:!text-sm xl:!text-base" href="{{ route('works') }}" inset variant="ghost" wire:current="current" wire:navigate>@lang('ui.work')</flux:button>
			</div>
			<div class="flex h-full items-center border-l border-gray-200 lg:px-5 xl:px-10">
				<flux:button class="md:!text-sm xl:!text-base" href="{{ route('blog') }}" inset variant="ghost" wire:current="current" wire:navigate>@lang('ui.blog')</flux:button>
			</div>
			<div class="flex h-full items-center border-l border-gray-200 lg:px-5 xl:px-10">
				<flux:button class="md:!text-sm xl:!text-base" href="{{ route('contact') }}" inset variant="ghost" wire:current="current" wire:navigate>@lang('ui.contact')</flux:button>
			</div>
			<div class="flex h-full items-center border-l border-gray-200 lg:px-5 xl:px-10">

				<flux:button class="{{ app()->getLocale() === 'pl' ? 'current' : '' }} md:!text-sm xl:!text-base" href="{{ LaravelLocalization::getLocalizedURL('pl', null, [], true) }}" inset variant="ghost">PL</flux:button>
				&nbsp; / &nbsp;
				<flux:button class="{{ app()->getLocale() === 'en' ? 'current' : '' }} md:!text-sm xl:!text-base" href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}" inset variant="ghost">EN</flux:button>

			</div>
		</div>

		<div class="h-full text-sm uppercase tracking-wider text-gray-800 lg:hidden">

			<div class="flex h-full place-content-center items-center border-l border-gray-200 px-5 text-center lg:px-10">
				{{-- <a href="#" id="menu-mobile-button">menu</a> --}}
				<flux:button class="!text-base" id="menu-mobile-button" inset variant="ghost" wire:navigate>menu</flux:button>

			</div>
		</div>
	</div>

	<div class="backdrop-blur-xs absolute inset-0 z-40 hidden h-screen" id="drawer-mobile">
		<div class="mt-34 h-full w-full bg-gray-50/95 p-4">
			<div class="flex justify-end">
				<flux:button icon="x-mark" id="x-mark-button" variant="ghost" />
			</div>
			<div class="border-l border-gray-200">
				<x-ui.spacer class="px-4" py>
					<div>
						<flux:button class="{{ app()->getLocale() === 'pl' ? 'current' : '' }} !text-base" href="{{ LaravelLocalization::getLocalizedURL('pl', null, [], true) }}" inset variant="ghost">PL</flux:button>
						&nbsp; / &nbsp;
						<flux:button class="{{ app()->getLocale() === 'en' ? 'current' : '' }} !text-base" href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}" inset variant="ghost">EN</flux:button>
					</div>
					<flux:separator />
					<div>
						<flux:button class="!text-base" href="{{ route('offer') }}" inset variant="ghost" wire:current="current" wire:navigate>@lang('ui.offer')</flux:button>
					</div>
					<div>
						<flux:button class="!text-base" href="{{ route('works') }}" inset variant="ghost" wire:current="current" wire:navigate>@lang('ui.work')</flux:button>
					</div>
					<div>
						<flux:button class="!text-base" href="{{ route('blog') }}" inset variant="ghost" wire:current="current" wire:navigate>@lang('ui.blog')</flux:button>
					</div>
					<div>
						<flux:button class="!text-base" href="{{ route('contact') }}" inset variant="ghost" wire:current="current" wire:navigate>@lang('ui.contact')</flux:button>
					</div>
				</x-ui.spacer>
			</div>
		</div>
	</div>
</nav>
@script
	<script>
		const menuMobileButton = document.getElementById('menu-mobile-button');
		const xMarkButton = document.getElementById('x-mark-button');

		menuMobileButton.addEventListener('click', (e) => {
			e.preventDefault();

			const drawerMobile = document.getElementById('drawer-mobile');
			drawerMobile.classList.toggle('hidden');

			menuMobileButton.classList.toggle('current');


			document.body.classList.toggle('overflow-y-hidden');

		});

		xMarkButton.addEventListener('click', (e) => {
			e.preventDefault();
			const drawerMobile = document.getElementById('drawer-mobile');
			drawerMobile.classList.toggle('hidden');
			menuMobileButton.classList.toggle('current');
			document.body.classList.toggle('overflow-y-hidden');

		});
	</script>
@endscript
