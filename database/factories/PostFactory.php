<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */


	public $sizes = ["300/400", "300/300", "400/300"];

	public function definition(): array
	{
		return [
			'title' => fake()->text(40),
			'text' => fake()->text(),
			'img' => "https://picsum.photos/id/" . fake()->numberBetween(1, 500) . "/600/600.webp",
			// 'img' => "https://picsum.photos/id/" . fake()->numberBetween(1, 500) . "/" . $this->sizes[fake()->numberBetween(0, count($this->sizes) - 1)],
			'enabled' => fake()->boolean(),
		];
	}
}
