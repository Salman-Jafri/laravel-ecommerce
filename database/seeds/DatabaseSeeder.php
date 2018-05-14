<?php

use App\Category;
use App\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoriesSeeder::class);
        $this->call(ProductsTableSeeder::class);

        Product::all()->each(function ($product)
        {

            $product->categories()->attach(Category::all()->random(rand(1,3))->pluck('id')->toArray());

        });
    }
}
