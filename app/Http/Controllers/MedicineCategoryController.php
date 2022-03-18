<?php

namespace App\Http\Controllers;

use App\Models\MedicineCategory;
use Illuminate\Support\Facades\Session;

class MedicineCategoryController extends Controller
{
    public function index(){
        $categories = MedicineCategory::all();
        //dd($categories);
        return view('medicineCategory.index', ['categories' => $categories]);
    }

    public function create(){
        return view('medicineCategory.create');
    }

    public function store(){
        //dd(request()->all());
        $input = request()->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        MedicineCategory::create($input);
        request()->session()->flash('message-success', 'Category created successfully');

        return redirect()->route('medicine.category');
    }

    public function edit(MedicineCategory $category){
        return view('medicineCategory.edit', ['category' => $category]);
    }

    public function update(){

        $input = request()->validate([
            'name' => 'required',
            'description' => 'required'
        ]);


        MedicineCategory::whereId(request('id'))->update($input);
        request()->session()->flash('message-warning', 'Category Updated successfully');

        return redirect()->route('medicine.category');
    }

    public function destroy(MedicineCategory $category){
        $category->delete();

        Session::flash('message-danger', 'Category removed successfully');
        return redirect()->route('medicine.category');
    }

}
