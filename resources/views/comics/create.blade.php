@section('content')
    <form action="{{ route('comics.store') }}" method="POST">

        @csrf
        <input type="text" placeholder="inserisci titolo" id="title" name="title" class="form-control">
        <input type="text" placeholder="inserisci una descrizione" id="description" name="description" class="form-control">
        <input type="text" placeholder="inserisci un prezzo" id="price" name="price" class="form-control">
        <input type="text" placeholder="inserisci una tipologia" id="type" name="type" class="form-control">
        <button type="submit">invia</button>

    </form>
@endsection
