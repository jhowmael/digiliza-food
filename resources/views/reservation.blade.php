@extends('layouts.web')

@section('content')
<body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init();
    </script>

    <section id="about" class="about hover-effect" data-aos="fade-up" data-aos-delay="30">
        <div class="container">
            <div class="section-title">
                <h2>RESERVAS</h2>
                <p>"Garanta sua mesa e viva uma experiência gastronômica única!"</p>

                <!-- Exibe a mensagem de sucesso se houver -->
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
            <div class="row">
                <!-- Coluna do Texto -->
                <div class="col-md-12 col-lg-12 text-details">
                    <h4 style="color: #BA0000;">Sua Reserva</h4>
                    <!-- Exibe a reserva feita, se existir -->
                    <center>
                    @if($reservation)
                        <p><strong>Mesa:</strong> {{ $reservation->foodTable->number }}</p>
                        <p><strong>Data da reserva:</strong> {{ $reservation->entry }}</p>
                        <p><strong>Status da reserva:</strong> {{ $reservation->status }}</p>

                        <!-- Botão de Cancelamento -->
                        @if($reservation->status != 'canceled')
                            <form action="{{ route('cancelReservation', $reservation->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-danger">Cancelar Reserva</button>
                            </form>
                        @else
                            <p>Esta reserva já foi cancelada.</p>
                        @endif

                    @else
                        <p>Ainda não há reserva feita ou todas as reservas estão canceladas/com status finalizado.</p>
                    @endif
                    </center>
                </div>
            </div>
        </div>
    </section>

    @if(!$reservation)

    <section id="contact" class="contact" data-aos="fade-up" data-aos-delay="30">
    <h4 style="color: #BA0000;">Nova Reserva</h4>

    <div class="container">
            <div class="row" data-aos-delay="30">
                <div class="col-lg-12">
                    <form action="{{ route('store') }}" method="POST">
                        @csrf
                        <!-- Campo de Seleção de Mesa -->
                        <div class="form-group col-md-12">
                            <label for="food_table_id">Selecione uma mesa</label>
                            <select class="form-control" name="food_table_id" id="food_table_id" required>
                                <option value="" disabled selected>Escolha uma mesa</option>
                                @foreach($foodTables as $table)
                                    <option value="{{ $table->id }}">{{ $table->number }} - Capacidade: {{ $table->capacity }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Campo de Data e Hora da Reserva (campo entry) -->
                        <div class="form-group col-md-12">
                            <label for="entry">Data e Hora da Reserva</label>
                            <input type="datetime-local" class="form-control" name="entry" id="entry" required>
                        </div>

                        <!-- Campo de Quantidade de Pessoas -->
                        <div class="form-group col-md-12">
                            <label for="occupation">Para quantas pessoas?</label>
                            <input type="number" class="form-control" name="occupation" id="occupation" min="1" max="20" required>
                        </div>

                        <br><br>
                        <!-- Botão de Enviar -->
                        <center>
                            <button class="text-center btn btn-send text-white" type="submit">Fazer Reserva!</button>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </section>
    @else
        <center>
            <div class="container">
                <p>Você já tem uma reserva ativa. Para fazer uma nova reserva, por favor, cancele a reserva atual.</p>
            </div>
            <br>       
        </center>

    @endif
</body>
@endsection
