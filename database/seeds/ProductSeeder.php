<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // How many genres you need, defaulting to 10
        $count = (int)$this->command->ask('How many products do you need?', 10);

        $this->command->info("Creating {$count} products.");

        // Create the Genre
        $products = factory(App\Product::class, $count)->create();

        $this->command->info('Genres Created!');
    }
}
