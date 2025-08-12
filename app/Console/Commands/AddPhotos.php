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
			// '/Users/michaljarocinski/Documents/work/ArtGarden/blog/post1/3fad80b8ba14c5044582c99febc8ec380e2386c3.jpg',
			'/Users/michaljarocinski/Documents/work/ArtGarden/blog/post1/3fca0aba1cbeabc6c3161546c46b4b6490041c58.jpg',
			'/Users/michaljarocinski/Documents/work/ArtGarden/blog/post1/5a700aa70e6864c55af08d14b5815ee069e187aa.jpg',
			'/Users/michaljarocinski/Documents/work/ArtGarden/blog/post1/9ef1a3fe4d89a32018a2533404b8817f23d22976.jpg',
			'/Users/michaljarocinski/Documents/work/ArtGarden/blog/post1/25fde835c065d4402b8d1ba2e59f928433c54d4b.jpg',
			'/Users/michaljarocinski/Documents/work/ArtGarden/blog/post1/90e724497a79589da557c05e57460d57cc212497.jpg',
			'/Users/michaljarocinski/Documents/work/ArtGarden/blog/post1/720cd0d2480bfa9fff494f4da84abdaea0f7d8de.jpg',
			'/Users/michaljarocinski/Documents/work/ArtGarden/blog/post1/852b5837f3eac329ba6c7dde47c836779931a1d6.jpg',
			'/Users/michaljarocinski/Documents/work/ArtGarden/blog/post1/7367b013cc8b7e7e460e381acb5191c43e3f4fa3.jpg',
			'/Users/michaljarocinski/Documents/work/ArtGarden/blog/post1/ad1824993f04a0eae67a3a5a5f65010f03ee282b.jpg',
			'/Users/michaljarocinski/Documents/work/ArtGarden/blog/post1/ca6bad2899cebf1c9d06c75afde4e78a759caee6.jpg',
			'/Users/michaljarocinski/Documents/work/ArtGarden/blog/post1/df35b79fc8e5147c7397a41cf8b9a02b6bad83e7.jpg',
		];

		$workImages = [


			"/Users/michaljarocinski/Documents/work/ArtGarden/realizacje/2e73da0996fb4fde3e551f266718eae790e62433.jpg",
			"/Users/michaljarocinski/Documents/work/ArtGarden/realizacje/62a1db763d3836d962efbbe7cada7199b71adf12.jpg",
			"/Users/michaljarocinski/Documents/work/ArtGarden/realizacje/943efe30e9e777d77935824a3f68955261f0c6bd.jpg",
			"/Users/michaljarocinski/Documents/work/ArtGarden/realizacje/12d3886d09f01cc1ce27337f7e533bb2f5a1f23e.jpg",
			"/Users/michaljarocinski/Documents/work/ArtGarden/realizacje/7ad1ae3f4be60a40d80158ea3a70c6ac379169b8.jpg",
			"/Users/michaljarocinski/Documents/work/ArtGarden/realizacje/e6acec3dfc32ceb9fce24a8d62fc96ae4b3b988a.jpg",
			"/Users/michaljarocinski/Documents/work/ArtGarden/realizacje/62aa8327cd8647a2a6c051326412af7e952578d3.jpg",
			"/Users/michaljarocinski/Documents/work/ArtGarden/realizacje/4351a5a78981af837e3fd2f4d1d40f1a8637aaaf.jpg",
			"/Users/michaljarocinski/Documents/work/ArtGarden/realizacje/7cb61a0e38f236f2926e9510bff193bf44f61151.jpg",
			"/Users/michaljarocinski/Documents/work/ArtGarden/realizacje/c8fb15789bbd945500904428dbfa7d0e3f9ae7d1.jpg",
			"/Users/michaljarocinski/Documents/work/ArtGarden/realizacje/ba193b291de9c4c082058845c9b305ab95362147.jpg",
			"/Users/michaljarocinski/Documents/work/ArtGarden/realizacje/460be9ee90459089422bf1cdac8b03e097080dc0.jpg",
			"/Users/michaljarocinski/Documents/work/ArtGarden/realizacje/00b9e98748552b8ff5cae12c6160e0f7ba598ff7.jpg",
			"/Users/michaljarocinski/Documents/work/ArtGarden/realizacje/9e4fd8488f6c5c3330e065824015f4064195fab5.jpg",
			"/Users/michaljarocinski/Documents/work/ArtGarden/realizacje/8817e457f9f47464e420d9ff4b65a838b365acbd.jpg",
			"/Users/michaljarocinski/Documents/work/ArtGarden/realizacje/91f1d27c43798a9fa0c361cce7ae59a787cf2f90.jpg",
			"/Users/michaljarocinski/Documents/work/ArtGarden/realizacje/7774277f77cf3ec12bcd52a1c4f0c9fd519b9874.jpg",
			"/Users/michaljarocinski/Documents/work/ArtGarden/realizacje/04c9210d759cf4013c6b2376c68d9a1e45a713ce.jpg",
			"/Users/michaljarocinski/Documents/work/ArtGarden/realizacje/4c30a526d6bcf5633316bfdb66513df4b53c3c84.jpg",
			"/Users/michaljarocinski/Documents/work/ArtGarden/realizacje/b7deba4e8f59959499316fb9f41b66ec5d24cffe.jpg",
			"/Users/michaljarocinski/Documents/work/ArtGarden/realizacje/99ae2e4562d42aea57719c9494f00443433cbe73.jpg",
			"/Users/michaljarocinski/Documents/work/ArtGarden/realizacje/1b2740a8131047f10022966fff380574db8f9a93.jpg",
			"/Users/michaljarocinski/Documents/work/ArtGarden/realizacje/ad1824993f04a0eae67a3a5a5f65010f03ee282b.jpg",
			"/Users/michaljarocinski/Documents/work/ArtGarden/realizacje/f8cbbd3eb7912c6eebc0ff8ad94f2c93a6b0cbcd.jpg",
			"/Users/michaljarocinski/Documents/work/ArtGarden/realizacje/e0d58ac434acf0c8df1e79eb67cbeb57bb805c3a.jpg",
			"/Users/michaljarocinski/Documents/work/ArtGarden/realizacje/daa0c07d51436066f1722f35b0df37dc68917572.jpg",
			"/Users/michaljarocinski/Documents/work/ArtGarden/realizacje/20ecfb177963db5dccaee3bd903293f9578772f6.jpg",
			"/Users/michaljarocinski/Documents/work/ArtGarden/realizacje/24e25abe9cc72bed89a20c7900bea418ff59ab9e.jpg",
			"/Users/michaljarocinski/Documents/work/ArtGarden/realizacje/9ef1a3fe4d89a32018a2533404b8817f23d22976.jpg",
			"/Users/michaljarocinski/Documents/work/ArtGarden/realizacje/e1510fc35cace523fd7948ee2292d81dbdc1f305.jpg",
			"/Users/michaljarocinski/Documents/work/ArtGarden/realizacje/ff80241d0c5836bdd9fe90b55bde5419ad2922c3.jpg",
			"/Users/michaljarocinski/Documents/work/ArtGarden/realizacje/e1f0973fd5ddbf15971db121a46d353f4c81c974.jpg",
			"/Users/michaljarocinski/Documents/work/ArtGarden/realizacje/fd65a79445d1b3ac23546942ca5feefb19ec44c8.jpg",
			"/Users/michaljarocinski/Documents/work/ArtGarden/realizacje/8dd7918362ca05f8ec13d20bc1644955a0e4cff2.jpg",
			"/Users/michaljarocinski/Documents/work/ArtGarden/realizacje/dae6cae03bd20c21ccb9a086b1713eced69829c4.jpg",
			"/Users/michaljarocinski/Documents/work/ArtGarden/realizacje/a768c4c75860391340e51deef87a3e5c2cec2b01.jpg",
			"/Users/michaljarocinski/Documents/work/ArtGarden/realizacje/b72717e2336d50eddeca0997c3d60c47d4201b63.jpg",
			"/Users/michaljarocinski/Documents/work/ArtGarden/realizacje/f2f99cd7f000a10bb79e2be6effc74346dd33d86.jpg",
			"/Users/michaljarocinski/Documents/work/ArtGarden/realizacje/bdb52c02e2dc2d7f70f1eb1439e56c819968edc3.jpg",
			"/Users/michaljarocinski/Documents/work/ArtGarden/realizacje/4f53d65f9247405bbafa01555c5bdf35906b74ba.jpg",
			"/Users/michaljarocinski/Documents/work/ArtGarden/realizacje/0e3a1a0f8ebeac1ea3e97b9eb53e437f815ef064.jpg",
			"/Users/michaljarocinski/Documents/work/ArtGarden/realizacje/83cadea0b47656af667af680d821d2c9d825117e.jpg",
			"/Users/michaljarocinski/Documents/work/ArtGarden/realizacje/5782f66d2e0815041b1ac2c0eb9b3fab63bd02dc.jpg",
			"/Users/michaljarocinski/Documents/work/ArtGarden/realizacje/ca37067b52fe6a77bed50e980061e07527d19df5.jpg",
			"/Users/michaljarocinski/Documents/work/ArtGarden/realizacje/d5db906c6625b73ef36a7936dbb461065ba98425.jpg"



		];

		foreach ($workImages as $image) {
			$work = \App\Models\Work::create([
				'title' => fake()->words(3, true),
				'enabled' => true,
			]);

			$work->addMedia($image)->toMediaCollection();
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
