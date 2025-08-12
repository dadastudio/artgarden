<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class AddPosts extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'app:add-posts';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Command description';

	/**
	 * Execute the console command.
	 */
	public function handle()
	{

		$posts = [

			[
				'title' => 'Hotel Borowina ***',
				'text' => 'Eleganckie przyjęcie w hotelu pod Warszawą z perfekcyjną i niezapomnianą oprawą. Naszą oprawą !

Zielone girlandy z liści eukaliptusa i bajecznych kwiatów białej eustomy to elegancka i naturalna dekoracja, która wprowadza świeżość i harmonię Układane wzdłuż stołów tworzą spójną i subtelną kompozycję, idealnie pasującą do stylu boho, rustykalnego lub romantycznego. Dodatki w postaci świec lub lampek pięknie podkreślają zieleń liści, dodając całości uroczystego charakteru.',

			],

			[
				'title' => 'Kwiaty, które mówią - symbolika ukryta w bukietach.',
				'text' => 'Nie trzeba słów, by przekazać to, co czujemy. Czasem wystarczy dobrze dobrany bukiet. 

Kwiaty od wieków niosą ze sobą symboliczne znaczenia — wyrażają miłość, wdzięczność, żal, wsparcie czy nadzieję.
Róża to oczywisty wybór, gdy myślimy o miłości – ale już jej kolor ma znaczenie: czerwona mówi „kocham”, różowa – „dziękuję”, a biała – „szanuję i pamiętam”. Frezje symbolizują zaufanie, goździki – oddanie i pamięć, a słoneczniki przynoszą radość i dodają otuchy.
Kwiaty na przeprosiny? Wybierz błękitne hortensje lub białe stokrotki – delikatne, pokorne, pełne spokoju.
Na wsparcie – irysy i chabry, które dodają siły.
Na podziękowanie – róże herbaciane, tulipany lub margerytki – lekkie, proste, szczere.
Dobierając kwiaty świadomie, możesz stworzyć bukiet, który naprawdę „coś mówi” – a czasem więcej niż sto słów.',

			],
			[
				'title' => 'Różowa aranżacja pierwszej komunii',
				'text' => 'Różowa aranżacja kwiatowa na przyjecie z okazji Pierwszej Komunii może być subtelna i elegancka. Delikatne odcienie różu dobrze współgrają z bielą, podkreślając uroczysty charakter wydarzenia. W kompozycjach często pojawiają się róże, eustomy, goździki i majowe konwalie, ułożone w prosty, naturalny sposób. Taka dekoracja to bezpretensjonalny i miły akcent podczas rodzinnego spotkania.',

			],

			[
				'title' => 'Hotel Bristol - ślub i wesele',
				'text' => 'Ślub i wesele w Hotelu Bristol to było wyjątkowe połączenie tradycji i elegancji. Zabytkowe wnętrza hotelu stanowiły doskonałe tło dla uroczystości pełnej symboliki i emocji. Ceremonia pod chupą (huppa), wykwintne menu, świetna obsługa i oczywiście nasze piękne aranżacje kwiatowe w mroźny styczniowy dzień :-) Realizacja była wykonana na wyraźną prośbę o ulubione kolory róż z dodatkiem wybranej zielni z ruskusa i monstery. Efekt końcowy pozostanie w naszej pamięci na zawsze.',

			],


			[
				'title' => 'Villa Foksal- elegancka impreza ślubna',
				'text' => 'Przyjęcie weselne w Villa Foksal to synonim elegancji i niepowtarzalnego klimatu w samym sercu Warszawy. Zabytkowe, odnowione wnętrza w stonowanych odcieniach szarości i taupe, otoczone ogrodem i całoroczną oranżerią, stworzyły idealne tło dla naszych aranżacji kwiatowych. Możemy z całą stanowczością powiedzieć, ze była to jedna z naszych najefektowniejszych prac, w kompozycjach znalazły sie kwiaty wytwornej kantadeski. 

Cudowna sceneria - sami zobaczcie!',

			],
			[
				'title' => 'Pink Lobster - kameralne przyjęcie na Mokotowie',
				'text' => 'Kameralne przyjęcie weselne na Mokotowie, to jedna z naszych najpiękniejszych aranżacji z monsterą w roli głównej.

Liście monstery to efektowny i nowoczesny element dekoracyjny często zastępujący “podtalerze”. Ich charakterystyczny kształt i głęboka zieleń dodają aranżacji egzotycznego i stylowego akcentu. Monstery można wykorzystać samodzielnie lub w połączeniu z innymi roślinami. My wykorzystaliśmy białe róże i eustomę. Efekt był zachwycający! Sami zobaczcie.',

			],

			[
				'title' => 'Wiązanki na uroczystość wszystkich świętych',
				'text' => 'Dekoracje nagrobne to ważny element ostatniego pożegnania – są wyrazem szacunku i pamięci.

Nie zawsze muszą to być tradycyjne rozwiązania, jak na przykład chyryzantemy. Nietypowe kompozycje kwiatowe mogą lepiej oddać osobowość i pasje zmarłego, czyniąc pożegnanie bardziej osobistym.

Układając aranżacje na korze lub kawałku drewna uzyskujemy bardzo naturalny, wręcz ekologiczny charakter.

Dzięki indywidualnemu projektowi można dopasować wielkość, kolorystykę i rodzaj kwiatów do budżetu i preferencji. 



',

			],

			[
				'title' => 'Kwiaty jadalne - piękne wzbogacenie smaku dań',
				'text' => 'Kwiaty jadalne to nie tylko piękna ozdoba potraw, ale również ciekawy sposób na wzbogacenie smaku i aromatu dań. 

Do najpopularniejszych należą bratki, nagietki, fiołki, lawenda czy aksamitki, które można dodawać do sałatek, deserów, napojów, a nawet dań głównych. Ważne jest, aby używać tylko tych kwiatów, które są przeznaczone do spożycia i pochodzą z pewnego źródła – bez chemii i oprysków. 

Oprócz walorów smakowych, wiele z nich ma właściwości prozdrowotne, np. działanie przeciwzapalne czy wspomagające trawienie. 

Jadalne kwiaty to idealny sposób, by nadać potrawom wyjątkowy, naturalny charakter i zachwycić gości nie tylko smakiem, ale i wyglądem.



',

			],



			[
				'title' => 'Wianki, korsarze na rękę, przypinki do marynarki',
				'text' => 'Oferujemy kwiatowe ozdoby idealnie dopasowane do kreacji.

Ważne jest, aby ich kolorystyka i styl współgrały z fasonem i materiałem ubioru – delikatne kwiaty pasują do zwiewnych strojów, a bardziej wyraziste kompozycje do odważniejszych stylizacji. 

Odpowiednio dobrana ozdoba może zastąpić tradycyjne dodatki, nadając całości świeżości i oryginalności.

Poniżej nasze wybrane realizacje.



',

			],













		];
		foreach ($posts as $post) {

			$newPost = new \App\Models\Post();

			$newPost->setTranslation('title', 'pl', $post['title']);
			$newPost->setTranslation('title', 'en', $post['title']);
			$newPost->setTranslation('slug', 'pl', str()->slug($post['title']));
			$newPost->setTranslation('slug', 'en', str()->slug($post['title']));



			$newPost->setTranslation('text', 'pl', $post['text']);
			$newPost->setTranslation('text', 'en', $post['text']);
			$newPost->enabled = 1;
			$newPost->save();


			// $work = \App\Models\Post::create([
			// 	'title' => fake()->words(3, true),
			// 	'enabled' => true,
			// ]);

			// $work->addMedia($image)->toMediaCollection();
		}
	}
}
