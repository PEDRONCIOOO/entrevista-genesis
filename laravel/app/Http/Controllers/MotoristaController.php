<?php

namespace App\Http\Controllers;

use App\Models\Motorista;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class MotoristaController extends Controller
{
    /**
     * Exibe uma lista de motoristas.
     */
    public function index()
    {
        $motoristas = Motorista::all();
        return view('motoristas.index', compact('motoristas'));
    }

    /**
     * Exibe o formulário de criação de um novo motorista.
     */
    public function create()
    {
        return view('motoristas.create');
    }

    /**
     * Armazena um novo motorista no banco.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string',
            'data_nascimento' => [
                'required',
                'date',
                // garante que a data seja de no mínimo 18 anos atrás
                'before_or_equal:' . now()->subYears(18)->format('Y-m-d')
            ],
            'cnh_numero' => 'required|unique:motoristas,cnh_numero'
        ]);

        Motorista::create($request->all());

        return redirect()->route('motoristas.index')
                         ->with('success', 'Motorista cadastrado com sucesso!');
    }

    /**
     * Exibe um motorista específico.
     */
    public function show(Motorista $motorista)
    {
        return view('motoristas.show', compact('motorista'));
    }

    /**
     * Exibe o formulário para editar um motorista.
     */
    public function edit(Motorista $motorista)
    {
        return view('motoristas.edit', compact('motorista'));
    }

    /**
     * Atualiza os dados do motorista.
     */
    public function update(Request $request, Motorista $motorista)
    {
        $request->validate([
            'nome' => 'required|string',
            'data_nascimento' => [
                'required',
                'date',
                'before_or_equal:' . now()->subYears(18)->format('Y-m-d')
            ],
            // caso queira permitir que o cnh_numero só seja único se for diferente do atual
            'cnh_numero' => 'required|unique:motoristas,cnh_numero,' . $motorista->id
        ]);

        $motorista->update($request->all());

        return redirect()->route('motoristas.index')
                         ->with('success', 'Motorista atualizado com sucesso!');
    }

    /**
     * Remove o motorista do banco.
     */
    public function destroy(Motorista $motorista)
    {
        $motorista->delete();

        return redirect()->route('motoristas.index')
                         ->with('success', 'Motorista excluído com sucesso!');
    }
}
