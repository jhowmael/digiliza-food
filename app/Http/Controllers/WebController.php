<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation; 
use App\Models\FoodTable; 
use Illuminate\Http\Request; 


class WebController extends Controller
{
    public function home()
    {
        return view('home');
    }
    // Método para exibir as reservas do usuário
    public function reservation()
    {
        // Verifica o ID do usuário logado
        $userId = Auth::id();

        // Pega as reservas com status "enabled" ou "pending" para o usuário logado
        $reservation = Reservation::where('user_id', $userId)
        ->whereIn('status', ['enabled', 'pending'])
        ->orderBy('entry', 'desc')  // Ordena pela data de entrada para pegar a mais recente
        ->first();  // Retorna apenas uma reserva

        // Busca as mesas ativas para o dropdown de seleção
        $foodTables = FoodTable::where('status', 'free')->get();

        // Retorna a view com as reservas e as mesas
        return view('reservation', compact('reservation', 'foodTables'));
    }

    // Método para criar uma nova reserva
    public function store(Request $request)
    {
        // Valida os dados do formulário de reserva
        $request->validate([
            'food_table_id' => 'required|exists:food_tables,id',  // Garantir que a mesa selecionada existe
            'entry' => 'required',
            'occupation' => 'required|integer|min:1|max:20',
        ]);

        // Cria uma nova reserva
        Reservation::create([
            'user_id' => Auth::id(),
            'food_table_id' => $request->food_table_id,  // Salva o id da mesa escolhida
            'entry' => $request->entry,  // Data e hora da 
            'status' => 'pending',  // Status inicial da reserva
            'occupation' => $request->occupation,
        ]);

        // Redireciona para a tela de reservas com sucesso
        return redirect()->route('reservation')->with('success', 'Reserva realizada com sucesso!');
    }

    public function cancelReservation($id)
{
    // Encontrar a reserva pelo ID
    $reservation = Reservation::find($id);

    // Verificar se a reserva existe
    if (!$reservation) {
        return redirect()->back()->with('error', 'Reserva não encontrada.');
    }

    // Verificar se a reserva já foi cancelada
    if ($reservation->status == 'canceled') {
        return redirect()->back()->with('error', 'Esta reserva já foi cancelada.');
    }

    // Alterar o status da reserva para 'canceled' e registrar a data de cancelamento
    $reservation->status = 'canceled';
    $reservation->canceled = now();  // Atribui a data e hora atual
    $reservation->save();

    return redirect()->route('reservation')->with('success', 'Reserva cancelada com sucesso.');
}
}
