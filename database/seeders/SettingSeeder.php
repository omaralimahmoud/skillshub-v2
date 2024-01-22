<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            'key' => 'email',
            'value' => 'md@examples.com',
        ]);

        Setting::create([
            'key' => 'phone',
            'value' => '01159449302',
        ]);

        Setting::create([
            'key' => 'facebook',
            'value' => 'https://www.facebook.com/login/',
        ]);

        Setting::create([
            'key' => 'instagram',
            'value' => 'https://www.instagram.com/',
        ]);
    }
}
