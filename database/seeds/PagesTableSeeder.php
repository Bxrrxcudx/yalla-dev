<?php

use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $i = 1;
        while($i < 11){
            DB::table('pages')->insert([
                'title' => 'title No : '. $i,
                'meta-desc' => 'meta-desc no '.$i,
                'meta-robot' => 'meta-robot no '.$i,
                'slug' => 'slug No : '.$i,
                'description' => str_random(50),
                'content' => str_random(250),
            ]);
            $i++;
        }
    }
}
