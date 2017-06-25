<?php

use Illuminate\Database\Seeder;

class SubscribersTableSeeder extends Seeder
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
            DB::table('subscribers')->insert([
                'first-name' => "Molika",
                'last-name' => str_random(10),
                'tel' => str_random(10),
                'mail' => str_random(10).'@gmail.com',
                'address' => str_random(50),
                'activity' => str_random(15),
                'city' => str_random(10),
            ]);
            $i++;
        }
    }
}
