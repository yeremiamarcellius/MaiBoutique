<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    //
    public function home(){
        $items = Item::paginate(8);
        return view('home', compact('items'));
    }

    public function searchPage(){
        $items = Item::paginate(8);
        return view('search', compact('items'));
    }

    public function search(Request $request){
        $items = Item::where('name', 'LIKE', "%$request->search%")->Paginate(8);
        return view('search', compact('items'));
    }

    public function show($id){
        $item = Item::findOrFail($id);
        return view('itemDetail', compact('item'));
    }

    public function delete($id){
        Item::destroy($id);
        return redirect(route('home'));
    }

    public function addPage(){
        return view('addItem');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'image' => 'required|mimes:png,jpg,jpeg',
            'name' => 'required|min:5|max:20|unique:items',
            'description' => 'required|min:5',
            'price' => 'required|integer|min:1000',
            'stock' => 'required|integer|min:1'
        ]);

        $extension = $request->file('image')->getClientOriginalExtension();
        $fileName = $request->name.'.'.$extension;
        $request->file('image')->storeAs('public/image/', $fileName);

        Item::create([
            'image' => $fileName,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock
        ]);

        return redirect(route('home'));
    }
}
