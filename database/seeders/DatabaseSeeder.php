<?php

namespace Database\Seeders;

use App\Models\Suggestion;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $users = User::factory()->count(20)->create();

        $users->each(function ($user) {
            Suggestion::factory()->create([
                'user_id' => $user->id,
                'description' => 'Description de la suggestion pour ' . $user->name,
            ]);
        });
    }
}
