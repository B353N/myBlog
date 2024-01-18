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
        # Generate Image Name
        $name = $this->faker->word();
        # Generate Image Path
        $path = 'public/images/' . $name . '.jpg';

        return [
            'name' => $name,
            'extension' => 'jpg',
            'path' => $path,
        ];
    }
}
