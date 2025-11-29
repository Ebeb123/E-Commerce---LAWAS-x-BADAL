<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\Title;
use App\Helpers\CartManagement;
use App\Livewire\Partials\Navbar;
//use Jantinnerezo\LivewireAlert\LivewireAlert;



#[Title('Product Detail - DCodeMania')]
class ProductDetailPage extends Component
{
        //use LivewireAlert;

        public $slug;
        public $quantity = 1;

        public function mount ($slug){
            $this->slug = $slug;
        }

         public function increaseQty()
    {
        $this->quantity++;
    }

    public function decreaseQty ()
    {
        if ($this->quantity > 1) {
            $this->quantity--;
        }
    }

        // add product to cart method

   public function addToCart($product_id)
{
    $total_count = CartManagement::addItemToCart($product_id, $this->quantity);
    $this->dispatch('update-cart-count', total_count: $total_count)->to(Navbar::class);
    $this->dispatch('cart-updated');
}


        public function render()
    {
        return view('livewire.product-detail-page', [
            'product' => Product::where('slug', $this->slug)->firstOrfail(),
        ]);
    }
}