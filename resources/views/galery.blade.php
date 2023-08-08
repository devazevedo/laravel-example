@extends('templates.layoutMain')
@section('conteudo')
    <div>
        <h1>Galery</h1>
    </div>
    <div class="btn-login">
        <a style="" href="{{ route('home') }}">Home</a>
    </div>
    <div>
        <p>{{ $paginate }}</p>
    </div>
@endsection