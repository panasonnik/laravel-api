<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Item;
use App\Models;
class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = Models\Users::inRandomOrder()->get();
        foreach($users as $user) {
            $itemCount = rand(1,3);
            Models\Product::factory()->count($itemCount)->create([
                'user_id'=>$user->id
            ]);
        }
        Item::factory()->count(5)->create();
    }
}
