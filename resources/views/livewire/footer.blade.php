<footer class="">

	<x-ui.spacer pt type="md">
		<div class="md:px-25 flex aspect-video flex-row-reverse items-end bg-[url(/public/img/konsultacje.jpg)] bg-cover bg-bottom bg-no-repeat md:aspect-[1440/531] md:bg-left">

			<x-index.hero-text text="<p>Zapraszamy na dyskretne i indywidualne konsultacje - online lub osobiście - w dogodnym dla Ciebie miejscu.
							Jeśli chcesz zamówić wyjątkowe kompozycje kwiatowe na specjalne okazje - zarówno prywatne jak i firmowe - z przyjemnością Ci pomożemy!</p>" title="Konsultacje" />

		</div>
		<div class="px-5 md:hidden">

			<x-ui.spacer pb>

				<div>
					<img src="/img/up_rect.svg" />
					<h1>Konsultacje</h1>
				</div>
				<div class="relative">
					<p class="prose prose-sm">Zapraszamy na dyskretne i indywidualne konsultacje - online lub osobiście - w dogodnym dla Ciebie miejscu.
						Jeśli chcesz zamówić wyjątkowe kompozycje kwiatowe na specjalne okazje - zarówno prywatne jak i firmowe - z przyjemnością Ci pomożemy!</p>
					<img class="absolute right-0 rotate-180" src="/img/up_rect.svg" />
				</div>

				<p>&nbsp;</p>

			</x-ui.spacer>

		</div>
		<div class="grid gap-8 px-4 md:grid-cols-2">

			<x-ui.spacer type="md">

				<div class="flex flex-row items-baseline gap-x-1">
					<img src="/img/up_rect.svg" />
					<x-ui.spacer type="xs">

						<h2>Telefon</h2>
						<p>+48 538 543 307</br>
							+48 698 227 022</p>
					</x-ui.spacer>
				</div>

				<div class="flex flex-row items-baseline gap-x-1">
					<img src="/img/up_rect.svg" />

					<x-ui.spacer type="xs">

						<h2>Email</h2>
						<p><a href="mailto:office@artgarden.waw.pl">office@artgarden.waw.pl</a></p>
					</x-ui.spacer>
				</div>
				<div class="flex flex-row items-baseline gap-x-1">
					<img src="/img/up_rect.svg" />
					<x-ui.spacer type="xs">

						<h2>Godziny pracy</h2>
						<p>poniedziałek - piątek: 9 – 18</br>sobota: 9 – 14
						</p>
					</x-ui.spacer>
				</div>

			</x-ui.spacer>
			<x-ui.spacer class="md:border-l md:pl-8">

				<h2 class="text-pretty">Proszę wypełnić formularz abyśmy mogli stworzyć indywidualną ofertę.</h2>

				<form>
					<x-ui.spacer pb type="xs">

						<flux:input label="Email" type="email" />

						<flux:input label="Imię" />
						<flux:input label="Telefon" />

						<flux:select label="Rodzaj uroczystości/zamówienia" placeholder="Wybierz...">
							<flux:select.option>Ślub</flux:select.option>
							<flux:select.option>Komunia</flux:select.option>
							<flux:select.option>Impreza firmowa</flux:select.option>
							<flux:select.option>Urodziny</flux:select.option>
							<flux:select.option>Rocznica</flux:select.option>
							<flux:select.option>Inna</flux:select.option>
						</flux:select>

						<flux:input label="Data uroczystości/realizacji zamówienia" max="2999-12-31" type="date" />

						<flux:input label="Miejsce uroczystości/realizacji zamówienia" />

						<flux:textarea label="Dodatkowe informacje" />

						<flux:field variant="inline">
							<flux:checkbox />
							<flux:label>I agree to the terms and conditions</flux:label>
							<flux:error name="terms" />
						</flux:field>

						<x-ui.spacer py type="sm">
							<h2 class="text-pretty">Skąd dowiedziałaś/eś się o ArtGarden?</h2>

							<flux:radio.group>
								<flux:radio label="Internet (Google, Yahoo, etc.)" value="cc" />
								<flux:radio label="Social Media" value="paypal" />
								<flux:radio label="Google Ad" value="ach" />
								<flux:radio label="Polecenie znajomego" value="ach" />
								<flux:radio label="Inne" value="ach" />
							</flux:radio.group>
						</x-ui.spacer>

						<div class="flex justify-end">

							<flux:button icon:trailing="arrow" type="submit" variant="ghost">Wyślij</flux:button>

						</div>

					</x-ui.spacer>

				</form>
			</x-ui.spacer>
		</div>

	</x-ui.spacer>

	<x-ui.spacer class="bg-green-950 text-white" pt type="md">

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
	<div class="flex flex-row justify-between bg-green-950 p-4 text-xs text-white md:p-10">
		<div>by Joanna Dyczkowska </div>
		<div>© ArtGarden | 2025</div>
	</div>
</footer>
