@extends('layouts.app')
@section('content')
<h1>Editar Motorista</h1>

@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('motoristas.update', $motorista->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Nome:</label>
    <input type="text" name="nome" value="{{ old('nome', $motorista->nome) }}" required><br><br>

    <label>Data de Nascimento:</label>
    <input type="date" name="data_nascimento" value="{{ old('data_nascimento', $motorista->data_nascimento) }}" required><br><br>

    <label>CNH Nº:</label>
    <input type="text" name="cnh_numero" value="{{ old('cnh_numero', $motorista->cnh_numero) }}" required><br><br>

    <button type="submit">Atualizar</button>
</form>
@endsection