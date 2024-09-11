<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class RingsAttributesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'shapes' => [
                'Round',
                'Oval',
                'Emerald',
                'Radiant',
                'Pear',
                'Cushion',
                'Elongated Cushion',
                'Elongated Hexagon',
                'Marquise',
                'Princess',
                'Asscher',
                'Heart',
            ],
            'metal_types' => [
                'Platinum',
                '18k Yellow Gold',
                '18k Red Gold',
                '18k White Gold',
            ],
            'setting_styles' => [
                'Trilogy',
                'Solitaire',
                'Halo',
                'Toi et Moi',
            ],
            'band_types' => [
                'Plain',
                'Pave',
                'Accents',
            ],
            'setting_profiles' => [
                'High Set',
                'Low set',
            ],
            'stone_types' => [
                'Lab-Grown Diamond',
                'Coloured Lab-Grown Diamond',
                'Moissanite',
                'Sapphire',
            ],
        ];

        foreach ($data as $table => $values) {
            foreach ($values as $value) {
                DB::table($table)->insert([
                    'name' => $value,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
