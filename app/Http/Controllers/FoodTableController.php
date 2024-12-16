<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\FoodTable;
use Illuminate\Http\Request;  // Certifique-se de importar corretamente a classe Request


class FoodTableController extends Controller
{
    public function dashboard()
    {
        $foodTables = FoodTable::paginate(10);
        return view('foodTables.dashboard', compact('foodTables'));
    }

    public function edit($id)
    {
        $foodTable = FoodTable::find($id);
        return view('foodTables.edit', compact('foodTable'));
    }

    public function view($id)
    {
        $foodTable = FoodTable::find($id);

        return view('foodTables.view', compact('foodTable'));
    }

 
    public function filter(Request $request)
    {
        // Iniciando a consulta para as reservas
        $query = FoodTable::query();

        // Verificando se cada campo de filtro está presente e aplicando a condição na consulta
        if ($request->filled('id')) {
            $query->where('id', $request->id);
        }

        if ($request->filled('number')) {
            $query->where('number', $request->number);
        }

        if ($request->filled('capacity')) {
            $query->where('capacity', $request->capacity);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $foodTables = $query->paginate(10);

        return view('foodTables.filter', compact('foodTables'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'number' => 'required|integer', // Valida se 'number' é um valor inteiro
            'capacity' => 'required|integer', // Valida se 'capacity' é um valor inteiro
            'status' => 'required|string|max:255',  // Valida o campo 'occupation'
        ]);

        $foodTable = FoodTable::findOrFail($id);

        $foodTable->number = $request->input('number');
        $foodTable->capacity = $request->input('capacity');
        $foodTable->status = $request->input('status');
        $foodTable->updated_at = now();  // Atualiza o campo 'updated_at' com a data e hora atual

        $foodTable->save();

        return redirect()->route('foodTables.dashboard')->with('success', 'Reserva atualizada com sucesso!');
    }

    public function add()
    {
        return view('foodTables.add');  // Retorna a view 'foodTables.add' para o formulário
    }

    // Método para armazenar os dados da reserva
    public function store(Request $request)
    {
        $request->validate([
            'number' => 'required|integer',
            'capacity' => 'required|integer',
            'status' => 'required|string|max:255',
        ]);

        $foodTable = new FoodTable();
        $foodTable->number = $request->number;
        $foodTable->capacity = $request->capacity;
        $foodTable->status = $request->status;

        $foodTable->save(); 

        return redirect()->route('foodTables.dashboard')->with('success', 'Reserva criada com sucesso!');
    }
}