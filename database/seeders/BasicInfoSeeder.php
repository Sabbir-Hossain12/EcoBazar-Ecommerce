<?php

namespace Database\Seeders;

use App\Models\BasicInfo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BasicInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=[
            'email'=>"info@ecobazar.com",
            'phone_1'=>'01xxxxxxxxx',
            'fb_link'=>'facebook.com/ecobazar',
            'p_link'=>'pinterest.com/ecobazar',
            'x_link'=>'x.com/ecobazar',
            'youtube_link'=>'youtube.com',
            'insta_link'=>'insta.com',
            
            
        ];
        
        BasicInfo::create($data);
    }
}
