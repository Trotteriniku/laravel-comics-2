<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\Comic;
use Illuminate\Http\Request;
use App\Http\Requests\StoreComicRequest;
use App\Http\Requests\UpdateComicRequest;
use Illuminate\View\View;


class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request): View
    {
        if (!empty($request->query('search'))) {
            $search = $request->query('search');
            $comics = Comic::where('type', $search)->get();
            return view("comics.index", compact("comics"));

        } else {
            $comics = Comic::all();
        }
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
    public function store(StoreComicRequest $request)
    {
        // prendo i dati del form dalla request
        // $request->validate([
        //     'title' => 'required|min:5|max:255|unique:comics',
        //     'description' => 'required',
        //     'thumb' => 'url',
        //     'price' => 'required|max:20',
        //     'sale_date' => 'required',
        //     'series' => 'required|max:30',
        //     'type' => 'required'
        // ]);


        $formData = $request->validated();

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
    public function update(UpdateComicRequest $request, Comic $comic)
    {
        $formData = $request->validated();

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

    private function validation($data)
    {
        $validator = Validator::make($data, [
            'title' => 'required|min:5|max:255|unique:comics',
            'description' => 'required',
            'thumb' => 'url',
            'price' => 'required|max:20',
            'sale_date' => 'required',
            'series' => 'required|max:30',
            'type' => 'required'
        ], [
            'title.required' => 'Il campo titolo è obbligatorio',
            'title.min' => 'Il campo titolo deve avere almeno :min caratteri',
            'title.max' => 'Il campo titolo deve avere massimo :max caratteri',
        ])->validate();

        return $validator;
    }
}
