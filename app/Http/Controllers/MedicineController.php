<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\MedicineCategory;
use Illuminate\Support\Facades\Session;

class MedicineController extends Controller
{
    //

    public function validateInputs(){
        $inputs = request()->validate([
            'generic_name' => 'required',
            'purchase_price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'retail_price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'medicine_code' => 'required',
            'grams' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'category_id' => 'required',
            'medicine_name',
            'description'
        ]);
        $inputs['medicine_name'] = request('medicine_name');
        $inputs['description'] = request('description');

        return $inputs;
    }

    public function index(){
        $medicines = Medicine::all();
        return view('medicine.index', [ 'medicines' => $medicines ]);
    }

    public function create(){
        $categories = MedicineCategory::all();
        return view('medicine.create', ['categories' => $categories]);
    }

    public function store(){
        $inputs = $this->validateInputs();

        Medicine::create($inputs);

        request()->session()->flash('message-success', 'Medicine created successfully');

        return redirect()->route('medicine');

    }

    public function edit(Medicine $medicine){
        return view('medicine.edit',['medicine' => $medicine, 'categories' => MedicineCategory::all()]);
    }

    public function update(Medicine $medicine){

        $inputs = $this->validateInputs();

        Medicine::whereId($medicine->id)->update($inputs);

        request()->session()->flash('message-success', 'Medicine updated successfully');

        return redirect()->route('medicine');

    }

    public function destroy(Medicine $medicine){
        $medicine->delete();

        Session::flash('message-danger', 'Category removed successfully');
        return redirect()->route('medicine');
    }







}
