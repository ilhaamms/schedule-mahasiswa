<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
 
    	for($i = 1; $i <= 20; $i++){
 
    	      // insert data ke table pegawai menggunakan Faker
    		DB::table('schdules')->insert([
    			'hari' => $faker->day,
    			'matkul' => $faker->matkul,
    			'kelas' => $faker->class,
    			'jam' => $faker->clock,
    			'ruang' => $faker->room,
    			'dosen' => $faker->dosen
    		]);
 
    	}
    }
}
