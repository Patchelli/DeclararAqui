<!DOCTYPE html>
<html>

<head>
    <!-- Site made with Mobirise Website Builder v4.12.3, https://mobirise.com -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="generator" content="Mobirise v4.12.3, mobirise.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <link rel="shortcut icon" href="assets/images/logoda3-120x120.png" type="image/x-icon">
    <meta name="description" content="">


    <title>Cadastro Cliente</title>
    <link rel="stylesheet" href="assets/web/assets/mobirise-icons/mobirise-icons.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="assets/socicon/css/styles.css">
    <link rel="stylesheet" href="assets/dropdown/css/style.css">
    <link rel="stylesheet" href="assets/animatecss/animate.min.css">
    <link rel="stylesheet" href="assets/tether/tether.min.css">
    <link rel="stylesheet" href="assets/theme/css/style.css">
    <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
        integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-153893453-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-153893453-1');

    </script>

</head>

<body>
    <section class="menu cid-rWYORjb53z" once="menu" id="menu2-9">

        <a href="https://api.whatsapp.com/send?l=pt&amp;phone=5541996597020" target="_blank"><img
                src="assets\images\whats.png"
                style="height:60px; position:fixed; bottom: 25px; right: 25px; z-index:99999;" data-selector="img"></a>

        <nav
            class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
            <div class="menu-logo">
                <div class="navbar-brand">
                    <span class="navbar-logo">
                        <a href="https://declararaqui.com.br/">
                            <img src="assets/images/logoda3-120x120.png" alt="Logo da Declarar Aqui"
                                title="Declarar Aqui" style="height: 3.8rem;">
                        </a>
                    </span>
                    <span class="navbar-caption-wrap"><a class="navbar-caption text-white display-4"
                            style="font-size: 20px" href="https://declararaqui.com.br/"><br>Declarar Aqui
                            <br><br></a></span>
                </div>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true">
                    <li class="nav-item">
                        <a class="nav-link link text-white display-4" href=""><strong> Rápido , Fácil e Seguro. &nbsp;
                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</strong></a>
                    </li>
                </ul>
                <div class="navbar-buttons mbr-section-btn">
                    <!--<a class="btn btn-sm btn-light display-4" href="https://declararaqui.com.br/"><span class="mbri-cursor-click mbr-iconfont mbr-iconfont-btn"></span>Acompanhar</a>-->
                </div>
            </div>
        </nav>
    </section>

    <section class="engine"><a href="https://mobirise.info/o"></a></section>
    <section class="header15 cid-rWW8LdyHv5 mbr-fullscreen mbr-parallax-background" id="header15-3">



        <div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(7, 59, 76);"></div>

        <div class="container align-right" style="bottom:40px">
            <div class="row">
                <div class="mbr-white col-lg-8 col-md-7 content-container">
                    <h1 class="mbr-section-title mbr-bold pb-3 mbr-fonts-style display-2"><span
                            style="font-weight: normal;">Declaração Anual do MEI</span><br></h1>
                    <strong>
                        <p class="mbr-text pb-3 mbr-fonts-style display-5"><span
                                style="text-transform: uppercase;"></span> É muito importante ter suas obrigações com o
                            MEI em dia, pois em de caso atraso o valor da penalidade é de no mínimo de R$ 50,00 ou 2% ao
                            mês-calendário ou fração. </span></p>
                    </strong>
                    <strong>
                        <p class="mbr-text pb-3 mbr-fonts-style display-5"><span
                                style="text-transform: uppercase;"></span> Aqui seus dados estão protegidos e seguros.
                            Para isso, contamos com os principais sistemas de segurança que garantem que seus dados
                            pessoais não sejam divulgados e que impedem que o trânsito de informações seja acessado por
                            terceiros. </span></p>
                    </strong>
                    <p><strong><span style="font-size: 20px;color: greenyellow;text-transform: uppercase;">Faça sua
                                declaração Anual : &nbsp;Rápida , Fácil e Segura</span></strong>.<br><span
                            style="font-size: 12px;;"> Por apenas R$ 23,90.</span></p>
                </div>

                <div class="col-lg-4 col-md-5">
                    <div class="form-container-declaracao">
                        <div class="media-container-column" data-form-type="formoid">
                            <form method="POST" action="/anos">
                                @csrf
                                @if(isset($nome_ola))
                                <label class="text-form-valor-title" style="text-align: center"><u> Olá {{$nome_ola}}
                                    </u> ,</label>
                                @endif
                                <div data-for="cnpj" class="col-md-12 form-group ">
                                    <input name="cnpj" placeholder="CNPJ" required="required" data-form-field="cnpj"
                                        value="{{$cnpj}}" {{isset($razao)?"readonly":""}}
                                        class="form-control px-3 display-7 input-declarar input-declarar {{!isset($razao)? "disable-campos  " : "" }}"
                                        id="cnpj">
                                </div>

                                <div data-for="razao" class="col-md-12 form-group ">
                                    <input name="razao" placeholder="Razão Social" required="required"
                                        data-form-field="razao" value="{{$razao}}" {{isset($razao)?"readonly":""}}
                                        class="form-control px-3 display-7 input-declarar input-declarar {{!empty($razao)?"disable-campos  " : "" }}"
                                        id="razao">
                                </div>

                                <div data-for="nome_fantasia" class="col-md-12 form-group ">
                                    <input name="nome_fantasia" placeholder="Nome Fantasia" required="required"
                                        data-form-field="nome_fantasia" {{!empty($nome_fantasia)? "readonly" : "" }}
                                        value="{{$nome_fantasia}}"
                                        class="form-control px-3 display-7 input-declarar input-declarar {{!empty($nome_fantasia)?"disable-campos  " : "" }}"
                                        id="nome_fantasia">
                                </div>

                                <div data-for="email" class="col-md-12 form-group ">
                                    <input name="email" autofocus="true" placeholder="E-mail" required="required"
                                        data-form-field="email"
                                        class="form-control px-3 display-7 input-declarar input-declarar" id="email">
                                </div>

                                <div data-for="fone" class="col-md-12 form-group ">
                                    <input type="text" name="fone" placeholder="WhatsApp" required="required"
                                        data-form-field="fone"
                                        class="form-control px-3 display-7 input-declarar input-declarar" id="fone">
                                </div>

                                <div data-for="cpf" class="col-md-12 form-group ">
                                    <input name="cpf" placeholder="CPF" required="required" data-form-field="cpf"
                                        class="form-control px-3 display-7 input-declarar input-declarar" id="cpf">
                                </div>


                                <div data-for="data_nasc" class="col-md-12 form-group ">
                                    <input name="data_nasc" placeholder="Data nascimento" required="required"
                                        data-form-field="data_nasc"
                                        class="form-control px-3 display-7 input-declarar input-declarar"
                                        id="data_nasc">
                                </div>
                          
                                @if(!isset($endereco))
                                    <h4 style="font-size: 19px;margin-left: 14px;" class="{{isset($endereco)?"hidden-campo":""}}">Endereço</h4>
                                    <div data-for="cep" class="col-md-12 form-group ">
                                        <input name="cep" autofocus="true" placeholder="CEP" required="required" 
                                            data-form-field="cep"
                                            class="form-control px-3 display-7 input-declarar input-declarar {{isset($endereco)?"hidden-campo":""}}" id="cep" value="{{$cep}}">
                                    </div>
                                    <div data-for="endereco" class="col-md-12 form-group ">
                                        <input name="endereco" autofocus="true" placeholder="Rua" required="required" value="{{$endereco}}"
                                            data-form-field="endereco"
                                            class="form-control px-3 display-7 input-declarar input-declarar {{isset($endereco)?"hidden-campo":""}}" id="endereco">
                                    </div>
                                    <div data-for="cidade" class="col-md-12 form-group ">
                                        <input name="cidade" autofocus="true" placeholder="Cidade" required="required" value="{{$cidade}}"
                                            data-form-field="cidade"
                                            class="form-control px-3 display-7 input-declarar input-declarar {{isset($endereco)?"hidden-campo":""}}" id="cidade">
                                    </div>
                                    <div data-for="bairro" class="col-md-12 form-group ">
                                        <input name="bairro" autofocus="true" placeholder="Bairro" required="required" value="{{$bairro}}"
                                            data-form-field="bairro"
                                            class="form-control px-3 display-7 input-declarar input-declarar {{isset($endereco)?"hidden-campo":""}}" id="bairro">
                                    </div>

                                    <div data-for="numero" class="col-md-12 form-group ">
                                        <input name="numero" autofocus="true" placeholder="Número" required="required" value="{{$numero}}"
                                            data-form-field="numero"
                                            class="form-control px-3 display-7 input-declarar input-declarar {{isset($endereco)?"hidden-campo":""}}" id="numero" style="display: block;width: 45%;float: left;">
                                        <input name="uf" autofocus="true" placeholder="UF" required="required"
                                            data-form-field="uf"
                                            class="form-control px-3 display-7 input-declarar input-declarar {{isset($endereco)?"hidden-campo":""}}" id="uf"  value="{{$uf}}" style="display: block;width: 45%;float: left; margin-left:28px;">
                                    </div>
                                @else 
                                    <input type="hidden" name="endereco" value="{{$endereco}}">
                                    <input type="hidden" name="numero" value="{{$numero}}">
                                    <input type="hidden" name="cidade" value="{{$cidade}}">
                                    <input type="hidden" name="cep" value="{{$cep}}">
                                    <input type="hidden" name="uf" value="{{$uf}}">
                                    <input type="hidden" name="bairro" value="{{$bairro}}">
                                @endif
                                <input type="hidden" name="ano_atividade" value="{{$ano_atividade}}">


                                <div class="col-md-12 input-group-btn" style="text-align: center;">
                                    <button type="submit" id="continuar"
                                        class="btn btn-secondary btn-form display-4">Continuar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mbr-arrow hidden-sm-down" aria-hidden="true">
            <a href="#next">
                <i class="mbri-down mbr-iconfont"></i>
            </a>
        </div>
    </section>

    <section class="countdown1 cid-rWZs0jSt3p" id="countdown1-k" style="">



        <div class="container ">
            <h2 class="mbr-section-title pb-3 align-center mbr-fonts-style display-5" style="text-align: center;">Hora
                de Declarar</h2>
            <h3 class="mbr-section-subtitle align-center mbr-fonts-style display-5">A Declaração Anual de Faturamento
                referente ao ano de 2019 deve ser enviada , até as 23h59 do dia 30 de junho de 2020.</h3>

        </div>
        <div class="container countdown-cont align-center">
            <div class="daysCountdown col-xs-3 col-sm-3 col-md-3" title="Dias"></div>
            <div class="hoursCountdown col-xs-3 col-sm-3 col-md-3" title="Horas"></div>
            <div class="minutesCountdown col-xs-3 col-sm-3 col-md-3" title="Minutos"></div>
            <div class="secondsCountdown col-xs-3 col-sm-3 col-md-3" title="Segundos"></div>
            <div class="countdown pt-5 mt-2" data-due-date="2020/06/30">
            </div>
            <h3>Tempo Restante</h3>
        </div>
    </section>

    <section class="features3 cid-rWZsu2uGSQ" id="features3-m">




        <div class="container">
            <div class="media-container-row">
                <div class="card p-3 col-12 col-md-6 col-lg-4">
                    <div class="card-wrapper">
                        <div class="card-img">
                            <img src="assets/images/background1.jpg" alt="">
                        </div>
                        <div class="card-box">
                            <h4 class="card-title mbr-fonts-style display-7">
                                Vantagens de ser MEI</h4>
                            <p class="mbr-text mbr-fonts-style display-7">
                                Quando um empreendedor se torna MEI, ele recebe um CNPJ e alguns benefícios do INSS. A
                                formalização traz segurança para a família toda, não só para o dono da empresa.
                        </div>
                        <div class="mbr-section-btn text-center"><a href="info_1.html"
                                class="btn btn-primary display-4">
                                Leia mais</a></div>
                    </div>
                </div>

                <div class="card p-3 col-12 col-md-6 col-lg-4">
                    <div class="card-wrapper">
                        <div class="card-img">
                            <img src="assets/images/background2.jpg" alt="Mobirise">
                        </div>
                        <div class="card-box">
                            <h4 class="card-title mbr-fonts-style display-7">
                                Curso de Gestão Financeira</h4>
                            <p class="mbr-text mbr-fonts-style display-7">
                                Todo empreendedor sabe que a necessidade de planejamento é uma realidade, mas como
                                alcançar uma rotina organizada? O curso Gestão financeira possibilita...
                            </p>
                        </div>
                        <div class="mbr-section-btn text-center"><a target="_blank"
                                href="https://m.sebrae.com.br/sites/PortalSebrae/cursosonline/gestao-financeira,7370b8a6a28bb610VgnVCM1000004c00210aRCRD"
                                class="btn btn-primary display-4">Saiba mais</a></div>
                    </div>
                </div>

                <div class="card p-3 col-12 col-md-6 col-lg-4">
                    <div class="card-wrapper">
                        <div class="card-img">
                            <img src="assets/images/background3.jpg" alt="Mobirise">
                        </div>
                        <div class="card-box">
                            <h4 class="card-title mbr-fonts-style display-7">
                                Curso Marketing Digital para o Empreendedor</h4>
                            <p class="mbr-text mbr-fonts-style display-7">
                                Com o surgimento da internet e dos ambientes virtuais, novos recursos ficaram
                                disponíveis, tornando o marketing digital algo muito poderoso em relação ao marketing
                                tradicional.
                            </p>
                        </div>
                        <div class="mbr-section-btn text-center"><a target="_blank"
                                href="https://m.sebrae.com.br/sites/PortalSebrae/cursosonline/marketing-digital-para-o-empreendedor,f870b8a6a28bb610VgnVCM1000004c00210aRCRD"
                                class="btn btn-primary display-4">Saiba mais</a></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="counters1 counters cid-rWZvzi8l3Q" id="counters1-o">





        <div class="container">

            <h2 style="text-align: center;">Junte-se a milhares de clientes</h2>
            <div class="container pt-4 mt-2">
                <div class="media-container-row">
                    <div class="card p-3 align-center col-12 col-md-6">
                        <div class="panel-item p-3">
                            <div class="card-img pb-3">
                                <span class="mbr-iconfont mbri-touch"></span>
                            </div>

                            <div class="card-text">
                                <h3 class="count pt-3 pb-3 mbr-fonts-style display-2">
                                    1953
                                </h3>
                                <h4 class="mbr-content-title mbr-bold mbr-fonts-style display-7">
                                    Declarações feitas por acesso via celulares.
                                </h4>
                                <p class="mbr-content-text mbr-fonts-style display-7">
                                    Site adaptável para celulares e tablets. Muito intuitivo.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card p-3 align-center col-12 col-md-6">
                        <div class="panel-item p-3">
                            <div class="card-img pb-3">
                                <span class="mbr-iconfont mbri-laptop"></span>
                            </div>
                            <div class="card-text">
                                <h3 class="count pt-3 pb-3 mbr-fonts-style display-2">
                                    2314
                                </h3>
                                <h4 class="mbr-content-title mbr-bold mbr-fonts-style display-7">
                                    Declarações feitas por acesso via computadores
                                </h4>
                                <p class="mbr-content-text mbr-fonts-style display-7">
                                    Site Simplificado
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="cid-rWZsDy1dtc mbr-parallax-background" id="footer1-n">



        <div class="mbr-overlay" style="background-color: #1659BF; opacity: 100;"></div>

        <div class="container">
            <div class="media-container-row content text-white">
                <div class="col-12 col-md-4">
                    <div class="media-wrap">
                        <a href="https://declararaqui.com.br/">
                            <img src="assets/images/logoda3-153x153.png" alt="DeclararAqui" title="">
                        </a>
                    </div>
                </div>
                <div class="col-12 col-md-3 mbr-fonts-style display-7">
                    <h5 class="pb-3">
                        Redes Sociais</h5>
                    <div>
                        <div class="soc-item" style="margin-left: 20px;">
                            <a href="" target="_blank">
                                <span class="mbr-iconfont mbr-iconfont-social socicon-instagram socicon"></span>
                            </a>
                            <a href="https://www.facebook.com/Declarar-Aqui-112752977079122" target="_blank">
                                <span class="socicon-facebook socicon mbr-iconfont mbr-iconfont-social"></span>
                            </a>
                            <a href="" target="_blank">
                                <span class="socicon-youtube socicon mbr-iconfont mbr-iconfont-social"></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3 mbr-fonts-style display-7">
                    <h5 class="pb-3">
                        Contato</h5>
                    <p class="mbr-text">
                        Email: atendimento@declararaqui.com.br<br>
                    </p>
                </div>
                <div class="col-12 col-md-3 mbr-fonts-style display-7">
                    <h5 class="pb-3">
                        Links Uteis</h5>
                    <p class="mbr-text">
                        <a class="text-light" href="">Sebrae</a>
                        <br><a class="text-light" href="https://receita.economia.gov.br/">Receita Federal</a>
                        <br><a class="text-light" href="http://www.portaldoempreendedor.gov.br/">Portal do
                            Empreendedor</a>
                    </p>
                </div>
            </div>
            <div class="footer-lower">
                <div class="media-container-row">
                    <div class="col-sm-12">
                        <hr>
                    </div>
                </div>
                <div class="media-container-row mbr-white">
                    <div class="col-sm-6 copyright">
                        <p class="mbr-text mbr-fonts-style display-7">.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section once="footers" class="cid-rX09ybFIXQ" id="footer6-18" style="padding-top: 20px;padding-bottom: 30px;">





        <div class="container">
            <div class="media-container-row align-center mbr-white">
                <div class="col-12">
                    <p class="aviso">A inscrição, alteração, regularização, baixa e demais itens relativos ao MEI podem
                        ser solicitados sem o acompanhamento dos profissionais deste site e de forma gratuita nos órgãos
                        públicos do Governo. Esse site não faz parte do Governo e oferece serviço privado e opcional.
                    </p>
                    <p class="aviso">
                        © Copyright 2020 Declarar Aqui- Todos os direitos reservados.
                    </p>
                </div>
            </div>
        </div>
    </section>


    <script src="assets/web/assets/jquery/jquery.min.js"></script>
    <script src="assets/popper/popper.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/smoothscroll/smooth-scroll.js"></script>
    <script src="assets/dropdown/js/nav-dropdown.js"></script>
    <script src="assets/dropdown/js/navbar-dropdown.js"></script>
    <script src="assets/touchswipe/jquery.touch-swipe.min.js"></script>
    <script src="assets/viewportchecker/jquery.viewportchecker.js"></script>
    <script src="assets/parallax/jarallax.min.js"></script>
    <script src="assets/countdown/jquery.countdown.min.js"></script>
    <script src="assets/tether/tether.min.js"></script>
    <script src="assets/theme/js/script.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#cnpj").mask("99.999.999/9999-99");
            $("#cpf").mask("999.999.999-99");
            $("#cep").mask("99999-999");
            $("#data_nasc").mask("99/99/9999");
            $("#fone").mask("(99)9 9999-9999");

            $("#continuar").on('click', function () {
                $error = false;
                if ($('#cpnj').val() == '') {
                    $('#cnpj').attr('style', 'border-color:red !important;');
                    $error = true;
                }
                if ($('#razao').val() == '') {
                    $('#razao').attr('style', 'border-color:red !important;');
                    $error = true;
                }
                if ($('#nome_fantasia').val() == '') {
                    $('#nome_fantasia').attr('style', 'border-color:red !important;');
                    $error = true;
                }
                if ($('#email').val() == '') {
                    $('#email').attr('style', 'border-color:red !important;');
                    $error = true;
                }
                if ($('#fone').val() == '') {
                    $('#fone').attr('style', 'border-color:red !important;');
                    $error = true;
                }
                if ($('#cpf').val() == '') {
                    $('#cpf').attr('style', 'border-color:red !important;');
                    $error = true;
                }
                if ($('#data_nasc').val() == '') {
                    $('#data_nasc').attr('style', 'border-color:red !important;');
                    $error = true;
                }
                if ($error == true) {
                    return false;
                }
            });
        });

    </script>


    <script type="text/javascript">
        $("#cep").focusout(function () {
            //Início do Comando AJAX
            $.ajax({
                //O campo URL diz o caminho de onde virá os dados
                //É importante concatenar o valor digitado no CEP
                url: 'https://viacep.com.br/ws/' + $(this).val() + '/json/unicode/',
                //Aqui você deve preencher o tipo de dados que será lido,
                //no caso, estamos lendo JSON.
                dataType: 'json',
                //SUCESS é referente a função que será executada caso
                //ele consiga ler a fonte de dados com sucesso.
                //O parâmetro dentro da função se refere ao nome da variável
                //que você vai dar para ler esse objeto.
                success: function (resposta) {
                    //Agora basta definir os valores que você deseja preencher
                    //automaticamente nos campos acima.
                    $("#logradouro").val(resposta.logradouro);
                    $("#complemento").val(resposta.complemento);
                    $("#bairro").val(resposta.bairro);
                    $("#cidade").val(resposta.localidade);
                    $("#uf").val(resposta.uf);
                    //Vamos incluir para que o Número seja focado automaticamente
                    //melhorando a experiência do usuário
                    $("#numero").focus();
                }
            });
        });

    </script>

    <script>
        //Verifica se CPF é válido
        function TestaCPF(strCPF) {
            var Soma, Resto, borda_original;
            Soma = 0;

            if (strCPF == "00000000000") {
                document.getElementById("cpf").setCustomValidity('Invalid');
                return false;
            }

            for (i = 1; i <= 9; i++) {
                Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (11 - i);
            }

            Resto = (Soma * 10) % 11;
            if ((Resto == 10) || (Resto == 11)) {
                Resto = 0;
            }

            if (Resto != parseInt(strCPF.substring(9, 10))) {
                document.getElementById("cpf").setCustomValidity('Invalid');
                return false;
            }

            Soma = 0;
            for (i = 1; i <= 10; i++) {
                Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (12 - i);
            }

            Resto = (Soma * 10) % 11;
            if ((Resto == 10) || (Resto == 11)) {
                Resto = 0;
            }

            if (Resto != parseInt(strCPF.substring(10, 11))) {
                document.getElementById("cpf").setCustomValidity('Invalid');
                return false;
            }

            document.getElementById("cpf").setCustomValidity('');
            return true;
        }

    </script>


    <div id="scrollToTop" class="scrollToTop mbr-arrow-up"><a style="text-align: center;"><i
                class="mbr-arrow-up-icon mbr-arrow-up-icon-cm cm-icon cm-icon-smallarrow-up"></i></a></div>
    <input name="animation" type="hidden">
</body>

</html>
