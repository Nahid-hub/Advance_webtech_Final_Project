<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HotelregSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Hotelreg::factory()->create([
            'Hotel_Name'=> 'Saintmartin hotel',
            'Email'=> 'nahid7843@gmail.com',
            'Password'=> '123789',
            'Role'=> 'HotelAdmin',
            'Type'=> 'Three Star',
            'Place'=> 'Dhaka',
            'Address'=> 'RN, Road, Dhaka',
            'Phone_Number'=> '01867568955',
        ]);
    }
} 