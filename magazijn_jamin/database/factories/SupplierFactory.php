<?php

namespace Database\Factories;
namespace App\Models;
namespace App\Http\Controllers;
 
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Http\Request;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supplier>
 */
class SupplierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'LeverancierNaam' => $this->faker->company,
            'ContactPersoon' => $this->faker->name,
            'LeverancierNummer' => $this->faker->unique()->numerify('L##########'),
            'Mobiel' => $this->faker->phoneNumber,
            'IsActief' => 1,
            'Opmerking' => $this->faker->sentence,
            'DatumAangemaakt' => now(),
            'DatumGewijzigd' => now(),
        ];
    }
}
