<footer class="bg-green-950 text-white">

	<x-ui.spacer pt type="md">
		<div class="flex flex-row justify-around border-y border-green-50 text-sm">

			<div class="flex basis-1/3 justify-center">
				<div class="flex flex-col gap-5 py-10">
					<a href="{{ route('index') }}" wire:navigate>Oferta</a>
					<a href="{{ route('index') }}" wire:navigate>Realizacje</a>
					<a href="{{ route('index') }}" wire:navigate>Blog</a>
					<a href="{{ route('index') }}" wire:navigate>Kontakt</a>

				</div>

			</div>

			<div class="flex basis-1/3 justify-center border-l-[0.5px] border-green-50">
				<div class="flex flex-col gap-5 py-10">
					<a href="{{ route('index') }}" wire:navigate>FAQ</a>
					<a href="{{ route('index') }}" wire:navigate>Polityka Prywatności</a>
					<a href="{{ route('index') }}" wire:navigate>Regulamin</a>
					<a href="{{ route('index') }}" wire:navigate>Cookies</a>

				</div>

			</div>
			<div class="flex basis-1/3 justify-center border-l border-green-50">
				<div class="flex flex-col gap-5 py-10">
					<a href="{{ route('index') }}" wire:navigate>Facebook</a>
					<a href="{{ route('index') }}" wire:navigate>Instagram</a>
					<a href="{{ route('index') }}" wire:navigate>Kontakt</a>
					<a href="{{ route('index') }}" wire:navigate>Katalog do pobrania</a>

				</div>

			</div>
		</div>

		<img alt="Logo" class="w-full px-24" src="{{ asset('img/logo.svg') }}">
		<hr class="h-[0.5px] opacity-70">

	</x-ui.spacer>
	<div class="flex flex-row justify-between p-10 text-xs">
		<div>by Joanna Dyczkowska 2025</div>
		<div>© ArtGarden | 2025</div>
	</div>
</footer>
