@extends('layouts.app')
@section('content')
    <div class="Myjumbotron"></div>
    <div class="container-sm bg-primary p-2">
        <form action="{{ route('comics.store') }}" method="POST"enctype="multipart/form-data">

            @csrf
            <input type="text" name="title" id="title" placeholder="inserisci titolo"
                class="form-control text-center input-color ">
            <input type="text" name="price" id="price" placeholder="price"
                class="form-control text-center input-color">
            <input type="text" name="description" id="description"
                placeholder="description"class="form-control text-center input-color">
            <input type="text" name="type" id="type" placeholder="type"
                class="form-control text-center input-color">
            <input type="text" name="sale_date" id="sale_date" placeholder="sale_date"
                class="form-control text-center input-color">
            <input type="text" name="series" id="series" placeholder="series"
                class="form-control text-center input-color">

            <div class=" input-group-sm d-flex align-items-center  ">
                <label for="image" class=" w-25 text-center mt-5  input-color   ">Seleziona
                    un'immagine:</label>
                <input type="file" name="thumb" id="thumb" accept="image/*"
                    class="w-75 text-center input-color h-25 mt-5  ">
            </div>

            <button type="submit" class="btn btn-primary text-center input-color form-control">invia</button>
        </form>
    </div>
@endsection
