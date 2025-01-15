@extends('layouts.app')
@section('content')
<h1>Lista de Motoristas</h1>

@if (session('success'))
    <div style="color: green;">
        {{ session('success') }}
    </div>
@endif

<a href="/">Voltar</a>
<a style="margin-top: 1em;" href="{{ route('motoristas.create') }}">Novo Motorista</a>

<table border="1" cellpadding="5">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Data Nascimento</th>
            <th>CNH Nº</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($motoristas as $motorista)
            <tr>
                <td>{{ $motorista->id }}</td>
                <td>{{ $motorista->nome }}</td>
                <td>{{ $motorista->data_nascimento }}</td>
                <td>{{ $motorista->cnh_numero }}</td>
                <td>
                    <a href="{{ route('motoristas.edit', $motorista->id) }}">Editar</a>
                    <form action="{{ route('motoristas.destroy', $motorista->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Deseja excluir este motorista?')">Excluir</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="5">Nenhum motorista cadastrado.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection