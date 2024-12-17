<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;  // Certifique-se de importar corretamente a classe Request


class ReservationController extends Controller
{
    public function dashboard()
    {
        $reservations = Reservation::with(['user', 'foodTable'])->paginate(10);
        return view('reservations.dashboard', compact('reservations'));
    }

    public function edit($id)
    {
        $reservation = Reservation::find($id);

        return view('reservations.edit', compact('reservation'));
    }

    public function view($id)
    {
        $reservation = Reservation::find($id);

        return view('reservations.view', compact('reservation'));
    }

 
    public function filter(Request $request)
    {
        // Iniciando a consulta para as reservas
        $query = Reservation::query();

        // Verificando se cada campo de filtro está presente e aplicando a condição na consulta
        if ($request->filled('user_id')) {
            $query->where('user_id', $request->user_id);
        }

        if ($request->filled('food_table_id')) {
            $query->where('food_table_id', $request->food_table_id);
        }

        if ($request->filled('occupation')) {
            $query->where('occupation', $request->occupation);
        }

        if ($request->filled('entry')) {
            $query->whereDate('entry', $request->entry); // Para o campo de data 'entry'
        }

        $reservations = $query->paginate(10);

        return view('reservations.filter', compact('reservations'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',  // Valida se o 'user_id' existe na tabela 'users'
            'food_table_id' => 'required|exists:food_tables,id',  // Valida se a 'food_table_id' existe na tabela 'food_tables'
            'occupation' => 'required|string|max:255',  // Valida o campo 'occupation'
            'entry' => 'required|date_format:Y-m-d\TH:i',  // Valida o campo 'entry' (data e hora)
        ]);

        $reservation = Reservation::findOrFail($id);

        $reservation->user_id = $request->input('user_id');
        $reservation->food_table_id = $request->input('food_table_id');
        $reservation->occupation = $request->input('occupation');
        $reservation->entry = $request->input('entry');
        $reservation->updated_at = now();  // Atualiza o campo 'updated_at' com a data e hora atual

        $reservation->save();

        return redirect()->route('reservations.dashboard')->with('success', 'Reserva atualizada com sucesso!');
    }

    public function add()
    {
        return view('reservations.add');  // Retorna a view 'reservations.add' para o formulário
    }

    // Método para armazenar os dados da reserva
    public function store(Request $request)
    {
        // Validação dos dados enviados
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'food_table_id' => 'required|exists:food_tables,id',
            'occupation' => 'required|string|max:255',
            'entry' => 'required|date',
            'finished' => 'nullable|date',
            'canceled' => 'nullable|date',
            'status' => 'required|in:active,inactive,pending', // Use os status que você tem no config
        ]);
    
        // Criação da nova reserva
        $reservation = Reservation::create([
            'user_id' => $request->user_id,
            'food_table_id' => $request->food_table_id,
            'occupation' => $request->occupation,
            'entry' => $request->entry,
            'finished' => $request->finished,
            'canceled' => $request->canceled,
            'status' => $request->status,
        ]);
    
        return redirect()->route('reservations.dashboard')->with('success', 'Reserva criada com sucesso!');
    }
}