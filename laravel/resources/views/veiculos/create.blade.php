@extends('layouts.app')
@section('content')
<h1>Cadastrar Veículo</h1>

@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('veiculos.store') }}" method="POST">
    @csrf
    <label>Modelo:</label>
    <input type="text" name="modelo" value="{{ old('modelo') }}" required><br><br>

    <label>Ano:</label>
    <input type="number" name="ano" value="{{ old('ano') }}" required><br><br>

    <label>Data de Aquisição:</label>
    <input type="date" name="data_aquisicao" value="{{ old('data_aquisicao') }}" required><br><br>

    <label>KM na Aquisição:</label>
    <input type="number" name="km_aquisicao" value="{{ old('km_aquisicao') }}" required><br><br>

    <label>Renavam:</label>
    <input type="text" name="renavam" value="{{ old('renavam') }}" required><br><br>

    <label>Placa:</label>
    <input type="text" name="placa" value="{{ old('placa') }}" required><br><br>

    <button type="submit">Salvar</button>
    <a href="/veiculos">Cancelar</a>
</form>
@endsection