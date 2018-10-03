<?php

namespace Modules\Category\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Category\Entities\Category;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CategoryDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $faker = Faker::create();
        for ($i=0; $i < 50 ; $i++) { 
            DB::table('category__categories')->insert([
                'name' => $faker->name,
                'parent_id' => rand(0,50),
                'type' => $faker->randomElement($array = array('industry','interest'))
            ]);
         } 
    }
}
