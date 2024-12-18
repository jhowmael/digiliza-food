@extends('layouts.web')

@section('content')

<body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
    AOS.init();
    </script>

    <section id="hero">
        <div class="container">
            <h2 style="text-align: center; color: #ffffff; margin-bottom: 0px;"> Bem vindo ao </h2>
            <h2 style="text-align: center; color: #BA0000; font-weight: bold;"> DIGITALIZA FOOD </h2>
            <h2 style="width: 30%; color: #ffffff; margin-bottom: 0px;">Uma inovação</h2>
            <h2 style="width: 30%; color: #BA0000;">culinária</h2>
            <table style="width: 90%; border-spacing: 20px 0; color: #ffffff; ">
                <tr>
                    <td style="text-align: left; font-weight: bold; font-style: italic;">
                        Descubra uma experiência culinária inesquecível,
                        <br>
                        com pratos cuidadosamente preparados para surpreender
                        <br>
                        o seu paladar.
                        <br>
                        <br>
                        Nosso restaurante combina tradição e inovação,
                        <br>
                        oferecendo sabores únicos em um ambiente acolhedor
                        <br>
                        que encanta todos os sentidos.
                    </td>
                </tr>
            </table>
        </div>
    </section>

    <main id="main">
        <section id="featured-portifólio" class="featured-menu section-bg">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 text-center">
                        <button class="btn btn-send text-white" type="button">
                            <a href="{{ route('reservation') }}" style="text-decoration: none; color: inherit;">
                                <i class="bx bx-restaurant"></i> Reserve aqui!
                            </a>
                        </button>
                        <h5 class="description hover-effect mt-3">
                            Garanta sua mesa agora mesmo! Clique no botão acima para realizar sua reserva com rapidez e
                            praticidade.
                        </h5>
                    </div>
                </div>
            </div>
            </div>
        </section>

        <div class="container">

        </div>

        <section id="menu" class="menu" data-aos="fade-up" data-aos-delay="30">
            <div class="container">
                <div class="section-title">
                    <h2>Conheça nossa culinária</h2>
                    <p>Explore os deliciosos pratos e bebidas preparados com carinho para você. Temos uma variedade de
                        opções para todos os gostos!</p>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6 align-items-stretch" data-aos="zoom-in" data-aos-delay="30">
                        <div class="icon-box">
                            <h4><a href="">Menu Principal</a></h4>
                            <center>
                                <img class="menu-image" src="storage/img/menu-principal.jpg" />
                            </center>
                            <p class="text-center">Picanha Grill<br>Risoto de Camarão<br>Frango Dijon<br>Costela
                                BBQ<br>Tilápia Crocante<br>Sushi de Salmão<br>Yakissoba de Frango</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 align-items-stretch" data-aos="zoom-in" data-aos-delay="30">
                        <div class="icon-box">
                            <h4><a href="">Lunch Menu</a></h4>
                            <center>
                                <img class="menu-image" src="storage/img/lunch-menu.jpg" />
                            </center>
                            <p class="text-center">Burger Clássico<br>Wrap de Frango<br>Crocante Veggie<br>Tacos
                                TexMex<br>Hot Dog Supreme<br>Sanduíche de Carne Louca<br>Salada Caesar</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 align-items-stretch" data-aos="zoom-in" data-aos-delay="30">
                        <div class="icon-box">
                            <h4><a href="">Menu Kids</a></h4>
                            <center>
                                <img class="menu-image" src="storage/img/menu-kids" />
                            </center>
                            <p class="text-center">Mini Burguer<br>Nuggets Caseiros<br>Espaguete<br>Pizza
                                Mini<br>Peixinho Dourado<br>Macarrão com Queijo<br>Frango Empanado</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 align-items-stretch" data-aos="zoom-in" data-aos-delay="30">
                        <div class="icon-box">
                            <h4><a href="">Acompanhamentos</a></h4>
                            <center>
                                <img class="menu-image" src="storage/img/acompanhamentos.webp" />
                            </center>
                            <p class="text-center">Onion rings<br>Batata Rústica<br>Batata Frita<br>Molho
                                Especial<br>Legumes Grelhados<br>Camarões empanados<br>Molho Cheddar</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 align-items-stretch" data-aos="zoom-in" data-aos-delay="30">
                        <div class="icon-box">
                            <h4><a href="">Bebidas</a></h4>
                            <center>
                                <img class="menu-image" src="storage/img/bebidas.jpg" />
                            </center>
                            <p class="text-center">Limonada Suíça<br>Suco Tropical<br>Chá
                                Gelado<br>Refrigerante<br>Água<br>Suco de Laranja Natural<br>Suco Verde</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 align-items-stretch" data-aos="zoom-in" data-aos-delay="30">
                        <div class="icon-box">
                            <h4><a href="">Sobremesas</a></h4>
                            <center>
                                <img class="menu-image" src="storage/img/sobremesa.jpg" />
                            </center>
                            <p class="text-center">Petit Gâteau<br>Brownie<br>Torta de
                                Morango<br>Pudim<br>Sorvete<br>Mousse de Chocolate<br>Cheesecake de Framboesa</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <div class="container">
            <hr class="custom-hr">
        </div>

        <section id="about" class="about" data-aos="fade-up" data-aos-delay="30">
            <div class="container">
                <div class="section-title">
                    <h2>Sobre o Digitaliza Food</h2>
                    <p>"Sua experiência gastronômica começa com a praticidade de uma reserva digital."</p>
                </div>

                <div class="row" data-aos="fade-up" data-aos-delay="30">
                    <div class="col-lg-3 order-1 order-lg-2">
                        <img src="storage/img/restaurant.jpg" class="img-fluid rounded-circle"
                            alt="Imagem do restaurante">
                    </div>
                    <div class="col-lg-9 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="zoom-in"
                        data-aos-delay="30">
                        <p>No Digitaliza Food, oferecemos uma experiência gastronômica inovadora, combinando os melhores
                            sabores com a praticidade da tecnologia. Nosso foco é proporcionar uma refeição deliciosa e
                            eficiente para nossos clientes, desde o pedido até a entrega.</p>
                        <p>No Digitaliza Food, acreditamos que a experiência gastronômica deve ser rápida, agradável e
                            sem complicações. Pensando nisso, desenvolvemos uma plataforma fácil de usar, onde você pode
                            fazer sua reserva com apenas alguns cliques, garantindo que sua mesa esteja pronta para
                            recebê-lo no momento desejado.</p>
                        <p>Nosso sistema de reservas digitalizados permite que você escolha o melhor horário para sua
                            visita, com toda a conveniência e sem a necessidade de chamadas telefônicas ou longas
                            esperas.</p>
                        <p>Além disso, a experiência no Digitaliza Food vai além da reserva. Nossa equipe está sempre
                            pronta para oferecer um atendimento de excelência, criando uma experiência única e memorável
                            para você e seus convidados.</p>
                        <p>Com o Digitaliza Food, reservar uma mesa nunca foi tão simples e conveniente. Aproveite o
                            melhor da gastronomia com a facilidade da tecnologia ao seu alcance.</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="contact" class="contact" data-aos="fade-up" data-aos-delay="30">
            <div class="container">
                <div class="section-title">
                    <h2>Contato</h2>
                    <p>
                        Estamos sempre prontos para ouvir você! Seja para realizar uma reserva, tirar dúvidas ou
                        compartilhar sugestões,
                        entre em contato conosco. Nossa equipe está à disposição para tornar sua experiência ainda mais
                        especial.
                        Preencha o formulário abaixo e responderemos o mais breve possível.
                    </p>
                </div>

                <div class="row" data-aos-delay="30">
                    <div class="col-lg-12">
                        <form action="https://formsubmit.co/jonatan.ismael996@gmail.com" method="POST">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="email">Seu E-mail</label>
                                    <input type="email" class="form-control" name="email" id="email" required>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="message">Mensagem</label>
                                <textarea class="form-control" name="message" rows="10" required></textarea>
                            </div>
                            <br>
                            <center>
                                <button class="text-center btn btn-send text-white" type="submit">Enviar
                                    mensagem</button>
                            </center>
                        </form>
                    </div>
                </div>
            </div>
        </section>


    </main>
</body>

@endsection