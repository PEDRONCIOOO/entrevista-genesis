<?php

namespace App\Http\Controllers;

use App\Models\Viagem;
use App\Models\Veiculo;
use App\Models\Motorista;
use Illuminate\Http\Request;

class ViagemController extends Controller
{
    //  LISTA AS VIAGENS
    public function index()
    {
       
        $viagens = Viagem::with('veiculo', 'motorista')->get();
        return view('viagens.index', compact('viagens'));
    }

    // FORM CRIAR NOVA VIAGEM 
    public function create()
    {
        $veiculos = Veiculo::all();
        $motoristas = Motorista::all();
        return view('viagens.create', compact('veiculos', 'motoristas'));
    }

    //SALVA NOVA VIAGEM
    public function store(Request $request)
    {
        $request->validate([
            'veiculo_id' => 'required|exists:veiculos,id',
            'motorista_id' => 'required|exists:motoristas,id',
            'km_inicial' => 'required|integer|min:0',
            // km_final pode ser preenchido depois então pode ser nullable xD
            'km_final' => 'nullable|integer|min:0',
        ]);

        Viagem::create($request->all());

        return redirect()->route('viagens.index')
                         ->with('success', 'Viagem criada com sucesso!');
    }

    // DETALHES DE UMA VIAGEM EXPECIFFICA
    public function show(Viagem $viagem)
    {
        // Se quiser exibir veiculo e motorista
        $viagem->load('veiculo', 'motorista');
        return view('viagens.show', compact('viagem'));
    }

    // FFORM DE EDITAR VIAGEM 
    public function edit(Viagem $viagem)
    {
        $veiculos = Veiculo::all();
        $motoristas = Motorista::all();
        return view('viagens.edit', compact('viagem', 'veiculos', 'motoristas'));
    }

    // ATT A VIAGEM EXISTENTE 
    public function update(Request $request, Viagem $viagem)
    {
        $request->validate([
            'veiculo_id' => 'required|exists:veiculos,id',
            'motorista_id' => 'required|exists:motoristas,id',
            'km_inicial' => 'required|integer|min:0',
            // km_final deve ser >= km_inicial, se for preenchido
            'km_final' => 'nullable|integer|min:' . $request->km_inicial,
        ]);

        $viagem->update($request->all());

        return redirect()->route('viagens.index')
                         ->with('success', 'Viagem atualizada com sucesso!');
    }

    // DELETAR VIAGEM DO BANCO DE DADOS 
    public function destroy(Viagem $viagem)
    {
        $viagem->delete();

        return redirect()->route('viagens.index')
                         ->with('success', 'Viagem excluída com sucesso!');
    }
}
