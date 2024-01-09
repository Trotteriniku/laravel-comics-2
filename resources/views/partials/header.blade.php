@php
    $navitems = config('comicsdb.navitems');
@endphp

<header>
    <div class="d-flex justify-content-lg-evenly py-4">
        <a href="{{ route('home') }}">
            <img src="{{ Vite::asset('resources/img/dc-logo.png') }}" alt="dc logo">
        </a>

        <ul class="nav align-content-center justify-content-end">
            @foreach ($navitems as $item)
                <li class="nav-item">
                    @if ($item['name'] === 'comics')
                        <a class="nav-link text-uppercase fs-5" href="{{ route('comics.index') }}">{{ $item['name'] }}</a>
                    @else
                        <a class="nav-link text-uppercase fs-5">{{ $item['name'] }}</a>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</header>
