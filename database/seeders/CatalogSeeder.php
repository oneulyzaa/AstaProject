<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;
use App\Models\Material;
use App\Models\CustomizationOption;

class CatalogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = Category::create([
            'name' => 'Tracktop & Jaket', 
            'slug' => 'tracktop-jaket', 
            'sort_order' => 1,
        ]);

        $product = Product::create([
            'category_id' => $category->id,
            'name' => 'Tracktop Custom',
            'slug' => 'tracktop-custom',
            'starting_price' => 135000,
            'min_order' => 12,
            'is_featured' => true,
        ]);

        foreach ([['Diadora', 135000], ['Lotto', 135000], ['Taslan Milky', 160000], ['Taslan 2N', 160000]] as [$n, $p]) {
            $m = Material::create(['name' => $n, 'price' => $p]);
            $product->materials()->attach($m->id);
        }

        foreach ([
            ['Rib Kerah', 5000], 
            ['Zipper Pendek', 5000], 
            ['Zipper Panjang', 10000],
            ['Kombinasi Badan', 3000], 
            ['Kombinasi Lengan', 3000]
        ] as [$n, $p]) {
            $o = CustomizationOption::create(['name' => $n, 'price' => $p]);
            $product->options()->attach($o->id);
        }
    }
}