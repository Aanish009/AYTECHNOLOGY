<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            ['key' => 'site_name', 'value' => 'Fire Academy', 'group' => 'general'],
            ['key' => 'site_tagline', 'value' => 'Learn Fire Safety. Save Lives.', 'group' => 'general'],
            ['key' => 'site_email', 'value' => 'info@fireacademy.in', 'group' => 'general'],
            ['key' => 'site_phone', 'value' => '+91-9106330166', 'group' => 'general'],
            ['key' => 'site_address', 'value' => 'Vadodara, Gujarat, India', 'group' => 'general'],
            ['key' => 'primary_color', 'value' => '#2B1810', 'group' => 'appearance'],
            ['key' => 'secondary_color', 'value' => '#FF6B00', 'group' => 'appearance'],
            ['key' => 'accent_color', 'value' => '#FFD700', 'group' => 'appearance'],
            ['key' => 'razorpay_key_id', 'value' => '', 'group' => 'payment'],
            ['key' => 'razorpay_key_secret', 'value' => '', 'group' => 'payment'],
            ['key' => 'gemini_api_key', 'value' => '', 'group' => 'ai'],
            ['key' => 'openai_api_key', 'value' => '', 'group' => 'ai'],
            ['key' => 'ai_provider', 'value' => 'gemini', 'group' => 'ai'],
        ];

        foreach ($settings as $setting) {
            DB::table('settings')->updateOrInsert(
                ['key' => $setting['key']],
                array_merge($setting, ['created_at' => now(), 'updated_at' => now()])
            );
        }
    }
}
