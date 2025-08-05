<footer class="bg-green-950 text-white">

	<x-ui.spacer pt type="md">
		<div class="grid grid-cols-2 border-y border-green-50 text-sm md:flex md:flex-row md:justify-around">

			<div class="flex justify-center md:basis-1/3">
				<div class="flex flex-col gap-y-5 py-10">
					<a href="{{ route('index') }}" wire:navigate>Oferta</a>
					<a href="{{ route('index') }}" wire:navigate>Realizacje</a>
					<a href="{{ route('index') }}" wire:navigate>Blog</a>
					<a href="{{ route('index') }}" wire:navigate>Kontakt</a>
				</div>
			</div>

			<div class="flex justify-center border-l-[0.5px] border-green-50 md:basis-1/3">
				<div class="flex flex-col gap-y-5 py-10">
					<a href="{{ route('index') }}" wire:navigate>FAQ</a>
					<a href="{{ route('index') }}" wire:navigate>Polityka Prywatności</a>
					<a href="{{ route('index') }}" wire:navigate>Regulamin</a>
					<a href="{{ route('index') }}" wire:navigate>Cookies</a>

				</div>

			</div>
			<div class="flex justify-center border-green-50 max-md:border-t md:basis-1/3 md:border-l">
				<div class="flex flex-col gap-y-5 py-10">
					<a href="{{ route('index') }}" wire:navigate>Facebook</a>
					<a href="{{ route('index') }}" wire:navigate>Instagram</a>
					<a class="max-md:hidden" href="{{ route('index') }}" wire:navigate>Kontakt</a>
					<a class="max-md:hidden" href="{{ route('index') }}" wire:navigate>Katalog do pobrania</a>

				</div>

			</div>

			<div class="flex justify-center border-l border-green-50 max-md:border-t md:hidden md:basis-1/3">
				<div class="flex flex-col gap-y-5 py-10">
					<a href="{{ route('index') }}" wire:navigate>Kontakt</a>
					<a href="{{ route('index') }}" wire:navigate>Katalog do pobrania</a>

				</div>

			</div>

		</div>

		<img alt="Logo" class="w-full px-4 md:px-32" src="{{ asset('img/logo_white.svg') }}">
		{{-- <x-logo /> --}}
		<hr class="h-[0.5px] opacity-70">

	</x-ui.spacer>
	<div class="flex flex-row justify-between p-4 text-xs md:p-10">
		<div>by Joanna Dyczkowska 2025</div>
		<div>© ArtGarden | 2025</div>
	</div>
</footer>
