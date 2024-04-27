<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Item;
use App\Models\User;
class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::inRandomOrder()->get();

foreach($users as $user) {
    $itemCount = rand(1, 3);
    
    // Generate the items for this user
    for ($i = 0; $i < $itemCount; $i++) {
        // Create an item using the factory
        Item::factory()->create([
            'user_id' => $user->id
        ]);
    }
}

        Item::factory()->count(5)->create();
    }
}
