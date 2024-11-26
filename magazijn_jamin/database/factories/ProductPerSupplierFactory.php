<?php

namespace Database\Factories;
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\ProductPerSupplier;
use App\Models\Supplier;
use App\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductPerSupplier>
 */
class ProductPerSupplierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'LeverancierId' => \App\Models\Supplier::factory(),
            'ProductId' => \App\Models\Product::factory(),
            'DatumLevering' => $this->faker->date(),
            'Aantal' => $this->faker->numberBetween(1, 100),
            'DatumEerstVolgendeLevering' => $this->faker->date(),
            'IsActief' => $this->faker->boolean(),
            'Opmerking' => $this->faker->sentence(),
            'DatumAangemaakt' => now(),
            'DatumGewijzigd' => now(),
        ];
    }
}
