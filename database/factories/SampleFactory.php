<?php

namespace Database\Factories;

use Creasi\Package\Models\Sample;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Sample>
 */
class SampleFactory extends Factory
{
    protected $model = Sample::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
        ];
    }
}
