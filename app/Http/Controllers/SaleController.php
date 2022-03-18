<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Medicine;
use App\Models\sale;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use phpDocumentor\Reflection\Types\Array_;

class SaleController extends Controller
{
    //
    public function validateInputs(){
        $inputs = request()->validate([
            'stock_id' => 'required',
            'quantity' => 'required|regex:/^\d+(\.\d{1,2})?$/'
        ]);
        return $inputs;
    }
    public function index(){
        $sales = sale::all();
        return view('sale.index', ['sales' => $sales]);
    }

    public function create(){
        $stocks_available = Stock::all()->where('quantity_remained', '>',0)
            ->where('exp_date', '>', Carbon::now())
            ->where('status', '=', 1 );
        $cart_available = Cart::all();
        return view('sale.create',  [
            'stocks_available' => $stocks_available,
            'cart_available' => $cart_available
        ]);
    }

    public function store(){
        //$inputs = null;
        $cart_available = Cart::all();
        foreach ($cart_available as $cart){
            $inputs['medicine_id'] = $cart->medicine_id;
            $inputs['quantity'] = $cart->quantity;
            $inputs['purchase_price'] = $cart->purchase_price;
            $inputs['retail_price'] = $cart->retail_price;
            $inputs['total_price'] = $cart->total_price;
            $inputs['stock_id'] = $cart->stock_id;
            sale::create($inputs);
            $cart->delete();
        }

        //request()->session()->flash('message-success', ' added successfully');
        return redirect()->back();
    }

    public function addToCart(){
        //reduce quantity
        $inputs = $this->validateInputs();
        $stock_available = Stock::find($inputs['stock_id']);
        $medicine = Medicine::find($stock_available->medicine_id);
        if ((int) $inputs['quantity'] > (int) $stock_available->quantity_remained){
            return redirect()->back()->withErrors(['quantity' => 'there is no enough quantity']);

        }
        $quantity_remained = (int) $stock_available->quantity_remained - (int) $inputs['quantity'];
        $stock_available->update(['quantity_remained' => $quantity_remained]);
        //add to cart
        $cart_inputs['medicine_id'] = $stock_available->medicine_id;
        $cart_inputs['quantity'] = $inputs['quantity'];
        $cart_inputs['purchase_price'] = $medicine->purchase_price;
        $cart_inputs['retail_price'] = $medicine->retail_price;
        $cart_inputs['total_price'] = (float)$medicine->retail_price * (float)$inputs['quantity'];
        $cart_inputs['stock_id'] = $stock_available->id;
        Cart::create($cart_inputs);

        //request()->session()->flash('message-success', ' added successfully');
        return redirect()->back();
    }

    public function cartDestroy(Cart $cart){
        //$stock = Stock::find($cart->stock_id);
        $quantity_remained = (int) $cart->quantity + (int) $cart->stock->quantity_remained;
        $cart->stock->update(['quantity_remained' => $quantity_remained]);
        $cart->delete();
        return redirect()->back();
    }











}
