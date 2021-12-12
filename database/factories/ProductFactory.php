<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(3, true),
            'slug' => $this->faker->slug(3, false),
            'description' => $this->faker->text(),
            'price' => $this->faker->randomFloat(2,100,10000),// 2 = ทศนิยม, 100 = ราคาเริ่มต้น, 10000 = ราคาไม่เกิน
            'image' => $this->faker->imageUrl(800,800),
            'user_id' => $this->faker->randomNumber(1,99) //เอาไอดี 1-99 คนแรก
        ];
    }
}
