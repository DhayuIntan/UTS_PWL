<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Spatie\LaravelIgnition\Support\Composer\FakeComposer;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TransaksiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = Faker::create();
        return [
            'nama' => $faker->name,
            'mobil' => $faker->randomElement(['avanza', 'innova', 'hiace', 'pajero sport', 'raize', 'rush', 'ertiga']),
            'plat' => $faker->regexify('[A-Z]{1,3} [1-9]\d{0,3} [A-Z]{2}'),
            'tanggal_transaksi' => $faker->date,
        ];
    }
}
