<?php

use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $i = 1;
        while($i < 5){
            DB::table('news')->insert([
                'title' => 'Titre no. ' . $i,
                'authors' => 'Yalla Enfants',
                'description' => 'Description no. '.$i,
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias consectetur deserunt doloremque dolores, eaque eos eum inventore minima mollitia nam nihil non odit possimus quae ratione reiciendis temporibus vitae voluptate.'
            ]);
            $i++;
        }
    }
}
