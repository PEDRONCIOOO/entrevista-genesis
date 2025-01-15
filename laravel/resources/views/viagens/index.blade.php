@extends('layouts.app')
@section('content')
<h1>Lista de Viagens</h1>

@if (session('success'))
    <div style="color: green;">
        {{ session('success') }}
    </div>
@endif

<a href="/">Voltar</a>
<a style="margin-top: 1em;" href="{{ route('viagens.create') }}">Nova Viagem</a>

<table border="1" cellpadding="5">
    <thead>
        <tr>
            <th>ID</th>
            <th>Veículo</th>
            <th>Motorista</th>
            <th>KM Inicial</th>
            <th>KM Final</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($viagens as $viagem)
            <tr>
                <td>{{ $viagem->id }}</td>
                <!-- Se você fez eager loading, pode acessar -->
                <td>{{ $viagem->veiculo->modelo ?? 'Sem veículo' }}</td>
                <td>{{ $viagem->motorista->nome ?? 'Sem motorista' }}</td>
                <td>{{ $viagem->km_inicial }}</td>
                <td>{{ $viagem->km_final }}</td>
                <td>
                    <a href="{{ route('viagens.edit', $viagem->id) }}">Editar</a>
                    <form action="{{ route('viagens.destroy', $viagem->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Deseja excluir esta viagem?')">Excluir</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="6">Nenhuma viagem cadastrada.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection