<?php

use Illuminate\Database\Seeder;

class NewslettersTableSeeder extends Seeder
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
            DB::table('newsletters')->insert([
                'slug' => str_random(10).'@gmail.com',
            ]);
            $i++;
        }
    }
}
