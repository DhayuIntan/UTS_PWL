<?php
namespace Database\Seeders;

use App\Models\Transaksi;
use App\Models\TransaksiModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Factories\TransaksiFactory;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Transaksi::factory(100)->create();
    }
}
