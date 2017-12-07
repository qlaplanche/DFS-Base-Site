<?php

namespace App\Http\Controllers;

use App\User;
use App\Item;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ExampleController extends Controller
{
    /*
    * Example of a controller for an item
    */
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth'); //Connexion needed
    }

    /**
     * Show the item list
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('item.index', ['items' => Item::all()->sortBy('id')->paginate(15)]);
    }

    /**
     * Create new item
     *
     * @return \Illuminate\Http\Response
     */
    public function createItem(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:50',
            'quantity' => 'required|max:50',
            'description' => 'required|max:300',
        ]);

        $item = new Item();
        $item->name = $request->input("name");
        $item->quantity = $request->input("quantity");
        $item->description = $request->input("description");


        $message = 'There was an error';
        if ($request->item()->save($item)) {
            $message = 'Item successfully created!';
        }

        return redirect()->route('item.index')->with('message', $message);
    }

    /**
     * Get information about a item
     *
     * @return \Illuminate\Http\Response
     */
    public function getItem($id)
    {
        return view('item.show', ['item' => Item::findOrFail($id)]);      
    }

    /**
     * Get information about a item for an edition
     *
     * @return \Illuminate\Http\Response
     */
    public function getEditItem($id)
    {
        return view('item.edit', ['item' => Item::findOrFail($id)]);      
    }

    /**
     * Edit a item -> here the post version result of a form in item.edit
     *
     * @return \Illuminate\Http\Response
     */
    public function editItem(Request $request, $id)
    {
         $this->validate($request, [
            'name' => 'required|max:50',
            'quantity' => 'required|max:50',
            'description' => 'required|max:300',
        ]);

        $item = Item::findOrFail($id);
        if(!$item) return redirect()->route('item.index')->with('message', 'This item doesn\'t exist');
        if (Auth::id() != $item->owner_id) {
            return redirect()->route('item.index')->with('message', 'You are not the owner of this item');
        }

        $item->name = $request->input("name");
        $item->quantity = $request->input("quantity");
        $item->description = $request->input("description");
        $item->update();
        $message = 'Item updated!';

        return back()->with('message', $message);
    }

    /**
     * Delete a item
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteItem(Request $request, $id)
    {
        $item = Item::findOrFail($id);

        if(!$item) return redirect()->route('item.index')->with('message', 'This item doesn\'t exist');
        if (Auth::id() != $item->owner_id) {
            return redirect()->route('home')->with('message', 'You are not the owner of this item!');
        }

        $item->delete();
        return redirect()->route('item.index')->with('message', "Item deleted!");
    }



}
