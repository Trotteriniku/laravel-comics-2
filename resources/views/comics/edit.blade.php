@extends('layouts.app')

@section('title', 'Edit:' . $comic->title)

@section('content')
    <div class="container bg-primary p-3 rounded-3" style="margin: 40px auto">
        <form action="{{ route('comics.update', $comic->id) }}" method="POST"enctype="multipart/form-data">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @csrf
            @method('PUT')
            <input type="text" name="title" id="title" placeholder="inserisci titolo" class="form-control  input-color "
                value="{{ $comic->title }}" required>

            <input type="text" name="price" id="price" placeholder="price" class="form-control  input-color"
                value="{{ $comic->price }}" required>

            <label for="description" class="text-light mt-3">Example textarea</label>
            <textarea class="form-control  input-color" id="description" name="description" placeholder="description"
                rows="3"></textarea>

            <input type="text" name="type" id="type" placeholder="type" class="form-control  input-color"
                value="{{ $comic->type }}" required>

            <input type="text" name="sale_date" id="sale_date" placeholder="sale_date" class="form-control  input-color"
                value="{{ $comic->sale_date }}" required>

            <input type="text" name="series" id="series" placeholder="series" class="form-control  input-color"
                value="{{ $comic->series }}" required>

            <label for="thumb" class="text-light mt-3  ">Seleziona
                un'immagine:</label>
            <input type="url" name="thumb" id="thumb" value="{{ $comic->thumb }}"
                class=" form-control input-color h-25   " placeholder="inserisci un Url" required>

            <button type="submit" class="btn btn-primary  input-color form-control">invia</button>
            <button type="reset" class="btn btn-primary  input-color form-control">resetta</button>
        </form>
    </div>
@endsection
