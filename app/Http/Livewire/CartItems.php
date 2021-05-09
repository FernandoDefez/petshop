<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Cart;
use App\Models\Product;

class CartItems extends Component
{
    public $subtotal = 0;
    public $shippingCost = 6.00;
    public $total = 0;

    public $items = [];

    public function increment($item_id)
    {
        Cart::where('id', '=', $item_id)->increment('quantity');
        $this->render();
    }

    public function decrement($item_id, $product_id, $quantity)
    {
        if($quantity == 1){
            $this->destroy($product_id);
        }else{
            Cart::where('id', '=', $item_id)->decrement('quantity');
        }
        $this->render();
    }

    public function render()
    {
        $this->subtotal = 0;

        if (auth()->user()) {
            $this->items = Product::select([
                Product::raw('carts.id as item_id'),
                'carts.quantity',
                'products.id',
                'products.img',
                'products.name',
                'products.slug',
                'products.description',
                'products.price',
                'products.availability'
            ])->join('carts', 'carts.product_id', '=', 'products.id')
                ->where('carts.user_id', '=', auth()->user()->getAuthIdentifier())->get();

            foreach ($this->items as $item){
                $this->subtotal = $this->subtotal + ($item->quantity * $item->price);
            }

            return view('livewire.cart-items', compact($this->items, $this->subtotal, $this->total = $this->subtotal + $this->shippingCost));
        }
        return view('livewire.cart-items', compact($this->items));
    }

    public function destroy($id)
    {
        $user = User::find(auth()->user()->getAuthIdentifier());
        $user->products()->detach($id);
        $this->emit('refresh-cart-items-counter');
    }
}
