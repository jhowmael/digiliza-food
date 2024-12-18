@extends('layouts.connect')

@section('content')
<main>
    <div class="container text-center">
        <h2 class="text-danger mb-3">Bem-vindo ao seu painel de controle!</h2>
        <p class="lead mb-3">Aqui você pode gerenciar todas as reservas de mesas do seu estabelecimento de forma prática e eficiente. Nossa plataforma foi projetada para garantir que você tenha controle total de suas operações.</p>
        <p class="mb-4">Com um simples clique, você pode visualizar, adicionar e editar reservas, além de ajustar a configuração das mesas. Vamos otimizar seu espaço e sua gestão agora mesmo!</p>
    </div>

    <div class="container text-center">
        <h3 class="text-dark mb-4">Funcionalidades Principais</h3>
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card shadow-lg border-0">
                    <div class="card-body">
                        <h5 class="card-title text-danger"><i class="bi bi-calendar-check"></i> Gerenciar Reservas</h5>
                        <p class="card-text">Visualize, edite e adicione novas reservas com facilidade.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card shadow-lg border-0">
                    <div class="card-body">
                        <h5 class="card-title text-danger"><i class="bi bi-table"></i> Configuração das Mesas</h5>
                        <p class="card-text">Ajuste o layout das mesas e personalize o espaço conforme a necessidade.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card shadow-lg border-0">
                    <div class="card-body">
                        <h5 class="card-title text-danger"><i class="bi bi-person-check"></i> Gerenciar Usuários</h5>
                        <p class="card-text">Controle quem tem acesso ao sistema e configure permissões de usuários.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
