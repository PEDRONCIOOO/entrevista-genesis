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
       
        $viagens = Viagem::with('veiculo', 'motoristas')->get();
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
            'motoristas' => 'required|array|min:1', 
            'motoristas.*' => 'exists:motoristas,id',
            'km_inicial' => 'required|integer|min:0',
            'km_final' => 'nullable|integer|min:' . $request->km_inicial, //request para km inicial
        ]);

        // Criar a viagem sem os motoras
        $viagem = Viagem::create($request->only(['veiculo_id', 'km_inicial', 'km_final']));

        // Vincula os motoristas (espera que o campo na view seja motoristas)
        $viagem->motoristas()->sync($request->motoristas);

        return redirect()->route('viagens.index')
                        ->with('success', 'Viagem criada com sucesso!');
    }


    // DETALHES DE UMA VIAGEM EXPECIFFICA
    public function show(Viagem $viagem)
    {      
        $viagem->load('veiculo', 'motoristas');
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
            'motoristas' => 'required|array|min:1',
            'motoristas.*' => 'exists:motoristas,id',
            'km_inicial' => 'required|integer|min:0',
            'km_final' => 'nullable|integer|min:' . $request->km_inicial, //adaptado req p iniicial
        ]);

        $viagem->update($request->only(['veiculo_id', 'km_inicial', 'km_final']));
        $viagem->motoristas()->sync($request->motoristas);

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
