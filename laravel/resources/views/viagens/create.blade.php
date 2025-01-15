@extends('layouts.app')
@section('content')
<h1>Cadastrar Viagem</h1>

@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('viagens.store') }}" method="POST">
    @csrf

    <label>Veículo:</label>
    <select name="veiculo_id" required>
        <option value="">Selecione...</option>
        @foreach($veiculos as $veiculo)
            <option value="{{ $veiculo->id }}" 
                {{ old('veiculo_id') == $veiculo->id ? 'selected' : '' }}>
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
                {{ old('motorista_id') == $motorista->id ? 'selected' : '' }}>
                {{ $motorista->nome }}
            </option>
        @endforeach
    </select>
    <br><br>

    <label>KM Inicial:</label>
    <input type="number" name="km_inicial" value="{{ old('km_inicial') }}" required><br><br>

    <label>KM Final (pode deixar em branco se ainda não concluiu):</label>
    <input type="number" name="km_final" value="{{ old('km_final') }}"><br><br>

    <button type="submit">Salvar</button>
    <a href="/viagens">Cancelar</a>
</form>
@endsection