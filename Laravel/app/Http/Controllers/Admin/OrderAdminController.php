<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderAdminController extends Controller
{
    public function bladeOrders(){
        $users=User::all();
        $products=Product::all();
        $orders=Order::all();

        return view('admin.orders', ['orders' => $orders, 'products'=> $products, 'users' => $users]);
    }

    public function bladeUpdateOrder(Request $request){
        $order = $request->validate([
            'status' => ['required', 'string', 'max:50'],
       ]);

        $order = Order::find($request->id);
        if($order){
          $order->status=$request->status;
          $order->save();
        }

        return $this->bladeOrders()->with('message', 'Order Status Modifié');
    }

    public function bladeDeleteOrder(Request $request){
        $order = Order::find($request->id);
        if($order){
            $order->delete();
            return $this->bladeOrders()->with('message', 'Order Supprimé');
        }
    }

    public function bladeCreateOrder(Request $request){
         $order = $request->validate([
             'status' => ['required', 'string', 'max:50'],
             'userOrder' => ['required', 'string', 'max:50'],
             'productsOrder' => ['required', 'string', 'max:50'],
             'productsOrder' => ['nullable', 'string', 'max:50'],          
        ]);

        $order = new Order();
        $order->status = $request->input('status');
        $order->user_id = $request->input('userOrder');
        $order->save();
        foreach($request->input('productsOrder') as $product){
            $order->products()->attach($product);
        }

        return $this->bladeOrders()->with('message', 'Order Crée');
    }

    public function searchOrders(Request $request){
        $search = $request->input('search');

        $results = DB::table('orders')
        ->join('users', 'orders.user_id', '=', 'users.id')
        ->join('order_products', 'orders.id', '=', 'order_products.order_id')
        ->join('products', 'order_products.product_id', '=', 'products.id')
        ->where('name', 'like', "%$search%")
        ->orWhere('status', 'like', "%$search%")
        ->orWhere('first_name', 'like', "%$search%")
        ->orWhere('last_name', 'like', "%$search%")->get();

        return $this->bladeOrders()->with('results', $results);
    }
}
