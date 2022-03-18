<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\Stock;
use Illuminate\Support\Carbon;

class StockController extends Controller
{
    public function validateInputs(){
        $inputs = request()->validate([
            'medicine_id' => 'required',
            'quantity' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'manu_date' => 'required',
            'exp_date' => 'required',
            'pur_date' => 'required'
        ]);
        return $inputs;
    }

    public function index(){
        $stocks_available = Stock::all()->where('quantity_remained', '>',0)
            ->where('exp_date', '>', Carbon::now());
        $stocks_exp = Stock::all()->where('exp_date', '<=', Carbon::now());
        $stocks_finished = Stock::all()->where('quantity_remained', '=',0);

        return view('stock.index',
            ['stocks_available' => $stocks_available,
                'stocks_expired'=> $stocks_exp,
                'stocks_finished' => $stocks_finished
            ]);
    }

    public function create(){
        $medicines = Medicine::all();
        return view('stock.create', [ 'medicines' => $medicines]);
    }

    public function store(){
        $inputs = $this->validateInputs();
        //defaults inputs
        $inputs['status'] = '0';
        $inputs['quantity_remained'] = $inputs['quantity'];

        Stock::create($inputs);

        request()->session()->flash('message-success', 'Stock added successfully');

        return redirect()->route('stock');
    }

    public function edit(Stock $stock){
        $medicines = Medicine::all();
        return view('stock.edit',['stock' => $stock, 'medicines' => $medicines]);
    }

    public function update(Stock $stock){
        if ($stock->quantity != $stock->quantity_remained){
            request()->session()->flash('message-danger', 'Sorry Stock is already in use you can\'t update');
            return redirect()->route('stock');
        } else{
            $input = $this->validateInputs();
            //defaults inputs
            $input['quantity_remained'] = $input['quantity'];
            Stock::whereId($stock->id)->update($input);

            request()->session()->flash('message-success', 'Stock Updated successfully');
            return redirect()->route('stock');
        }

    }

    public function destroy(Stock $stock){

        if ($stock->quantity != $stock->quantity_remained){
            request()->session()->flash('message-danger', 'Sorry Stock is already in use you can\'t update');
            return redirect()->route('stock');
        } else{
            $stock->delete();

            request()->session()->flash('message-success', 'Deleted successfully');
            return redirect()->route('stock');
        }
    }

    public function activate(Stock $stock){
        $stoc = Stock::find($stock->id);
        $stoc->status = 1;
        $stoc->save();

        request()->session()->flash('message-success', 'Stock Activated successfully');
        return redirect()->route('stock');
    }

    public function deactivate(Stock $stock){
        if ($stock->quantity != $stock->quantity_remained){
            request()->session()->flash('message-danger', 'Sorry Stock is already in use you can\'t update');
            return redirect()->route('stock');
        } else{
            $input = Stock::find($stock->id);
            $input->status = 0;
            $input->save();

            request()->session()->flash('message-success', 'Stock Deactivated successfully');
            return redirect()->route('stock');
        }

    }




}
