<?php

use App\Item;
use App\ItemLog;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Item::class, 500)->create()->each(function ($item) {
            factory(ItemLog::class, 1000)->create([
                'item_id' => $item->id,
            ]);
        });
    }
}
