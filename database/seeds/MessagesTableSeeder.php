<?php

use Illuminate\Database\Seeder;

class MessagesTableSeeder extends Seeder
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
            DB::table('messages')->insert([
                'last_name' => str_random(10),
                'first_name' => "blabla",
                'mail' => str_random(10).'@gmail.com',
                'subject' => 'Subject no '.$i,
                'message' => str_random(255),
            ]);
            $i++;
        }

    }
}
