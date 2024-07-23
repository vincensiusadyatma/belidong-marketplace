<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProductOrderController extends Controller
{
    public function index(){
        $my_orders = ProductOrder::where('creator_id', Auth::id())->get();
        
        return view('admin.product_orders.index',[
            'product_orders' => $my_orders
        ]);
    }

    public function transactions(){
        $my_transactions = ProductOrder::where('buyer_id', Auth::id())->get();
        
        return view('admin.product_orders.transactions',[
            'my_transactions' => $my_transactions
        ]);
    }

    public function transactions_details(ProductOrder $productOrder){
      dd($productOrder);
    }
}
