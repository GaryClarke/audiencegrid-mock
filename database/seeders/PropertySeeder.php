<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\Property;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $profiles = Profile::all();

        foreach ($profiles as $profile) {
            Property::factory(3)->create([
                'profile_id' => $profile->id,
            ]);
        }
    }
}
