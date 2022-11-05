<?php


namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class LivreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(20),
            'desc' => $this->faker->text(),
            'author' => $this->faker->name(6),
            'price' => $this->faker->randomFloat(2, 0, 100),
            'image' => $this->faker->imageUrl(360, 360, 'animals', true, 'dogs', true, 'jpg'),
        ];
    }
}
