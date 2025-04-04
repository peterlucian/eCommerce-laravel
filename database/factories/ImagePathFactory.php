<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ImagePath>
 */
class ImagePathFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image_resource_path' => 'storage/images/' . $this->faker->uuid . '.jpg',
            'item_id' => '6',
        ];
    }
}
