<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Grocery; 

class GrocerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Add some sample groceries manually
        Grocery::create([
            'name' => 'Apple',
            'quantity' => 10,
            'price' => 1.99,
        ]);

        Grocery::create([
            'name' => 'Banana',
            'quantity' => 15,
            'price' => 0.99, 
        ]);

        \App\Models\Grocery::factory(30)->create();
    }
}
