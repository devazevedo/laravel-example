@extends('templates.layoutMain')
@section('conteudo')
    <div>
        <h1>Home</h1>
        <hr>
        <div>
            @if ($show) 
                <p style="color: red">{{ $message }}</p>
            @endif
        </div>
        <div id="btns">
            <div class="btn btn-primary btn-login">
                <a style="" href="{{ route('galery') }}">Galery</a>
            </div>
            <div class="btn btn-primary btn-login">
                <a style="" href="{{ route('services') }}">Services</a>
            </div>
            <div class="btn btn-primary btn-login">
                <a style="" href="{{ route('contacts') }}">Contacts</a>
            </div>
            <div class="btn btn-primary btn-login">
                <a style="" href="{{ route('register') }}">Register</a>
            </div>
        </div>
        <ul>
            @foreach ($partners as $partner)
                <li>@php echo"$partner->name" @endphp</li>
            @endforeach
        </ul>
    </div>
    
@endsection