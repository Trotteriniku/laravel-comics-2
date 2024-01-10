@extends('layouts.app')

@section('title', 'comics')

@section('content')
    <main>
        <div style="background-color: #222222">
            <div class="container position-relative  py-4 px-0 text-center">
                <div>
                    <a href="{{ route('comics.create') }}" class=" btn btn-primary text-end  ">Crea nuovo fumetto</a>
                    <form action="{{ route('comics.index') }}" method="GET">
                        <select name="search" id="search">
                            <option value="">All</option>
                            <option value="comic book">comic book</option>
                            <option value="graphic novel">graphic novel</option>
                            <option value="manga">manga</option>
                        </select>
                        <button type="submit">cerca</button>
                    </form>
                </div>
                @if (session()->has('message'))
                    <div class="alert alert-success mt-3">{{ session()->get('message') }}</div>
                @endif
                <div class=" row row-cols-md-6 row-cols-sm-3">


                    @foreach ($comics as $comic)
                        <a href=" {{ route('comics.show', $comic->id) }}" class=" text-decoration-none ">
                            <div class="card rounded-0 p-0 border-0 my-3 h-100   " style="max-width: 250px;">

                                <div class="myimgcard">
                                    <img src="{{ $comic->thumb }}" class="card-img-top w-100  " alt="series">
                                </div>

                                <div class="card-body px-0">
                                    <h6 class="card-title text-uppercase text-light">{{ $comic->title }}</h6>
                                </div>
                                <form action="{{ route('comics.destroy', $comic->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="cancel-button btn  btn-outline-warning w-100 "
                                        data-item-title{{ $comic->title }}>Remove</button>
                                </form>

                            </div>
                        </a>
                    @endforeach
                </div>
                <button class="btn btn-primary rounded-0   fw-bolder text-uppercase py-2  position-absolute  "
                    style="bottom:97%; left:0; padding: 0 4em">Load
                    More</button>

                <button class="btn btn-primary rounded-0   fw-bolder text-uppercase py-2 px-5 ">Load More</button>
            </div>
        </div>
        @include('partials.footerblu')
    </main>
    @include('partials.modal_delete');
@endsection
