<?php

namespace Database\Seeders;

use App\Models\{Product, ProductVariation, ProductVariationType};

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::factory()
            ->has(ProductVariation::factory()
                ->has(ProductVariationType::factory(), 'type')
                ->count(4), 'variations')
            ->count(5)
            ->create();
    }
}
