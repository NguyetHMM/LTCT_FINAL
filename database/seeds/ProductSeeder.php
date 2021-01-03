<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $fake = Faker::create();
        $fake->addProvider(new \Xvladqt\Faker\LoremFlickrProvider($fake));
        $c_n = ["Men", "Lady", "Boy", "Girl", "Baby" ];
        for($i = 0; $i<10;$i++){
            $cate = rand(0,4);
            $product[]  = [
                'category_id' => $cate+1,
                'brand_id' => rand(1,6),
                'product_content' => $fake->lastName,
                'product_name' => $fake->lastName,
                'product_desc' => $fake->text,
                'product_price' => 10000,
                'product_image' => $fake->image(storage_path('app\public\images'), 480, 650, ['colors'], false),
                'product_status' => 1
            ];
        }
        DB::table('tbl_product')->insert($product);
    }   
}
