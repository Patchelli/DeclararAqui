<!DOCTYPE html>
<html>

<head>
    <!-- Site made with Mobirise Website Builder v4.12.3, https://mobirise.com -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="generator" content="Mobirise v4.12.3, mobirise.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <link rel="shortcut icon" href="{{ asset('assets/images/logoda3-120x120.png') }}" type="image/x-icon">
    <meta name="description" content="">

    <title>Finalizar Cadastro</title>
   
    <link rel="stylesheet" href=" {{asset('assets/web/assets/mobirise-icons/mobirise-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap-grid.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap-reboot.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/socicon/css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('assets/dropdown/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/animatecss/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/tether/tether.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/theme/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/mobirise/css/mbr-additional.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
        integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />

        <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-153893453-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-153893453-1');
</script>

</head>

<body>
    <section class="menu cid-rWYORjb53z" once="menu" id="menu2-9">

    
        <a href="https://api.whatsapp.com/send?l=pt&amp;phone=5541996597020" target="_blank"><img
                src="{{ asset('assets\images\whats.png') }}"
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
                            <img src="{{ asset('assets/images/logoda3-120x120.png') }}" alt="Logo da Declarar Aqui"
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

        <div class="container" style="margin-top: -26%;" >
            
            <div class="row">
                 
            <div class="col-lg-6 col-md-5">
                    <div class="form-container-declaracao" style="margin-top: 10px" >
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <div class="media-container-column" data-form-type="formoid">
                            <h2>Cartão - Liberação imediata</h3>
                            <br>
                            <p class="text-form-valor"> Após o pagamento,aguarde a DECLARAR AQUI realizar declaraçao, a qual será enviada para seu e-mail quando finalizada.</p>
                            
                        </div>
                        
                        <form method="POST" id="form-cartao" style="text-align: center" action="/pagamento">
                            @csrf
                            
                            <input type="submit" style="margin-top: 20px" class="botao-pagamento btn-primary"  id="BotaoCartao"
                                value="Pagar com Cartão">
                           
                            <input type="hidden" name="declaracao" value="{{$id}}">
                        </form>
                        <img style="width: 100%;  padding-top: 25px; " src="//assets.pagseguro.com.br/ps-integration-assets/banners/pagamento/avista_estatico_550_70.gif" alt="Logotipos de meios de pagamento do PagSeguro" title="Este site aceita pagamentos com as principais bandeiras e bancos, saldo em conta PagSeguro e boleto.">
                    </div>
                    
                </div>
                
                <div class="col-lg-6 col-md-5">
                    <div class="form-container-declaracao" style="margin-top: 10px" >
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <div class="media-container-column" data-form-type="formoid">
                            <h2>Boleto - Até dois dias úteis</h3>
                            <br>
                            <p class="text-form-valor"> Após o pagamento,aguarde a DECLARAR AQUI realizar declaraçao, a qual será enviada para seu e-mail quando finalizada.</p>
                        </div>
                        <form method="POST" id="form-boleto" style="text-align: center" action="/pagseguroboleto">
                            @csrf
                            <input type="button" style="margin-top: 20px" class="botao-pagamento" onclick="gerarboleto()" id="BotaoBoleto"
                                value="Pagar com Boleto">
                            <input type="hidden" id="HashCard" name="HashCard">
                            <input type="hidden" name="declaracao" value="{{$id}}">
                        </form>
                        <img style="width: 100%; padding-top: 25px; " src="//assets.pagseguro.com.br/ps-integration-assets/banners/pagamento/avista_estatico_550_70.gif" alt="Logotipos de meios de pagamento do PagSeguro" title="Este site aceita pagamentos com as principais bandeiras e bancos, saldo em conta PagSeguro e boleto.">
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
                            <img src="{{ asset('assets/images/background1.jpg')}}" alt="">
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
                            <img src="{{ asset('assets/images/background2.jpg')}}" alt="Mobirise">
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
                            <img src="{{ asset('assets/images/background3.jpg')}}" alt="Mobirise">
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
                            <img src="{{ asset('assets/images/logoda3-153x153.png')}}" alt="DeclararAqui" title="">
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

    <div id="scrollToTop" class="scrollToTop mbr-arrow-up"><a style="text-align: center;"><i
                class="mbr-arrow-up-icon mbr-arrow-up-icon-cm cm-icon cm-icon-smallarrow-up"></i></a></div>
    <input name="animation" type="hidden">
</body>

</html>

<script src="{{ asset('assets/web/assets/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('assets/popper/popper.min.js')}}"></script>
<script src="{{ asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('assets/smoothscroll/smooth-scroll.js')}}"></script>
<script src="{{ asset('assets/dropdown/js/nav-dropdown.js')}}"></script>
<script src="{{ asset('assets/dropdown/js/navbar-dropdown.js')}}"></script>
<script src="{{ asset('assets/touchswipe/jquery.touch-swipe.min.js')}}"></script>
<script src="{{ asset('assets/viewportchecker/jquery.viewportchecker.js')}}"></script>
<script src="{{ asset('assets/parallax/jarallax.min.js')}}"></script>
<script src="{{ asset('assets/countdown/jquery.countdown.min.js')}}"></script>
<script src="{{ asset('assets/tether/tether.min.js')}}"></script>
<script src="{{ asset('assets/theme/js/script.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
<script type="text/javascript"
    src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script>
<script type="text/javascript"
    src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>


<script type="text/javascript">

    function gerarboleto(){
        PagSeguroDirectPayment.onSenderHashReady(function(response){
            $("#HashCard").val(response.senderHash);
            if(response.status=='success'){
                $("#form-boleto").trigger('submit');
            }
        });
    }

</script>

