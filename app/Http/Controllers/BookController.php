<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class BookController extends Controller
{
    public function index(){
        // retrieves 10 latest data from books table
        $books = Books::all();
        $bookdel = Books::withTrashed()->get();

        // returns view with 10 latest entries from books table compacted with it 
        return view('books.index', compact(['books','bookdel']));
    }

    public function create(){
        $cats = Category::all();
        $pubs = Publisher::all();

        return view('books.create', compact(['cats','pubs']));
    }

    public function store(Request $request): RedirectResponse {
        $request->validate([
            'image'         => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'title'         => 'required|min:3|max:256',
            'category'      => 'required|exists:categories,id',
            'author'        => 'required|min:3',
            'publisher'     => 'required|exists:publishers,id',
        ]);

        $image = $request->file('image');
        $image->storeAs('public/books', $image->hashName());

        Books::create([
            'image'         => $image->hashName(),
            'title'         => $request->title,
            'category'      => $request->category,
            'author'        => $request->author,
            'publisher'     => $request->publisher,
        ]);

        return redirect()->route('books.index');
    }

    public function edit(String $id){
        $book = Books::findOrFail($id);
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, $id){
        $book = Books::findOrFail($id);
        
        $request->validate([
            'image'         => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'title'         => 'required|min:3|max:256',
            'category'      => 'required|exists:categories,id',
            'author'        => 'required|min:3',
            'publisher'     => 'required|exists:publishers,id',
        ]);
        
        if($request->hasFile('image')){
            Storage::delete('books/'.$book->image);

            $image = $request->file('image');
            $image->storeAs('books', $image->hashName());

            $book->update([
                'image'         => $image->hashName(),
                'title'         => $request->title,
                'category'      => $request->category,
                'author'        => $request->author,
                'publisher'     => $request->publisher,
            ]);
        }else{
            $book->update([
                'title'         => $request->title,
                'category'      => $request->category,
                'author'        => $request->author,
                'publisher'     => $request->publisher,
            ]);
        }


        return redirect()->route('books.index');
    }

    public function destroy($id): RedirectResponse {
        $book = Books::findOrFail($id);

        $book->delete();

        return redirect()->route('books.index');
    }
}
