<?php

use App\Models\Post;
use Livewire\Volt\Component;

new class extends Component {
    public $terms = false;
    public $industry = false;
    public function with(): array
    {
        return [
            'currentRoute' => \Route::currentRouteName(),
        ];
    }
    public function rendering(\Illuminate\View\View $view): void
    {
        // seo()->title('Capitalics Warsaw Type Foundry', template: false);
    }
}; ?>

<div>
	<x-ui.spacer pt type="md">

		<div class="relative flex-row lg:flex">

			<div class="2xl:w-75/100 xl:w-70/100 lg:w-65/100 flex flex-row px-5 md:w-full lg:px-16 lg:py-10 xl:px-20">

				@if ($currentRoute === 'offer')
					<img class="max-h-max w-full border border-gray-100 p-5" src="/img/oferta.jpg">
				@elseif ($currentRoute === 'offer-2')
					<img class="max-h-max w-full border border-gray-100 p-5" src="/img/oferta.jpg">
				@elseif ($currentRoute === 'offer-3')
					<img class="max-h-max w-full border border-gray-100 p-5" src="/img/oferta.jpg">
				@endif
			</div>

			@if ($currentRoute === 'offer')
				<x-index.hero-text text="<p>Śluby kochamy ponad wszystko! Zadbamy o to czego potrzebujesz podczas uroczystości związanych ze ślubem, zarówno własnym jak i takim, gdzie występujesz jako gość - realizujemy zamówienia dla/od pary młodej, świadków, zaproszonych gości. Podejmiemy się aranżacji wystroju sali weselnej, kościoła itp.</p>" title="Florystyka</br>Ślubna" />
			@elseif ($currentRoute === 'offer-2')
				<x-index.hero-text text="<p>W naszej pracowni powstają wyjątkowe aranżacje, stawiamy na kreatywność i unikalne kompozycje. Łączymy różne gatunki roślin w niebanalny sposób.</p>" title="Florystyka</br>okolicznościowa" />
			@elseif ($currentRoute === 'offer-3')
				<x-index.hero-text text="<p>Twoja recepcja, sala konferencyjna, studio, bar/restauracja/kawiarnia, poczekalnia, przymierzalnia - regularnie potrzebuje odrobiny piękna a nie bardzo masz czas się tym zajmować? Jesteśmy chętni do długoterminowej współpracy, aby zdjąć Ci problem z głowy. Będzie różnorodnie, spersonalizowanie i na czas!</p>" title="Florystyka</br>dla firm" />
			@endif

		</div>

		<div class="relative grid gap-8 bg-gray-100 p-5 md:p-10 xl:grid-cols-2">

			<x-ui.spacer class="flex flex-col">
				<div class="">
					<img src="/img/up_rect.svg" />

					<h1 class="text-pretty text-2xl">

						@if ($currentRoute === 'offer')
							NASZA OFERTA ŚLUBNA:
						@elseif ($currentRoute === 'offer-2')
							NASZA OFERTA OKOLICZNOŚCIOWA:
						@elseif ($currentRoute === 'offer-3')
							NASZA OFERTA DLA FIRM:
						@endif

					</h1>
				</div>
				<div class="grow">
					<div class="flex h-full flex-col gap-x-8 gap-y-6 md:flex-row">

						<div class="prose prose-sm basis-1/2">

							@if ($currentRoute === 'offer')
								<h3>Florystyka indywidualna:</h3>
								<p>bukiety ślubne / butonierki / bransoletki / wianki / kwieciste obroże dla pupili / kwiaty dla rodziców na podziękowanie / mini sukulenty dla gości weselnych</p>

								<h3>Dekoracje wesela:</h3>
								<p>kwieciste ścianki / kompozycje na stoły pary i gości / kwiatowe dekoracje na butelki / podwieszane instalacje z kwiatów</p>

								<h3>Dekoracja ceremonii zaślubin:</h3>
								<p>ślub w plenerze – kwieciste bramki, pergole / dekoracja kościoła, Urzędu Stanu Cywilnego / dekoracja samochodu lub innego pojazdu</p>
							@elseif ($currentRoute === 'offer-2')
								<h3>Dekoracje kwiatowe:</h3>
								<p>wianki komunijne / dekoracja miejsca komunii / dekoracje na chrzciny, imieniny, urodziny, rocznice, zaręczyny / podziękowania okolicznościowe w formie bukietów / kosze i pudełka kwiatowe / bukiety gratulacyjne / dekoracje świąteczne, sylwestrowe / dekoracje na bale, studniówki / kwiaty dla nauczycieli (na dzień nauczyciela, zakończenie roku) / florystyka funeralna (wieńce pogrzebowe, wieńce rzymskie, wiązanki pogrzebowe, dekoracje urny, trumny, kompozycje na Święto Zmarłych)</p>
							@elseif ($currentRoute === 'offer-3')
								<h3>Florystyka indywidualna:</h3>
								<p>kwiaty do biura / dekoracje na eventy, bankiety, konferencje, sesje fotograficzne / dekoracje recepcji / aranżacje lobby hotelowego / dekoracje świąteczne (choinki, girlandy, stroiki) / dekoracje sylwestrowe / bukiety na okazje (imieniny, urodziny, bukiety gratulacyjne) / dekoracje restauracji na imprezy indywidualne / </p>
							@endif

						</div>
						<div class="relative flex basis-1/2 flex-col justify-between">
							<div class="prose prose-sm relative">
								@if ($currentRoute === 'offer')
									<h3>Oprawa graficzna:</h3>
									<p>zaproszenia ślubne, weselne / winietki na&nbsp;stoły lub zawieszki na krzesła (z&nbsp;imieniem i&nbsp;nazwiskiem) / zawieszki na&nbsp;alkohol weselny / podziękowania dla&nbsp;gości weselnych / menu (element dekoracyjny stołu informujący gości o&nbsp;zaplanowanych posiłkach i przebiegu uroczystości) / numery na stoły weselne / tablica z&nbsp;planem stołów weselnych ułatwiająca gościom odnalezienie swojego miejsca</p>
								@elseif ($currentRoute === 'offer-2')
									<h3>Oprawa graficzna:</h3>
									<p>zaproszenia na uroczystości / winietki na stoły lub zawieszki na krzesła (z imieniem i nazwiskiem) / menu (element dekoracyjny stołu informujący gości o zaplanowanych posiłkach i przebiegu uroczystości, numery na stoły, tablica z planem stołów ułatwiająca gościom odnalezienie swojego miejsca, indywidualne kartki okolicznościowe</p>
								@elseif ($currentRoute === 'offer-3')
									<h3>Oprawa graficzna:</h3>
									<p>bileciki do bukietów / zaproszenia / winietki na stoły lub zawieszki na krzesła (z imieniem i nazwiskiem) / menu (element dekoracyjny stołu informujący gości o zaplanowanych posiłkach i przebiegu uroczystości, numery na stoły, tablica z planem stołów ułatwiająca gościom odnalezienie swojego miejsca, indywidualne kartki okolicznościowe</p>
								@endif

								<img class="absolute -bottom-6 right-0 rotate-180" src="/img/up_rect.svg" />
							</div>
							{{-- <div class="">
								<flux:button class="" href="{{ route('contact') }}" icon:trailing="arrow" variant="subtle">skontaktuj się z nami</flux:button>
							</div> --}}

						</div>
					</div>
				</div>
			</x-ui.spacer>

			<div class="flex flex-col border border-l-0 border-gray-300 max-sm:divide-y max-sm:divide-gray-300 sm:flex-row">
				@if ($currentRoute != 'offer')
					<x-slot img="oferta1.jpg" route="offer" text="Planujesz ślub? Pozwól nam zadbać o&nbsp;kompleksową aranżację Twojej uroczystości: od bukietu dla panNy młodej, przez dekoracje florystyczne, po oprawę graficzną." title="florystyka</br>ślubna" />
				@endif
				@if ($currentRoute != 'offer-2')
					<x-slot img="oferta1.jpg" route="offer-2" text="Planujesz ślub? Pozwól nam zadbać o&nbsp;kompleksową aranżację Twojej uroczystości: od bukietu dla panNy młodej, przez dekoracje florystyczne, po oprawę graficzną." title="florystyka</br>okolicznościowa" />
				@endif
				@if ($currentRoute != 'offer-3')
					<x-slot img="oferta1.jpg" route="offer-3" text="Planujesz ślub? Pozwól nam zadbać o&nbsp;kompleksową aranżację Twojej uroczystości: od bukietu dla panNy młodej, przez dekoracje florystyczne, po oprawę graficzną." title="florystyka</br>dla firm" />
				@endif

			</div>

		</div>

	</x-ui.spacer>

	<x-index.realizacje-hero />
</div>
