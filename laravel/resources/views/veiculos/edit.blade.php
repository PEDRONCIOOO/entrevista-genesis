@extends('layouts.app')
@section('content')
<h1>Editar Veículo</h1>

@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('veiculos.update', $veiculo->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Modelo:</label>
    <input type="text" name="modelo" value="{{ old('modelo', $veiculo->modelo) }}" required><br><br>

    <label>Ano:</label>
    <input type="number" name="ano" value="{{ old('ano', $veiculo->ano) }}" required><br><br>

    <label>Data de Aquisição:</label>
    <input type="date" name="data_aquisicao" value="{{ old('data_aquisicao', $veiculo->data_aquisicao) }}" required><br><br>

    <label>KM na Aquisição:</label>
    <input type="number" name="km_aquisicao" value="{{ old('km_aquisicao', $veiculo->km_aquisicao) }}" required><br><br>

    <label>Renavam:</label>
    <input type="text" name="renavam" value="{{ old('renavam', $veiculo->renavam) }}" required><br><br>

    <label>Placa:</label>
    <input type="text" name="placa" value="{{ old('placa', $veiculo->placa) }}" required><br><br>

    <button type="submit">Atualizar</button>
</form>
@endsection