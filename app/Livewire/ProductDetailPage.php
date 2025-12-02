<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\Title;
use App\Helpers\CartManagement;
use App\Livewire\Partials\Navbar;
use Filament\Notifications\Notification; // <--- 1. Import Notification

#[Title('Product Detail - DCodeMania')]
class ProductDetailPage extends Component
{
    public $slug;
    public $quantity = 1;

    public function mount($slug) {
        $this->slug = $slug;
    }

    public function increaseQty() {
        $this->quantity++;
    }

    public function decreaseQty() {
        if ($this->quantity > 1) {
            $this->quantity--;
        }
    }

    // Add product to cart method
    public function addToCart($product_id) {
        // FIX 2: Use 'addItemToCartWithQty' to respect the selected quantity
        $total_count = CartManagement::addItemToCartWithQty($product_id, $this->quantity);

        $this->dispatch('update-cart-count', total_count: $total_count)->to(Navbar::class);

        // FIX 3: Add the success notification back
        Notification::make()
            ->title('Product added to cart successfully!')
            ->success()
            ->send();
    }

    public function render()
    {
        return view('livewire.product-detail-page', [
            'product' => Product::where('slug', $this->slug)->firstOrFail(),
        ]);
    }
}