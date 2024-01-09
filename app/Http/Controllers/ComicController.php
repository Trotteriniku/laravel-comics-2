<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $comics = Comic::all();
        return view("comics.index", compact("comics"));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        // prendo i dati del form dalla request
        $request->validate([
            'title' => 'required|min:5|unique:comics',
            'description' => 'required',
            'thumb' => 'required',
            'price' => 'required|max:20',
            'sale_date' => 'required',
            'series' => 'required|max:30',
            'type' => 'required'
        ]);
        $formData = $request->all();

        $newComic = Comic::create($formData);
        //$newComic = new Comic();
        // assegno i valori del form al nuovo comic
        //$newComic->fill($formData);
        // salvo il nuovo prodotto
        //$newComic->save();
        return to_route('comics.show', $newComic->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comic  $comic
     */
    public function show(Comic $comic)
    {
        return view("comics.show", compact("comic"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comic  $comic
     */
    public function edit(Comic $comic)
    {
        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comic  $comic
     */
    public function update(Request $request, Comic $comic)
    {
        $formData = $request->all();
        // $comic->title = $formData['title'];
        // $comic->price = $formData['price'];
        // $comic->description = $formData['description'];
        // $comic->type = $formData['type'];
        // $comic->thumb = $formData['thumb'];
        // $comic->sale_date = $formData['sale_date'];
        // $comic->series = $formData['series'];
        $comic->fill($formData);
        $comic->update();
        return to_route('comics.show', $comic->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comic  $comic
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();
        return to_route('comics.index')->with('message', "Il prodotto $comic->title è stato cancellato");
    }
}
