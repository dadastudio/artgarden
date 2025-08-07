<?php

use App\Models\Post;
use Livewire\Volt\Component;

new class extends Component {
    public $terms = false;
    public $industry = false;
    public function with(): array
    {
        return [
            'blogItems' => Post::factory()->count(6)->make(),
            'workItems' => Post::factory()->count(6)->make(),
        ];
    }
    public function rendering(\Illuminate\View\View $view): void
    {
        // seo()->title('Capitalics Warsaw Type Foundry', template: false);
    }
}; ?>

<x-ui.spacer class="lg:-mt-42 -mt-34" type="md">
	<div>

		<div class="md:aspect-5/3 aspect-9/10 flex flex-row items-end bg-[url(/public/img/hero-mobile.webp)] bg-cover bg-bottom bg-no-repeat p-10 md:bg-[url(/public/img/hero.jpg)] md:bg-right">

			<x-index.hero-text buttonText="odkryj więcej" text="<p>Florystyką zajmujemy się od ponad 10 lat, czerpiemy inspiracje ze wszystkich zakamarków życia i wciąż nie zwalniamy tempa - bo to nasza pasja. Chętnie podejmujemy wyzwania i realizujemy wyjątkowe aranżacje, ale także wyręczymy Cię i pomożemy zrealizować małą potrzebę serca, czy własny projekt.</p>" title="O nas" />

		</div>

		<div class="-mt-10 px-5 md:hidden">

			<x-ui.spacer pb>

				<div>
					<img src="/img/up_rect.svg" />
					<h1>O nas</h1>
				</div>
				<div class="relative">
					<p class="prose prose-sm">Florystyką zajmujemy się od ponad 10 lat, czerpiemy inspiracje ze wszystkich zakamarków życia i wciąż nie zwalniamy tempa - bo to nasza pasja. Chętnie podejmujemy wyzwania i realizujemy wyjątkowe aranżacje, ale także wyręczymy Cię i pomożemy zrealizować małą potrzebę serca, czy własny projekt.</p>
					<img class="absolute right-0 rotate-180" src="/img/up_rect.svg" />
				</div>

				<p>&nbsp;</p>
				<flux:button href="{{ route('index') }}" icon:trailing="arrow" inset variant="ghost">odkryj więcej</flux:button>
			</x-ui.spacer>

		</div>
		<x-index.baner quoteAuthor="Marc Chagall" quote="Dla mnie kwiaty</br> są sposobem życia" />
	</div>
	<div class="flex flex-col gap-y-8 px-4 md:flex-row md:gap-24 md:px-24">

		<img class="border border-gray-100 p-5 md:w-2/3" src="/img/oferta.jpg">
		<x-index.hero-text text="<p>Art Garden z wielką troską zajmuje się kompleksową realizacją zadań związanych z&nbsp;profesjonalną florystyką, obecną w&nbsp;naszym życiu przy różnych okazjach. Oprócz pięknych aranżacji kwiatowych pomagamy stworzyć klimatyczny dekor, tak, aby wszystko tworzyło niezapomniany efekt. Podchodzimy bardzo indywidualnie do Waszych potrzeb, jesteśmy w&nbsp;stanie zaproponować wiele ciekawych rozwiązań bazując na naszym wieloletnim doświadczeniu.</p>" title="Oferta" />

	</div>
	<x-index.blog-items :items="$workItems" buttonText="skontaktuj się <span class='hidden lg:inline'>z nami</span>  " text="<p>Działamy głównie w Warszawie i okolicy (do 50 km). Ale jesteśmy też otwarci na propozycje z&nbsp;innych zakątków Polski.</p>

				<p>Realizujemy dostawy na terenie całej Warszawy, lub umożliwiamy odbiór zamówień z&nbsp;naszej pracowni florystycznej.</p>" title="" />

	<div class="grid hidden gap-y-4 px-4 md:grid-cols-4">
		<x-ui.spacer class="place-self-end pb-5 max-md:pl-4 md:pr-8" type="xs">
			<div>
				<img src="/img/up_rect.svg" />

			</div>
			<div class="prose prose-sm relative">
				<p>Działamy głównie w Warszawie i okolicy (do 50 km). Ale jesteśmy też otwarci na propozycje z&nbsp;innych zakątków Polski.</p>

				<p>Realizujemy dostawy na terenie całej Warszawy, lub umożliwiamy odbiór zamówień z&nbsp;naszej pracowni florystycznej.</p>
				<img class="absolute -bottom-6 right-0 rotate-180" src="/img/up_rect.svg" />
			</div>

			<p>&nbsp;</p>

			<flux:button href="{{ route('index') }}" icon:trailing="arrow" inset variant="ghost">skontaktuj się z nami</flux:button>

		</x-ui.spacer>
		<x-slot img="oferta1.jpg" text="Planujesz ślub? Pozwól nam zadbać o kompleksową aranżację Twojej uroczystości: od bukietu dla panNy młodej, przez dekoracje florystyczne, po oprawę graficzną." title="florystyka</br>ślubna" />
		<x-slot class="-ml-px" img="oferta2.jpg" text="Zbliża się koniec roku, chrzest lub komunia? Organizujesz imprezę firmową, wieczór panieński lub inne wydarzenie? przygotujemy Ci piękną aranżację kwiatową." title="florystyka</br>okolicznościowa" />
		<x-slot class="-ml-px" img="oferta3.jpg" text="Chcesz udekorować przestrzeń swojej restauracji, recepcję w hotelu, biuro? Planujesz sesję zdjęciową? skontaktuj sie z nami, z przyjemnością się tym zajmiemy." title="florystyka</br>dla firm" />

	</div>

	<div>
		<x-index.baner quoteAuthor="przysłowie Japońskie" quote="Piękno kwiatu nie tkwi w&nbsp;jego kształcie,</br> lecz w&nbsp;tym, jak go postrzegasz" />

		<div class="aspect-5/3 relative bg-[url(/public/img/sala.jpg)] bg-cover bg-center bg-no-repeat">

			<div class="xl:px-30 grid grid-cols-2 gap-2 px-5 py-5 sm:px-10 md:px-20 md:py-10 lg:px-24">
				<div class="col-start-1 col-end-3">
					<div class="max-w-[320px] bg-white p-2 shadow-xl md:p-5">
						<img class="" src="/img/wianek.jpg">
						<p class="mt-2.5 text-[10px] uppercase text-gray-600">wianek i korsarz na rękę</p>

					</div>
				</div>
				{{-- <div>&nbsp;</div> --}}
				{{-- <div>&nbsp;</div> --}}
				<div class="col-start-2 place-self-end">

					<div class="max-w-[300px] bg-white p-2 shadow-xl md:p-5">
						<img class="" src="/img/przypinka.jpg">
						<p class="mt-2.5 text-[10px] uppercase text-gray-600">przypinka do marynarki</p>

					</div>

				</div>

			</div>

		</div>

		<div class="bg-green-950 px-5 py-10 text-center text-white md:px-10">

			<div class="flex flex-col gap-y-8 xl:flex-row xl:gap-24 xl:px-20">

				<div class="flex w-2/3 flex-row items-end gap-2 max-md:hidden">
					<img class="w-2/3 border border-green-900 p-2" src="/img/realizacje1.jpg">
					<div class="flex w-1/3 flex-col gap-2">
						<img class="w-full border border-green-900 p-2" src="/img/realizacje2.jpg">
						<img class="w-full border border-green-900 p-2" src="/img/realizacje3.jpg">
					</div>
				</div>
				<div class="flex flex-col gap-y-2 md:hidden">
					<div class="grid grid-cols-2 gap-2">
						<img class="place-self-end border border-green-900 p-2" src="/img/realizacje1.jpg">
						<img class="border border-green-900 p-2" src="/img/realizacje2.jpg">
					</div>
					<img class="w-full border border-green-900 p-2" src="/img/realizacje3.jpg">
				</div>
				<x-index.hero-text buttonText="obejrzyj więcej</br>naszych realizacji" invert text="<p>Zainspiruj się naszymi projektami i zobacz, jak możemy przemienić Twoje wydarzenie w&nbsp;niezapomnianą, kwiatową opowieść. Zajrzyj do naszego portfolio!</p>" title="Realizacje" />

			</div>
		</div>

	</div>
	<x-index.blog-items :items="$blogItems" buttonText="<span class='hidden lg:inline'>przeglądaj</span> artykuły" text="<p>Zapraszamy do regularnego odwiedzania naszego bloga florystycznego, gdzie znajdziesz inspirujące fotorelacje z wykonanych przez nas dekoracji kwiatowych oraz ciekawe artykuły na temat trendów i porad z zakresu florystyki.</p>" title="Blog" />

</x-ui.spacer>
