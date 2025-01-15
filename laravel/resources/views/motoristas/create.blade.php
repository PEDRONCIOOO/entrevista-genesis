@extends('layouts.app')
@section('content')
<h1>Cadastrar Motorista</h1>

@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('motoristas.store') }}" method="POST">
    @csrf

    <label>Nome:</label>
    <input type="text" name="nome" value="{{ old('nome') }}" required><br><br>

    <label>Data de Nascimento:</label>
    <input type="date" name="data_nascimento" value="{{ old('data_nascimento') }}" required><br><br>

    <label>CNH Nº:</label>
    <input type="text" name="cnh_numero" value="{{ old('cnh_numero') }}" required><br><br>

    <button type="submit">Salvar</button>
    <a href="/motoristas">Cancelar</a>
</form>
@endsection