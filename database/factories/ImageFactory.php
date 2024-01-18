<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        # Images Array
        $fake_images = [
            'img_bg_1.jpg',
            'img_bg_2.jpg',
            'img_bg_3.jpg',
            'img_bg_4.jpg',
            'img_bg_5.jpg',
        ];

        # Generate Image Name
        $name = $this->faker->word();
        # Generate Image Path
        $path = 'images/' . $this->faker->randomElement($fake_images);

        return [
            'name' => $name,
            'extension' => 'jpg',
            'path' => $path,
        ];
    }
}
