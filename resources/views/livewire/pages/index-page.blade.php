<?php

use Livewire\Volt\Component;

new class extends Component {
    // public function with(): array
    // {
    //     return [
    //         'fonts' => Font::with(['designers', 'weights', 'packs'])
    //             ->where('enabled', 1)
    //             ->orderBy('created_at', 'desc')
    //             ->limit(9)

    //             ->get(),
    //     ];
    // }
    public function rendering(\Illuminate\View\View $view): void
    {
        // seo()->title('Capitalics Warsaw Type Foundry', template: false);
    }
}; ?>

<x-ui.spacer class="lg:-mt-42" type="md">
	<div>
		<img alt="Hero" class="w-full" src="/img/Hero.png">

		<x-index.baner quoteAuthor="Marc Chagall" quote="Dla mnie kwiaty</br> są sposobem życia" />
	</div>
	<div class="flex flex-col gap-y-8 md:flex-row md:gap-24 md:px-24">

		<img alt="Hero" class="border border-gray-100 p-5 md:w-2/3" src="/img/oferta.jpg">

		<div class="flex text-sm md:items-end md:pb-6">
			<div class="prose prose-sm">
				<h2>Oferta</h2>
				<p>Art Garden z wielką troską zajmuje się kompleksową realizacją zadań związanych z profesjonalną florystyką, obecną w naszym życiu przy różnych okazjach. Oprócz pięknych aranżacji kwiatowych pomagamy stworzyć klimatyczny dekor, tak, aby wszystko tworzyło niezapomniany efekt. Podchodzimy bardzo indywidualnie do Waszych potrzeb, jesteśmy w stanie zaproponować wiele ciekawych rozwiązań bazując na naszym wieloletnim doświadczeniu.</p>
			</div>
		</div>
	</div>

	<div class="grid gap-y-4 md:grid-cols-4">
		<x-ui.spacer class="place-self-end pb-5 max-md:pl-4 md:pr-8">
			<div class="prose prose-sm">
				<p>Działamy głównie w Warszawie i okolicy (do 50 km). Ale jesteśmy też otwarci na propozycje z&nbsp;innych zakątków Polski.</p>

				<p>Realizujemy dostawy na terenie całej Warszawy, lub umożliwiamy odbiór zamówień z&nbsp;naszej pracowni florystycznej.</p>
			</div>
			<a class="btn" href="{{ route('index') }}">skontaktuj się z nami</a>

		</x-ui.spacer>
		<x-slot img="oferta1.jpg" text="Planujesz ślub? Pozwól nam zadbać o kompleksową aranżację Twojej uroczystości: od bukietu dla panNy młodej, przez dekoracje florystyczne, po oprawę graficzną." title="florystyka</br>ślubna" />
		<x-slot img="oferta2.jpg" text="Zbliża się koniec roku, chrzest lub komunia? Organizujesz imprezę firmową, wieczór panieński lub inne wydarzenie? przygotujemy Ci piękną aranżację kwiatową." title="florystyka</br>okolicznościowa" />
		<x-slot img="oferta3.jpg" text="Chcesz udekorować przestrzeń swojej restauracji, recepcję w hotelu, biuro? Planujesz sesję zdjęciową? skontaktuj sie z nami, z przyjemnością się tym zajmiemy." title="florystyka</br>dla firm" />
	</div>

	<div>
		<x-index.baner quoteAuthor="przysłowie Japońskie" quote="Piękno kwiatu nie tkwi w jego kształcie,</br> lecz w tym, jak go postrzegasz" />

		<img class="w-full" src="/img/Foto1.png">

		<div class="bg-green-950 px-10 py-10 text-center text-white">

			<div class="flex flex-col gap-y-8 xl:flex-row xl:gap-24 xl:px-20">
				<div class="flex flex-row items-end gap-2 xl:w-2/3">
					<img alt="Hero" class="w-2/3 border border-green-900 p-2" src="/img/realizacje1.jpg">
					<div class="flex w-1/3 flex-col gap-2">
						<img alt="Hero" class="w-full border border-green-900 p-2" src="/img/realizacje2.jpg">
						<img alt="Hero" class="w-full border border-green-900 p-2" src="/img/realizacje3.jpg">
					</div>
				</div>
				<div class="flex items-end pb-6 text-left text-sm">
					<x-ui.spacer>
						<div class="prose prose-sm prose-invert">
							<h2>Realizacje</h2>
							<p>
								Zainspiruj się naszymi projektami i zobacz, jak możemy przemienić Twoje wydarzenie w niezapomnianą, kwiatową opowieść. Zajrzyj do naszego portfolio!
							</p>
						</div>

						<a class="btn text-white" href="{{ route('index') }}">obejrzyj więcej</br>naszych realizacji</a>
					</x-ui.spacer>
				</div>

			</div>

		</div>

		<div>

			<img class="w-full" src="img/konsultacje.png" />
		</div>

		<div class="grid gap-8 py-10 md:grid-cols-2 md:px-8">

			<x-ui.spacer type="md">
				<x-ui.spacer type="xs">

					<h2>Telefon</h2>
					<p>+48 538 543 307</br>
						+48 698 227 022</p>
				</x-ui.spacer>

				<x-ui.spacer type="xs">

					<h2>Email</h2>
					<p><a href="mailto:office@artgarden.waw.pl">office@artgarden.waw.pl</a></p>
				</x-ui.spacer>

				<x-ui.spacer type="xs">

					<h2>Godziny pracy</h2>
					<p>poniedziałek - piątek: 9 – 18</br>sobota: 9 – 14
					</p>
				</x-ui.spacer>

			</x-ui.spacer>
			<x-ui.spacer class="md:border-l md:pl-8">

				<h2>Proszę wypełnić formularz abyśmy mogli stworzyć indywidualną ofertę.</h2>

				<form>
					<x-ui.spacer type="xs">

						<flux:input label="Email" type="email" />

						<flux:input label="Imię" />
						<flux:input label="Telefon" />

						<flux:select label="Rodzaj uroczystości/zamówienia" placeholder="Wybierz..." wire:model="industry">
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
							<flux:checkbox wire:model="terms" />
							<flux:label>I agree to the terms and conditions</flux:label>
							<flux:error name="terms" />
						</flux:field>
						<x-ui.spacer py type="sm">
							<h2>Skąd dowiedziałaś/dowiedziałeś się o ArtGarden?</h2>

							<flux:radio.group>
								<flux:radio label="Internet (Google, Yahoo, etc.)" value="cc" />
								<flux:radio label="Social Media" value="paypal" />
								<flux:radio label="Google Ad" value="ach" />
								<flux:radio label="Polecenie znajomego" value="ach" />
								<flux:radio label="Inne" value="ach" />
							</flux:radio.group>
						</x-ui.spacer>

						<div class="flex justify-end">
							<button class="btn" type="submit">Wyślij</button>
						</div>

					</x-ui.spacer>

				</form>
			</x-ui.spacer>
		</div>
	</div>
</x-ui.spacer>
@script
	<script></script>
@endscript
