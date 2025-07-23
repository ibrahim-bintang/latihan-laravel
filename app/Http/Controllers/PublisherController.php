<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class PublisherController extends Controller
{
    public function index(){
        $pubs = Publisher::latest()->paginate(10);

        return view('publisher.index', compact('pubs'));
    }

    public function create(){
        return view('publisher.create');
    }

    public function store(Request $request){
        $request->validate([
            'publisher_name' => 'required|min:3|max:256',
        ]);

        Publisher::create([
            'publisher_name' => $request->publisher_name,
        ]);

        return redirect()->route('publisher.index');
    }

    public function edit(String $id){
        $pub = Publisher::findOrFail($id);
        return view('publisher.edit', compact('pub'));
    }

    public function update(Request $request, $id){
        $pub = Publisher::findOrFail($id);
        
        $request->validate([
            'publisher_name' => 'required|min:3|max:256'
        ]);

        $pub->update([
            'publisher_name' => $request->publisher_name,
        ]);

        return redirect()->route('publisher.index');
    }

    public function destroy($id): RedirectResponse {
        $pub = Publisher::findOrFail($id);

        $pub->delete();

        return redirect()->route('publisher.index');
    }
}
