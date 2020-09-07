<?php

namespace App\Console\Commands;

use App\Item;
use Illuminate\Console\Command;

class LoadCountWithLaravelCollection extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'load-count-laravel';

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
        $items = Item::all();

        $items->loadCount(['logs']);

        return 0;
    }
}
