<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data =
            [
                [
                    'title' => 'About Us',
                    'desc' => 'More Content are coming Soon'
                ],
                [
                    'title' => 'Terms and Condition',
                    'desc' => 'More Content are coming Soon'
                ],
                [
                    'title' => 'Contact Us',
                    'desc' => 'More Content are coming Soon'
                ],
                
            ];
        
        Page::insert($data);
    }
}
