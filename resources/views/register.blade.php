@extends('templates.layoutMain')
@section('conteudo')

    <div>
        <h1>Register</h1>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                @if ($errors->any())
                    <div class="alert alert-danger p-2 mb-3">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
                <form action="{{ route('register_partners') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome:</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Telefone:</label>
                        <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}">
                    </div>
                    <div class="text-center">
                        <input type="submit" value="Cadastrar" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection