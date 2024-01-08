@extends('layouts.app')

@section('title, comic_details')

@section('content')
    <main>
        <div class="Myjumbotron"></div>
        <div class="bg-primary p-5 position-relative mb-5"></div>
        <div class="container d-flex gap-5 mb-5 ">
            <div class=" w-75 ">
                <img src="{{ $comic->thumb }}" alt="" class=" position-absolute "
                    style="width: 230px;  top:35%; left:16%;">

                <h4 class=" text-uppercase ">{{ $comic->title }}</h4>
                <div class="px-4 py-3 w-100 mb-3" style="background-color:green; border: groove  green; ">
                    <span style="color: lightgreen; ">U.S. price:<span class="text-light">{{ $comic->price }}</span></span>
                </div>
                <p>{{ $comic->description }}</p>
            </div>


            <aside class="w-50">
                <img class="position relative" src="{{ Vite::asset('resources/img/adv.jpg') }}" alt="cc">
                <span class=" justify-content-end text-uppercase position-absolute fw-bold text-secondary"
                    style=" bottom:23%; right:26.5%">advertisement</span>
            </aside>
        </div>

        <div class="" style="background-color:whitesmoke">
            <div class="container p-2 ">

            </div>
        </div>



    </main>

@endsection('content')
