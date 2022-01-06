<?php

namespace Database\Factories;

use App\Models\Apb;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApbFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Apb::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->text('50'),
            'path' => $this->faker->text('50'),
        ];
    }
}
