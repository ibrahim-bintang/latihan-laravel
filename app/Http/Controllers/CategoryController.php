<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $cats = Category::latest()->paginate(10);

        return view('category.index', compact('cats'));
    }

    public function create(){
        return view('category.create');
    }

    public function store(Request $request){
        $request->validate([
            'category_name' => 'required|min:3|max:256',
        ]);

        Category::create([
            'category_name' => $request->category_name,
        ]);

        return redirect()->route('category.index');
    }

    public function edit(String $id){
        $cat = Category::findOrFail($id);
        return view('category.edit', compact('cat'));
    }

    public function update(Request $request, $id){
        $cat = Category::findOrFail($id);
        
        $request->validate([
            'category_name' => 'required|min:3|max:256'
        ]);

        $cat->update([
            'category_name' => $request->category_name,
        ]);

        return redirect()->route('category.index');
    }

    public function destroy($id): RedirectResponse {
        $cat = Category::findOrFail($id);

        $cat->delete();

        return redirect()->route('category.index');
    }
}
