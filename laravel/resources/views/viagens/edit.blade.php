@extends('layouts.app')
@section('content')
<h1>Editar Viagem</h1>

@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('viagens.update', $viagem->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Veículo:</label>
    <select name="veiculo_id" required>
        <option value="">Selecione...</option>
        @foreach($veiculos as $veiculo)
            <option value="{{ $veiculo->id }}"
                {{ old('veiculo_id', $viagem->veiculo_id) == $veiculo->id ? 'selected' : '' }}>
                {{ $veiculo->modelo }} ({{ $veiculo->placa }})
            </option>
        @endforeach
    </select>
    <br><br>

    <label>Motorista:</label>
    <select name="motorista_id" required>
        <option value="">Selecione...</option>
        @foreach($motoristas as $motorista)
            <option value="{{ $motorista->id }}"
                {{ old('motorista_id', $viagem->motorista_id) == $motorista->id ? 'selected' : '' }}>
                {{ $motorista->nome }}
            </option>
        @endforeach
    </select>
    <br><br>

    <label>KM Inicial:</label>
    <input type="number" name="km_inicial" 
           value="{{ old('km_inicial', $viagem->km_inicial) }}" required><br><br>

    <label>KM Final:</label>
    <input type="number" name="km_final" 
           value="{{ old('km_final', $viagem->km_final) }}"><br><br>

    <button type="submit">Atualizar</button>
</form>
@endsection