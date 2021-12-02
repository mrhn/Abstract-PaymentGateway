<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

class CaptureOrder extends Component
{
    private Order $order;

    public function __construct(Order $order)
    {
        parent::__construct();

        $this->order = $order;
    }

    public function capture() {
        $this->order->capture();
    }

    public function render()
    {
        return view('livewire.capture-order');
    }
}
