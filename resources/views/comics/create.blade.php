@extends('layouts.app')
@section('content')
    <div class="container  bg-primary p-3 rounded-3 " style="margin: 40px auto">
        <form action="{{ route('comics.store') }}" method="POST"enctype="multipart/form-data">
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
            <input type="text" name="title" id="title" value="{{ old('title') }}" placeholder="inserisci titolo"
                class="form-control  input-color @error('title') is-invalid @enderror " required>
            @error('title')
                <div class="text-light">{{ $message }}</div>
            @enderror
            <input type="text" name="price" id="price" placeholder="price" class="form-control  input-color"
                required>

            <input type="text" name="description" id="description"
                placeholder="description"class="form-control  input-color" required>


            <label for="description" class="text-light mt-3">Example textarea</label>
            <textarea class="form-control  input-color" id="description" name="description" placeholder="description"
                rows="3"></textarea>

            <input type="text" name="type" id="type" placeholder="type" class="form-control  input-color"
                required>

            <input type="text" name="sale_date" id="sale_date" placeholder="sale_date" class="form-control  input-color"
                required>

            <input type="text" name="series" id="series" placeholder="series" class="form-control  input-color"
                required>


            <label for="description" class="text-light mt-3  ">Seleziona
                un'immagine:</label>
            <input type="url" name="thumb" id="thumb" class=" form-control input-color h-25   "
                placeholder="inserisci un Url" required>


            <button type="submit" class="btn btn-primary  input-color form-control">invia</button>
            <button type="reset" class="btn btn-primary  input-color form-control">resetta</button>
        </form>
    </div>
@endsection
