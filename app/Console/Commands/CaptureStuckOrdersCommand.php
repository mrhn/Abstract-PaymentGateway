<?php

namespace App\Console\Commands;

use App\Models\Order;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Collection;

class CaptureStuckOrdersCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'orders:capture-stuck';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Capture stuck orders';


    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Order::pending()->chunkById(200, function (Collection $orders) {
            $orders->each->capture();
        });
    }
}
