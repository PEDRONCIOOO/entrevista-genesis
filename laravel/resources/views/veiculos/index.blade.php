@extends('layouts.app')
@section('content')
<h1>Lista de Veículos</h1>

@if (session('success'))
    <div style="color: green;">
        {{ session('success') }}
    </div>
@endif
<a href="/">Voltar</a>
<a style="margin-top: 1em;" href="{{ route('veiculos.create') }}">Novo Veículo</a>

<table border="1" cellpadding="5">
    <thead>
        <tr>
            <th>ID</th>
            <th>Modelo</th>
            <th>Ano</th>
            <th>Data Aquisição</th>
            <th>KM Aquisição</th>
            <th>Renavam</th>
            <th>Placa</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($veiculos as $veiculo)
            <tr>
                <td>{{ $veiculo->id }}</td>
                <td>{{ $veiculo->modelo }}</td>
                <td>{{ $veiculo->ano }}</td>
                <td>{{ $veiculo->data_aquisicao }}</td>
                <td>{{ $veiculo->km_aquisicao }}</td>
                <td>{{ $veiculo->renavam }}</td>
                <td>{{ $veiculo->placa }}</td>
                <td>
                    <!-- Botão de Editar -->
                    <a href="{{ route('veiculos.edit', $veiculo->id) }}">Editar</a>

                    <!-- Formulário de Deletar -->
                    <form action="{{ route('veiculos.destroy', $veiculo->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="8">Nenhum veículo cadastrado.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
