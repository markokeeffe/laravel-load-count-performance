<?php

namespace Tests\Unit;

use App\Collections\ImprovedLoadCountCollection;
use App\Item;
use PHPUnit\Framework\TestCase;

class ItemsTest extends TestCase
{
    public function testLoadCountPerformanceWithLaravelCollection()
    {
        $items = Item::all();

        $items->loadCount(['logs']);
    }

    public function testLoadCountPerformanceWithImprovedCollection()
    {
        $items = new ImprovedLoadCountCollection(Item::all()->all());

        $items->loadCount(['logs']);
    }
}
