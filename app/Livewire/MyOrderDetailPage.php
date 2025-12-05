<?php

namespace App\Livewire;

use App\Models\Address;
use App\Models\Order;
use App\Models\OrderItem;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Order Detail - DCodemania')]
class MyOrderDetailPage extends Component
{
    public $order_id;

    public function mount($order_id){
        $this->order_id = $order_id;
    }

    public function render()
    {
        $order_items = OrderItem::with('product')->where('order_id', $this->order_id)->get();
        $address = Address::where('order_id', $this->order_id)->first();
        $order = Order::findOrFail($this->order_id);
        return view('livewire.my-order-detail-page', [
            'order_items' => $order_items,
            'address' => $address,
            'order' => $order 
        ]);
    }
}