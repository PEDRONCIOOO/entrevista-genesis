<?php

namespace App\Http\Controllers;

use App\Models\Veiculo;
use Illuminate\Http\Request;

class VeiculoController extends Controller
{
    public function index()
    {
        $veiculos = Veiculo::all();
        return view('veiculos.index', compact('veiculos'));
    }

    public function create()
    {
        return view('veiculos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'modelo' => 'required',
            'ano' => 'required|integer',
            'data_aquisicao' => 'required|date',
            'km_aquisicao' => 'required|integer',
            'renavam' => 'required|unique:veiculos,renavam',
            'placa' => 'required|unique:veiculos,placa'
        ]);

        Veiculo::create($request->all());
        return redirect()->route('veiculos.index')
            ->with('success', 'Veículo criado com sucesso!');
    }

    public function edit(Veiculo $veiculo)
    {
        return view('veiculos.edit', compact('veiculo'));
    }

    public function update(Request $request, Veiculo $veiculo)
    {
    $request->validate([
        'modelo' => 'required',
        'ano' => 'required|integer',
        'data_aquisicao' => 'required|date',
        'km_aquisicao' => 'required|integer',
        // Regra pra renavam e placa se quiser permitir uniqueness no update
        'renavam' => 'required|unique:veiculos,renavam,'.$veiculo->id,
        'placa'   => 'required|unique:veiculos,placa,'.$veiculo->id,
    ]);

    $veiculo->update($request->all());

    return redirect()->route('veiculos.index')
                     ->with('success', 'Veículo atualizado com sucesso!');
    }

    public function destroy(Veiculo $veiculo)
    {
        $veiculo->delete();
        return redirect()->route('veiculos.index')
                        ->with('success', 'Veículo excluído com sucesso!');
    }
}

