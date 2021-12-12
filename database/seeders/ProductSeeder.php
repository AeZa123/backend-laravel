<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon; //เกี่ยวกับเวลา
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('products')->delete();

        $data = [
            [
                'name' => 'Samsung Galaxy S21',
                'slug' => 'samsung-galaxy-s21',
                'description' => 'Aperiam fugiat alias nobis sunt hic. Quasi dolore autem quo sapiente et distinctio. Dolor ipsum saepe quaerat possimus molestiae placeat iste.',
                'price' => 18500.00,
                'image' => 'https://via.placeholder.com/800x600.png/005429?text=uders',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ];

        Product::insert($data);

        Product::factory(1000)->create();
    }
}
