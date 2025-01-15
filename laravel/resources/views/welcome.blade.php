@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    
</head>
<body>
    <div class="container">
        <h1>Página Inicial</h1>
        <p>Bem-vindo ao sistema (CRUD) para controle de viagens.</p>
        <p>by: Pedro Trotta</p>
        <ul class="nav-links">
            <li><a href="/veiculos">Veículos</a></li>
            <li><a href="/motoristas">Motoristas</a></li>
            <li><a href="/viagens">Viagens</a></li>
        </ul>
    </div>
</body>
</html>
@endsection
