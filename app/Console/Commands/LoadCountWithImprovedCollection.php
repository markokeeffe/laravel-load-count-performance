<?php

namespace App\Console\Commands;

use App\Collections\ImprovedLoadCountCollection;
use App\Item;
use Illuminate\Console\Command;

class LoadCountWithImprovedCollection extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'load-count-improved';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run the "loadCount" method on an Eloquent Collection.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $items = new ImprovedLoadCountCollection(Item::all()->all());

        $items->loadCount(['logs']);

        return 0;
    }
}
