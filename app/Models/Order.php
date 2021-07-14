<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmationShopping;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'total',
        'email',
        'name',
        'address_line_1',
        'address_line_2',
        'admin_area_1',
        'admin_area_2',
        'postal_code',
        'country_code'
    ];


    public static function createFromResponse($response){

        $email = $response->result->payer->email_address;
        $shipping = $response->result->purchase_units[0];
        $amount = $shipping->payments->captures[0]->amount->value;
        $params = (array)$shipping->shipping->address;
        $params['name'] = $shipping->shipping->name->full_name;
        $params['total'] = $amount;
        $params['email'] = $email;
        $params['user_id'] = $response->user_id;

        return Order::create($params);
    }

    public static function sendNotification($response){
        $user = User::find(auth()->user()->getAuthIdentifier());
        $items = Product::select([
            Product::raw('carts.id as item_id'),
            'carts.quantity',
            'carts.total_price',
            'products.name',
            'products.slug',
            'products.price',
        ])->join('carts', 'carts.product_id', '=', 'products.id')
            ->where('carts.user_id', '=', $user->id)->get();

        Mail::to($response->result->payer->email_address)->send(new ConfirmationShopping($items, $user, $response));
        Mail::to($user->email)->send(new ConfirmationShopping($items, $user, $response));

        self::updateProducts();

        Cart::where('user_id', '=', $user->id)->delete();
    }

    public static function updateProducts(){

        $user = User::find(auth()->user()->getAuthIdentifier());
        $items = Product::select([
            'carts.quantity',
            'products.id',
            'products.availability',
        ])->join('carts', 'carts.product_id', '=', 'products.id')
            ->where('carts.user_id', '=', $user->id)->get();

        foreach ($items as $item){
            Product::where('id', '=', $item->id)->decrement('availability', $item->quantity);
        }
    }
}
