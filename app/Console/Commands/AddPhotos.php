<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class AddPhotos extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'app:add-photos';

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
		//


		$images = [
			'/Users/michaljarocinski/Downloads/post11/image00016_11 2.jpg',
			'/Users/michaljarocinski/Downloads/post11/69426024_755889564842923_5700891305240952832_n_1.jpg',
			'/Users/michaljarocinski/Downloads/post11/64341049_707147276383819_1926450620764520448_n_1.jpg',
			'/Users/michaljarocinski/Downloads/post11/59234831_680184152413465_885347477312503808_n_1.jpg',
			'/Users/michaljarocinski/Downloads/post11/20190526_082728[1].jpg',
			'/Users/michaljarocinski/Downloads/post11/113680555_1000084563756754_5185428297995994416_n_1.jpg',
			'/Users/michaljarocinski/Downloads/post11/1.jpg',
			'/Users/michaljarocinski/Downloads/post11/image00021_1 2.jpg',
			'/Users/michaljarocinski/Downloads/post11/image00017_11 2.jpg',
			'/Users/michaljarocinski/Downloads/post11/image00025_1_1 2.jpg',
			'/Users/michaljarocinski/Downloads/post11/20210515_081221[1]_1 2.jpg',
			'/Users/michaljarocinski/Downloads/post11/image00001_1 3.jpg',
			'/Users/michaljarocinski/Downloads/post11/image00003_1 2.jpg',
			'/Users/michaljarocinski/Downloads/post11/image00027_1 2.jpg',
			'/Users/michaljarocinski/Downloads/post11/IMG_9948_1 3.jpg',
		];

		foreach ($images as $image) {

			$photo = new \App\Models\Photo();
			$photo

				->setTranslation('title', 'en', fake()->words(3, true))
				->setTranslation('title', 'pl', fake()->words(3, true));

			$photo->post_id = 11;
			$photo->save();

			$photo->addMedia($image)->toMediaCollection();
		}

		// foreach ($images as $image) {
		// 	$photo = \App\Models\Photo::create([
		// 		'title' => fake()->title(),
		// 		'post_id' => 1,
		// 		'enabled' => true,
		// 	]);

		// 	$photo->addMedia($image)->toMediaCollection();
		// }



	}
}
