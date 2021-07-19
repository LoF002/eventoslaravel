<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Category;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $events = Event::all();
        return view('brand.index', compact('events', 'categories'));
    }//fin de la funcion index

    public function asdshow($id)
    {
        $categories = Category::all();
        $events = Event::all();
        return view('brand.sectionCategorie', compact('id', 'events', 'categories'));
    }//fin de la funcion filter

    public function show($id)
    {
        $categories = Category::all();
        $events = Event::all();
        $event = Event::find($id);
        $id = $event->categories_id;
        return view('brand.event', compact('event', 'categories', 'events', 'id'));
    }//fin de la funcion show

}//fin del controlador