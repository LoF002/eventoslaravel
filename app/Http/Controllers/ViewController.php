<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Category;
use App\Models\Bill;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $events = Event::all();
        return view('brand.index', compact('events', 'categories'));
    } //fin de la funcion index

    public function filterCategory($id)
    {
        $categories = Category::all();
        $events = Event::all();
        return view('brand.sectionCategorie', compact('id', 'events', 'categories'));
    } //fin de la funcion filter

    public function show($id)
    {
        $categories = Category::all();
        $events = Event::all();
        $event = Event::find($id);
        $id = $event->categories_id;
        return view('brand.event', compact('event', 'categories', 'events', 'id'));
    } //fin de la funcion show
    public function store(Request $request)
    {
        $categories = Category::all();
        $events = Event::all();
        
        $request->validate([
            'title' => 'required',
            'fullname' => 'required',
            'email' => 'required',
            'total' => 'required',
        ]);

        $event=Event::find($request->identificator);
        $event->inventory-= $request->totalqty; 
        if($event->inventory <= 0){
            $event->available=false;
        }
        $event->save();

        $data = $request->all();

        Bill::create($data);

        return view('brand.index', compact('events', 'categories'));
    }
}//fin del controlador