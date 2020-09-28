<?php

namespace App\Http\Controllers\site;

use App\Cliente;
use App\Http\Controllers\Controller;
use App\User;
use App\Empresas;
use App\Logsemail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    private $EMAIL_PAGSEGURO = "patrick.patchelli@hotmail.com";
  //  private $TOKEN_PAGSEGURO = "7E571C2BC64B4DF6AB54E39A52D9F103";
    private $TOKEN_PAGSEGURO = "4d1471e2-7758-4643-88b3-1fc150ee92c77ee84a684053950216f59eb282a29ef9e875-d2b4-4e3b-9a5c-3b6d4d45212f";

    public function formCliente(Request $request){
        $cnpj = $request->input('cnpj');
        $cnpj = str_replace(['/','.','-'],'',$cnpj);
   
        $objEmpresa = Empresas::where('cnpj', $cnpj)->first();
    
        $razao = $nome_fantasia = $nome_ola = $endereco = $numero = $cidade = $cep = $uf = $bairro = $ano_atividade =null;
        if(isset($objEmpresa->cnpj)){
            $razao = $objEmpresa->razao_social;
            $razao = (strlen($razao)>15 && strpos($razao,' ')) ? substr($razao,0,strlen($razao)-11) : $razao;
            $nome_fantasia = $objEmpresa->nome_fantasia;
            $nome_ola = ucfirst(  isset(explode(' ',$razao)[0]) ? explode(' ',$razao)[0] :  ucfirst($razao) );
            $endereco =  $objEmpresa->logradouro;
            $numero = $objEmpresa->numero;
            $cidade = $objEmpresa->municipio;
            $cep = $objEmpresa->cep;
            $uf = $objEmpresa->uf;
            $bairro =$objEmpresa->bairro;
            $ano_atividade = substr($objEmpresa->data_cadastral,0,4);
        }
        
        $arValues = [   'razao'=>$razao,
                        'nome_fantasia'=>$nome_fantasia,
                        'cnpj'=>$cnpj,
                        'nome_ola'=>$nome_ola,
                        'endereco' => $endereco,
                        'numero' => $numero,
                        'cidade' => $cidade,
                        'cep' => $cep,
                        'uf' => $uf,
                        'bairro' => $bairro,
                        'ano_atividade' => $ano_atividade
                    ];

        return view('form_cliente',$arValues);
    }

    public function salvarCliente(Request $request){
        $razao      = $request->input('razao');
        $email      = $request->input('email');
        $fone       = $request->input('fone');
        $cpf        = $request->input('cpf');
        $cnpj       = $request->input('cnpj');
        $endereco   = $request->input('endereco');
        $numero     = $request->input('numero');
        $cidade     = $request->input('cidade');
        $uf         = $request->input('uf');
        $bairro     = $request->input('bairro');
        $cep        = $request->input('cep');

      
        $data_nasc = $request->input('data_nasc');
        $password   = bcrypt('1233');
       
        $User = User::where('email', $email)->first();  
        if(!isset($User->id))
            $User = (new User())->create(['name'=>$razao, 'email' => $email, 'password' => $password]);
        
        if(isset($User->id)){
            $values = [     'cnpj'=>$cnpj, 
                            'telefone'=>$fone, 
                            'cpf'=>str_replace(['/','.','-'],'',$cpf), 
                            'data_nasc'=>$data_nasc, 
                            'endereco' => $endereco,
                            'numero' => $numero,
                            'cidade' => $cidade,
                            'cep' => $cep,
                            'uf' => $uf,
                            'bairro' => $bairro];
            if(!$User->cliente()->where('cnpj',$cnpj)->first()){
                $User->cliente()->create($values);
            }else{
                $User->cliente()->update($values);
            }
            return view('form_declaracao',['cnpj'=>$cnpj,'ano_atividade'=>$request->input('ano_atividade'),'id'=>md5($User->cliente->id)]);
        }
        dd('Erro');
    }   

    public function salvarAnos(Request $request){
        $ano2015        = $request->input('2015');
        $ano2016        = $request->input('2016');
        $ano2017        = $request->input('2017');
        $ano2018        = $request->input('2018');
        $ano2019        = $request->input('2019');
        if(!isset($ano2015) && !isset($ano2016) && !isset($ano2017) && !isset($ano2018) && !isset($ano2019)){
            return view('form_declaracao',['cnpj'=>$request->input('cnpj'),'id'=>$request->input('declaracao')]);
        }
        return view('form_valor',['cnpj'=>$request->input('cnpj'),'id'=>$request->input('declaracao'), 'ano2015'=> $ano2015, 'ano2016' => $ano2016, 'ano2017' => $ano2017, 'ano2018' => $ano2018, 'ano2019' =>$ano2019]);
    }

    public function salvarDeclaracao(Request $request){
        $id_cliente  = $request->input('declaracao');
        $objCliente = Cliente::where(DB::raw('md5(id)'), $id_cliente)->first();
        
        if(isset($objCliente->id)){
            $ano2015 = $request->input('ano2015');
            if(isset($ano2015)){    
                $funcionario2015    = $request->input('funcionario2015');
                $valor2015          = $request->input('valor2015');
                $valor_servico2015  = $request->input('valor_servico2015');
                $funcionario2015    = isset($funcionario2015)?$funcionario2015:'N';
                $values2015 = ['ano_declarar'=>'2015','valor_declarado'=>$valor2015,'valor_servicos'=>$valor_servico2015,'tem_empregado'=>$funcionario2015];

                if(!$objCliente->mei()->where('ano_declarar','2015')->first()){
                    $objCliente->mei()->create($values2015);
                }else{
                    $objCliente->mei()->update($values2015);
                }
            }

            $ano2016 = $request->input('ano2016');
            if(isset($ano2016)){    
                $funcionario2016    = $request->input('funcionario2016');
                $valor2016          = $request->input('valor2016');
                $valor_servico2016  = $request->input('valor_servico2016');
                $funcionario2016    = isset($funcionario2016)?$funcionario2016:'N';
                $values2016 = ['ano_declarar'=>'2016','valor_declarado'=>$valor2016,'valor_servicos'=>$valor_servico2016,'tem_empregado'=>$funcionario2016];
                if(!$objCliente->mei()->where('ano_declarar','2016')->first()){
                    $objCliente->mei()->create($values2016);
                }else{
                    $objCliente->mei()->update($values2016);
                }
            }

            $ano2017 = $request->input('ano2017');
            if(isset($ano2017)){    
                $funcionario2017    = $request->input('funcionario2017');
                $valor2017          = $request->input('valor2017');
                $valor_servico2017  = $request->input('valor_servico2017');
                $funcionario2017    = isset($funcionario2017)?$funcionario2017:'N';
                $values2017 = ['ano_declarar'=>'2017','valor_declarado'=>$valor2017,'valor_servicos'=>$valor_servico2017,'tem_empregado'=>$funcionario2017];
                if(!$objCliente->mei()->where('ano_declarar','2017')->first()){
                    $objCliente->mei()->create($values2017);
                }else{
                    $objCliente->mei()->update($values2017);
                }
            }

            $ano2018 = $request->input('ano2018');
            if(isset($ano2018)){    
                $funcionario2018    = $request->input('funcionario2018');
                $valor2018          = $request->input('valor2018');
                $valor_servico2018  = $request->input('valor_servico2018');
                $funcionario2018    = isset($funcionario2018)?$funcionario2018:'N';
                $values2018 = ['ano_declarar'=>'2018','valor_declarado'=>$valor2018,'valor_servicos'=>$valor_servico2018,'tem_empregado'=>$funcionario2018];
                if(!$objCliente->mei()->where('ano_declarar','2018')->first()){
                    $objCliente->mei()->create($values2018);
                }else{
                    $objCliente->mei()->update($values2018);
                }
            }

            $ano2019 = $request->input('ano2019');
            if(isset($ano2019)){    
                $funcionario2019    = $request->input('funcionario2019');
                $valor2019          = $request->input('valor2019');
                $valor_servico2019  = $request->input('valor_servico2019');
                $funcionario2019    = isset($funcionario2019)?$funcionario2019:'N';
                $values2019 = ['ano_declarar'=>'2019','valor_declarado'=>$valor2019,'valor_servicos'=>$valor_servico2019,'tem_empregado'=>$funcionario2019];
                if(!$objCliente->mei()->where('ano_declarar','2019')->first()){
                    $objCliente->mei()->create($values2019);
                }else{
                    $objCliente->mei()->update($values2019);
                }
            }
            return redirect()->route('finalizar-declaracao', $id_cliente);
            
        }
        dd('erro');
    }

    public function finalizar($id_cliente){
        return view('finaliza',['id'=> $id_cliente]);
    }

    public function valorDeclaracao(){
        return view('form_valor');
    }
    public function pagamentoDeclaracao(Request $request){
        $id_cliente  = $request->input('declaracao');
        $objCliente = Cliente::where(DB::raw('md5(id)'), $id_cliente)->first();
        if(isset($objCliente->id)){
            return view('pagamento',['id'=>$id_cliente]);
        }
        dd('erro');
    }

    /**
     * Usado para gerar token usado no cartao de credito
     *
     * @return void
     */
    public function pagsegurotokenid(){
        $email=$this->EMAIL_PAGSEGURO;
        $token=$this->TOKEN_PAGSEGURO;
        $Url="https://ws.pagseguro.uol.com.br/v2/sessions?email=".$email."&token=".$token."";
        $Curl=curl_init($Url);
        curl_setopt($Curl,CURLOPT_HTTPHEADER,array("Content-Type: application/x-www-form-urlencoded; charset=UTF-8"));
        curl_setopt($Curl,CURLOPT_POST,1);
        curl_setopt($Curl,CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt($Curl,CURLOPT_RETURNTRANSFER,true);
        $Retorno=curl_exec($Curl);
        curl_close($Curl);

        $Xml=simplexml_load_string($Retorno);
        echo json_encode($Xml);
    }

    public function finalizateste(){
        return view('finaliza');
    }

    public function pagseguro(){
        $Data["email"]="patrick.patchelli@hotmail.com";
        $Data["token"]="7E571C2BC64B4DF6AB54E39A52D9F103";
        $Data["currency"]="BRL";
        $Data["itemId1"]="1";
        $Data["itemDescription1"]="Declaração Anual MEI.";
        $Data["itemAmount1"]="22.90";
        $Data["itemQuantity1"]="1";
        $Data["itemWeight1"]="1000";
        $Data["reference"]="83783783737";
        $Data["senderName"]="Alair Chrisostemo Junior";
        $Data["senderAreaCode"]="41";
        $Data["senderPhone"]="997718341";
        $Data["senderEmail"]="c64456852275982503192@sandbox.pagseguro.com.br";
        $Data["shippingType"]="1";
        $Data["shippingAddressStreet"]="Rua rio de janeiro";
        $Data["shippingAddressNumber"]="65";
        $Data["shippingAddressComplement"]="Casa";
        $Data["shippingAddressDistrict"]="aguas belas";
        $Data["shippingAddressPostalCode"]="83010540";
        $Data["shippingAddressCity"]="sâo jose dos pinhais";
        $Data["shippingAddressState"]="PR";
        $Data["shippingAddressCountry"]="BRA";

        $BuildQuery=http_build_query($Data);
        $Url="https://ws.sandbox.pagseguro.uol.com.br/v2/checkout";

        $Curl=curl_init($Url);
        curl_setopt($Curl,CURLOPT_HTTPHEADER,Array("Content-Type: application/x-www-form-urlencoded; charset=UTF-8"));
        curl_setopt($Curl,CURLOPT_POST,true);
        curl_setopt($Curl,CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt($Curl,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($Curl,CURLOPT_POSTFIELDS,$BuildQuery);
        $Retorno=curl_exec($Curl);
        curl_close($Curl);

        $Xml=simplexml_load_string($Retorno);
        echo $Xml->code;
    }

    public function pagseguroboleto(Request $request){
        $HashCard = $request->input('HashCard');

        $id_cliente  = $request->input('declaracao');
        $objCliente = Cliente::where(DB::raw('md5(id)'), $id_cliente)->first();
      
        $arMei = $objCliente->mei()->where('pago','N')->distinct('ano_declarar')->get();
    
        $Data = array();

        $Data["email"]="patrick.patchelli@hotmail.com";
        //$Data["token"]="7E571C2BC64B4DF6AB54E39A52D9F103";
        $Data["token"]="4d1471e2-7758-4643-88b3-1fc150ee92c77ee84a684053950216f59eb282a29ef9e875-d2b4-4e3b-9a5c-3b6d4d45212f";
        $Data["paymentMode"]="default";
        $Data["paymentMethod"]="boleto";
        $Data["receiverEmail"]="patrick.patchelli@hotmail.com";
        $Data["currency"]="BRL";

        $c=1;
        $arAnos = [];
        foreach($arMei as $mei) {
            if(!in_array($mei->ano_declarar,$arAnos)){
                $Data["itemId".$c] = $c;
                $Data["itemDescription".$c] = 'Declaração ' . $mei->ano_declarar;
                $Data["itemAmount".$c] =  '22.90';
                $Data["itemQuantity".$c] = '1';
                $arAnos[] = $mei->ano_declarar;
                $c++;
            }
        }

        $Data["notificationURL="]="https://www.meusite.com.br/notificacao.php";
        $Data["reference"]="83783783737";
        $Data["senderName"]=$objCliente->user->name;
        $Data["senderCPF"]= $objCliente->cpf;
        $Data["senderAreaCode"]=substr(str_replace(['(',')','-',' '],'', $objCliente->telefone),0,2 );
        $Data["senderPhone"]=substr(str_replace(['(',')','-',' '],'', $objCliente->telefone),2,15);
        $Data["senderEmail"]=$objCliente->user->email;
        $Data["senderHash"]=$HashCard;
        $Data["shippingAddressStreet"]=$objCliente->endereco;
        $Data["shippingAddressNumber"]=$objCliente->numero;
        $Data["shippingAddressComplement"]='';
        $Data["shippingAddressDistrict"]=$objCliente->bairro;
        $Data["shippingAddressPostalCode"]=str_pad($objCliente->cep, 8, '0', STR_PAD_LEFT);
        $Data["shippingAddressCity"]=$objCliente->cidade;
        $Data["shippingAddressState"]=$objCliente->uf;
        $Data["shippingAddressCountry"]="BRA";
        $Data["shippingType"]="1";
        $Data["shippingCost"]="0.00";
          
        $BuildQuery=http_build_query($Data);
        $Url="https://ws.pagseguro.uol.com.br/v2/transactions";

        $Curl=curl_init($Url);
        curl_setopt($Curl,CURLOPT_HTTPHEADER,Array("Content-Type: application/x-www-form-urlencoded; charset=UTF-8"));
        curl_setopt($Curl,CURLOPT_POST,true);
        curl_setopt($Curl,CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt($Curl,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($Curl,CURLOPT_POSTFIELDS,$BuildQuery);
        $Retorno=curl_exec($Curl);
        curl_close($Curl);
        
        $Xml=simplexml_load_string($Retorno);
        
        if(isset($Xml->paymentLink)){
            $objCliente->mei()->where('pago','N')->update(['pago' => 'B','retorno_pagamento'=>$Xml->paymentLink]);
            echo "<script>window.location='$Xml->paymentLink';</script>";
        }else{
            $dados_usados = ['data'=>$Data,'xml'=>$Retorno];
            $objCliente->mei()->where('pago','N')->update(['retorno_pagamento'=>json_encode($dados_usados)]);
            echo "ocorreu um erro ao tentar gerar o boleto";
        }
    }

    public function pagamentocartao(Request $request){
        $TokenCard  = $_POST['TokenCard'];
        $HashCard   = $_POST['HashCard'];

        $email=$this->EMAIL_PAGSEGURO;
        $token=$this->TOKEN_PAGSEGURO;

        $id_cliente  = $request->input('declaracao');
        $objCliente = Cliente::where(DB::raw('md5(id)'), $id_cliente)->first();
        //$countDeclaracao = $objCliente->mei()->where('pago','N')->distinct('ano_declarar')->get()->count('ano_declarar');
        
        $arMei = $objCliente->mei()->where('pago','N')->distinct('ano_declarar')->get();
        $Data = array();

        $Data["email"]=$email;
        $Data["token"]=$token;
        $Data["paymentMode"]="default";
        $Data["paymentMethod"]="creditCard";
        $Data["receiverEmail"]=$email;
        $Data["currency"]="BRL";

        $valorTotal = 0;
        $c=1;
        $arAnos = [];
        foreach($arMei as $mei) {
            if(!in_array($mei->ano_declarar,$arAnos)){
                $Data["itemId".$c] = $c;
                $Data["itemDescription".$c] = 'Declaração ' . $mei->ano_declarar;
                $Data["itemAmount".$c] =  '23.90';
                $Data["itemQuantity".$c] = '1';
                $valorTotal += 23.90;
                $arAnos[] =  $mei->ano_declarar;
                $c++;
            }
        }
      
        $Data["notificationURL="]="https://www.meusite.com.br/notificacao.php";
        $Data["reference"]=$objCliente->id;
        $Data["senderName"]=$objCliente->user->name;
        $Data["senderCPF"]=$objCliente->cpf;
        $Data["senderAreaCode"]=substr(str_replace(['(',')','-',' '],'', $objCliente->telefone),0,2 );
        $Data["senderPhone"]=substr(str_replace(['(',')','-',' '],'', $objCliente->telefone),2,15);
        $Data["senderEmail"]=$objCliente->user->email;
        $Data["senderHash"]=$HashCard;
        $Data["shippingType"]="1";
        $Data["shippingAddressStreet"]=$objCliente->endereco;
        $Data["shippingAddressNumber"]=$objCliente->numero;
        $Data["shippingAddressComplement"]='';
        $Data["shippingAddressDistrict"]=$objCliente->bairro;
        $Data["shippingAddressPostalCode"]=$objCliente->cep;
        $Data["shippingAddressCity"]=$objCliente->cidade;
        $Data["shippingAddressState"]=$objCliente->uf;
        $Data["shippingAddressCountry"]="BRA";
        $Data["shippingType"]="1";
        $Data["shippingCost"]="0.00";
        $Data["creditCardToken"]=$TokenCard;
        $Data["installmentQuantity"]=1;
        $Data["installmentValue"]=number_format($valorTotal, 2, '.', '');
        $Data["noInterestInstallmentQuantity"]=2;
        $Data["creditCardHolderName"]=$objCliente->user->name;
        $Data["creditCardHolderCPF"]=$objCliente->cpf;
        $Data["creditCardHolderBirthDate"]=$objCliente->data_nasc;
        $Data["creditCardHolderAreaCode"]=substr(str_replace(['(',')','-',' '],'', $objCliente->telefone),0,2 );
        $Data["creditCardHolderPhone"]=substr(str_replace(['(',')','-',' '],'', $objCliente->telefone),2,15);
        $Data["billingAddressStreet"]=$objCliente->endereco;
        $Data["billingAddressNumber"]=$objCliente->numero;
        $Data["billingAddressComplement"]='';
        $Data["billingAddressDistrict"]=$objCliente->bairro;
        $Data["billingAddressPostalCode"]=str_pad($objCliente->cep, 8, '0', STR_PAD_LEFT);
        $Data["billingAddressCity"]=$objCliente->cidade;
        $Data["billingAddressState"]=$objCliente->uf;
        $Data["billingAddressCountry"]="BRA";

        $BuildQuery=http_build_query($Data);

        $Url="https://ws.pagseguro.uol.com.br/v2/transactions";

        $Curl=curl_init($Url);
        curl_setopt($Curl,CURLOPT_HTTPHEADER,Array("Content-Type: application/x-www-form-urlencoded; charset=UTF-8"));
        curl_setopt($Curl,CURLOPT_POST,true);
        curl_setopt($Curl,CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt($Curl,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($Curl,CURLOPT_POSTFIELDS,$BuildQuery);
        $Retorno=curl_exec($Curl);
        curl_close($Curl);
        $Xml=simplexml_load_string($Retorno);
        
        if(isset($Xml->status)){
            if($Xml->status == 1){
                if(isset($Xml->code)){
                    $dados_usados = ['data'=>$Data,'xml'=>$Xml];
                    $objCliente->mei()->where('pago','N')->update(['pago' => 'S','retorno_pagamento'=>json_encode($dados_usados)]);
                    return redirect()->route('cartaoaprovado');
                }
            }
        }
        $dados_usados = ['data'=>$Data,'xml'=>$Retorno];
        $objCliente->mei()->where('pago','N')->update(['retorno_pagamento'=>json_encode($dados_usados)]);
        dd('Ocorreu um erro');
    }

    public function cartaoaprovado(){
        return view('cartaoaprovado');
    }

    public function listanomeswpp(){
        

        $from = date('2019-01-01');
        $to = date('2019-02-01');

        Empresas::whereBetween('data_cadastral', [$from, $to])->get();
    }

    public function teste(){
        $html = '<html>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Email Marketing</title>
        <head>
        <style>
                body {
        margin: 0;
        padding: 0;
    }
    
    table,
    td,
    tr {
        vertical-align: top;
        border-collapse: collapse;
    }
    
    * {
        line-height: inherit;
    }
    
    a[x-apple-data-detectors=true] {
        color: inherit !important;
        text-decoration: none !important;
    }
    @media (max-width: 660px) {
    
        .block-grid,
        .col {
            min-width: 320px !important;
            max-width: 100% !important;
            display: block !important;
        }
    
        .block-grid {
            width: 100% !important;
        }
    
        .col {
            width: 100% !important;
        }
    
        .col>div {
            margin: 0 auto;
        }
    
        img.fullwidth,
        img.fullwidthOnMobile {
            max-width: 100% !important;
        }
    
        .no-stack .col {
            min-width: 0 !important;
            display: table-cell !important;
        }
    
        .no-stack.two-up .col {
            width: 50% !important;
        }
    
        .no-stack .col.num4 {
            width: 33% !important;
        }
    
        .no-stack .col.num8 {
            width: 66% !important;
        }
    
        .no-stack .col.num4 {
            width: 33% !important;
        }
    
        .no-stack .col.num3 {
            width: 25% !important;
        }
    
        .no-stack .col.num6 {
            width: 50% !important;
        }
    
        .no-stack .col.num9 {
            width: 75% !important;
        }
    
        .video-block {
            max-width: none !important;
        }
    
        .mobile_hide {
            min-height: 0px;
            max-height: 0px;
            max-width: 0px;
            display: none;
            overflow: hidden;
            font-size: 0px;
        }
    
        .desktop_hide {
            display: block !important;
            max-height: none !important;
        }
    }
    
    .mei {
        font-size: 40px;
        color: white;
        text-align: center;
        font-family: Helvetica, sans-serif;
        padding-top: 20px;
        padding-bottom: 20px;
    }
    .pg1 {
        font-size: 20px;
        line-height: 1.5;
        word-break: break-word;
        text-align: left;
        margin: 0;
        font-family: Helvetica, sans-serif;
    }
    .icon_whatsapp{
        text-decoration: none; 
        -ms-interpolation-mode: bicubic; 
        height: auto;
         border: none; 
         display: block;
    }
            </style>
    
    
        </head>
    
    <body class="clean-body" style="margin: 0; padding: 0; -webkit-text-size-adjust: 100%; background-color: #FFFFFF;">
        <table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0" class="nl-container" role="presentation"
            style="table-layout: fixed; vertical-align: top; min-width: 320px; Margin: 0 auto; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #FFFFFF; width: 100%;"
            valign="top" width="100%">
            <tbody>
                <tr style="vertical-align: top;" valign="top">
                    <td style="word-break: break-word; vertical-align: top;" valign="top">
    
                        <div style="background-color:transparent;">
                            <div class="block-grid"
                                style="Margin: 0 auto; min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;">
                                <div
                                    style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
    
    
                                    <div class="col num12"
                                        style="min-width: 320px; max-width: 640px; display: table-cell; vertical-align: top; width: 640px;">
                                        <div style="width:100% !important;">
    
                                            <div
                                                style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:15px; padding-bottom:15px; padding-right: 0px; padding-left: 0px;">
                                                <!--<![endif]-->
                                                <div align="center" class="img-container center autowidth"
                                                    style="padding-right: 0px;padding-left: 0px;">
                                                    <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr style="line-height:0px"><td style="padding-right: 0px;padding-left: 0px;" align="center"><![endif]--><a
                                                        href="https://declararaqui.com.br/" style="outline:none" tabindex="-1"
                                                        target="_blank"> <img align="center" border="0"
                                                            class="center autowidth" src="https://declararaqui.com.br/assets/images/email_mkt/post.png"
                                                            style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: none; width: 100%; max-width: 221px; display: block;"
                                                            width="221" /></a>
    
                                                </div>
    
                                            </div>
    
                                        </div>
                                    </div>
    
                                </div>
                            </div>
                        </div>
                        <div style="background-color:transparent;">
                            <div class="block-grid"
                                style="Margin: 0 auto; min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #a5f0f3;">
                                <div
                                    style="border-collapse: collapse;display: table;width: 100%;background-color:#1659BF;background-image:url(\'https://declararaqui.com.br/assets/images/email_mkt/featured-area-background_2.png\');background-position:center top;background-repeat:no-repeat">
                                    
    
                                    <div class="col num12"
                                        style="min-width: 320px; max-width: 640px; display: table-cell; vertical-align: top; width: 640px;">
                                        <div style="width:100% !important;">
                                    
                                            <div class="mei">Olá Microempreendor Individual!</div>
                                                <div
                                                style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:20px; padding-bottom:30px; padding-right: 25px; padding-left: 25px;">
                                                    
                                            
                                                    <div
                                                        style="line-height: 1.5; font-size: 25px; color: white; font-family: Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif; mso-line-height-alt: 18px;">
                                                        <p class="pg1">
                                                            Sabia que é preciso informar para a Receita
                                                            Federal o total de seu faturamento anual realizada no ano
                                                            anterior, tudo que foi apurado com a venda de mercadorias ou na
                                                            prestação de serviços, com ou sem emissão de nota fiscal? <br> <br>
                                                            <p class="pg1">	Nós do <strong style="font-size: 22px;">Declarar Aqui</strong> te ajudamos a informar a Receita Federal de
                                                            maneira rápida, fácil e segura. Em apenas 5 minutos você estará
                                                            em dia com o governo.	</p>
                                                        </p>
                                                    </div>
                                                </div>
                                                    <div align="center" class="button-container"
                                                    style="padding-top:0px;padding-right:10px;padding-bottom:50px;padding-left:10px;">
                                                    <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="border-spacing: 0; border-collapse: collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;"><tr><td style="padding-top: 10px; padding-right: 10px; padding-bottom: 50px; padding-left: 10px" align="center"><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="http://www.example.com/" style="height:39pt; width:225.75pt; v-text-anchor:middle;" arcsize="12%" stroke="false" fillcolor="#fe8b86"><w:anchorlock/><v:textbox inset="0,0,0,0"><center style="color:#ffffff; font-family:Arial, sans-serif; font-size:16px"><![endif]--><a
                                                        href="https://declararaqui.com.br/"
                                                        style="-webkit-text-size-adjust: none; text-decoration: none; display: inline-block; color: #ffffff; background-color: #fe8b86; border-radius: 6px; -webkit-border-radius: 6px; -moz-border-radius: 6px; width: auto; width: auto; border-top: 1px solid #fe8b86; border-right: 1px solid #fe8b86; border-bottom: 1px solid #fe8b86; border-left: 1px solid #fe8b86; padding-top: 10px; padding-bottom: 10px; font-family: Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif; text-align: center; mso-border-alt: none; word-break: keep-all;"
                                                        target="_blank"><span
                                                            style="padding-left:55px;padding-right:55px;font-size:16px;display:inline-block;"><span
                                                                style="font-size: 16px; line-height: 2; word-break: break-word; mso-line-height-alt: 32px;"><strong>Declarar Aqui</strong></span></span></a>
                                                    </div>
                                                <div align="center" class="img-container center autowidth"
                                                    style="padding-right: 0px;padding-left: 0px;">
                                                    <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr style="line-height:0px"><td style="padding-right: 0px;padding-left: 0px;" align="center"><![endif]--><img
                                                        align="center" alt="Alternate text" border="0"
                                                        class="center autowidth" src="https://declararaqui.com.br/assets/images/email_mkt/featured-area_4.png"
                                                        style="text-decoration: none; -ms-interpolation-mode: bicubic; border: 0; height: auto; width: 100%; max-width: 432px; display: block;"
                                                        title="Alternate text" width="432" />
                                                
                                                </div>
                                            
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="background-color:transparent;">
                            <div class="block-grid"
                                style="Margin: 0 auto; min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;">
                                <div
                                    style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
                                        <div class="col num12"
                                        style="min-width: 320px; max-width: 640px; display: table-cell; vertical-align: top; width: 640px;">
                                        <div style="width:100% !important;">
                                        
                                            <div
                                                style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:60px; padding-bottom:15px; padding-right: 0px; padding-left: 0px;">
                                                    <div
                                                    style="color:#2f7d81;font-family:Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                                                    <div
                                                        style="line-height: 1.2; font-size: 12px; color: #2f7d81; font-family: Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif; mso-line-height-alt: 14px;">
                                                        <p
                                                            style="font-size: 34px; line-height: 1.2; word-break: break-word; text-align: center; mso-line-height-alt: 41px; margin: 0;">
                                                            <span style="font-size: 34px; color: #1659BF;"><strong>Como Funciona?</strong></span></p>
                                                    </div>
                                                </div>
                                                    </div>
                                        </div>
                                    </div>
                                    </div>
                            </div>
                        </div>
                        <div style="background-color:transparent;">
                            <div class="block-grid"
                                style="Margin: 0 auto; min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;">
                                <div
                                    style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
                                    <div class="col num12"
                                        style="min-width: 320px; max-width: 640px; display: table-cell; vertical-align: top; width: 640px;">
                                        <div style="width:100% !important;">
                                        
                                            <div
                                                style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:60px; padding-right: 0px; padding-left: 0px;">
                                            
                                                <div align="center" class="button-container"
                                                    style="padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                                                    <a
                                                        href="https://declararaqui.com.br/"
                                                        style="-webkit-text-size-adjust: none; text-decoration: none; display: inline-block; color: #ffffff; background-color: #1659BF; border-radius: 6px; -webkit-border-radius: 6px; -moz-border-radius: 6px; width: auto; width: auto; border-top: 1px solid #1659BF; border-right: 1px solid #1659BF; border-bottom: 1px solid #1659BF; border-left: 1px solid #1659BF; padding-top: 10px; padding-bottom: 10px; font-family: Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif; text-align: center; mso-border-alt: none; word-break: keep-all;"
                                                        target="_blank"><span
                                                            style="padding-left:55px;padding-right:55px;font-size:16px;display:inline-block;"><span
                                                                style="font-size: 16px; line-height: 2; word-break: break-word; mso-line-height-alt: 32px;"><strong>Comece Agora Mesmo!</strong></span></span></a>
                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="background-color:transparent;">
                            <div class="block-grid three-up"
                                style="Margin: 0 auto; min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;">
                                <div
                                    style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
                                    <div class="col num4"
                                        style="max-width: 320px; min-width: 213px; display: table-cell; vertical-align: top; width: 213px;">
                                        <div style="width:100% !important;">
                                            
                                            <div
                                                style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                                                
                                                <div align="center" class="img-container center autowidth"
                                                    style="padding-right: 0px;padding-left: 0px;">
                                                    
                                                </div>
                                                <div
                                                    style="color:#232132;font-family:Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;line-height:1.2;padding-top:20px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                                                    <div
                                                        style="line-height: 1.2; font-size: 12px; color: #232132; font-family: Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif; mso-line-height-alt: 14px;">
                                                        <p
                                                            style="font-size: 16px; line-height: 1.2; word-break: break-word; text-align: center; mso-line-height-alt: 19px; margin: 0;">
                                                            <span style="font-size: 16px;"><strong>Dados Cadastrais</strong></span></p>
                                                    </div>
                                                </div>
                                                <div
                                                    style="color:#808080;font-family:Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;line-height:1.5;padding-top:0px;padding-right:10px;padd    ing-bottom:10px;padding-left:10px;">
                                                    <div
                                                        style="line-height: 1.5; font-size: 12px; color: #808080; font-family: Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif; mso-line-height-alt: 18px;">
                                                        <p
                                                            style="font-size: 12px; line-height: 1.5; word-break: break-word; text-align: center; mso-line-height-alt: 18px; margin: 0;">
                                                            <span style="font-size: 12px;">Você preenche os dados de sua empresa começando pelo CNPJ no nosso portal <a href="https://declararaqui.com.br/">Declarar Aqui</a>.</span></p>
                                                    </div>
                                                </div>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="col num4"
                                        style="max-width: 320px; min-width: 213px; display: table-cell; vertical-align: top; width: 213px;">
                                        <div style="width:100% !important;">
                                        
                                            <div
                                                style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                                            
                                                <div align="center" class="img-container center autowidth"
                                                    style="padding-right: 0px;padding-left: 0px;">
                                                   
                                                </div>
                                                <div
                                                    style="color:#232132;font-family:Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;line-height:1.2;padding-top:20px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                                                    <div
                                                        style="line-height: 1.2; font-size: 12px; color: #232132; font-family: Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif; mso-line-height-alt: 14px;">
                                                        <p
                                                            style="font-size: 16px; line-height: 1.2; word-break: break-word; text-align: center; mso-line-height-alt: 19px; margin: 0;">
                                                            <span style="font-size: 16px;"><strong>Faturamento Anual</strong></span></p>
                                                    </div>
                                                </div>
                                                <div
                                                    style="color:#808080;font-family:Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;line-height:1.5;padding-top:0px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                                                    <div
                                                        style="line-height: 1.5; font-size: 12px; color: #808080; font-family: Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif; mso-line-height-alt: 18px;">
                                                        <p
                                                            style="font-size: 12px; line-height: 1.5; word-break: break-word; text-align: center; mso-line-height-alt: 18px; margin: 0;">
                                                            <span style="font-size: 12px;">Você escolhe os anos que deseja declarar e realiza o preenchimento de seu faturamento em vendas e serviços.</span></p>
                                                    </div>
                                                </div>
                                            
                                            </div>
                                    
                                        </div>
                                    </div>
                                    <div class="col num4"
                                        style="max-width: 320px; min-width: 213px; display: table-cell; vertical-align: top; width: 213px;">
                                        <div style="width:100% !important;">
                                        
                                            <div
                                            
                                                <div align="center" class="img-container center autowidth"
                                                    style="padding-right: 0px;padding-left: 0px;">
                                                  
                                                </div>
                                                <div
                                                    style="color:#232132;font-family:Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;line-height:1.2;padding-top:20px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                                                    <div
                                                        style="line-height: 1.2; font-size: 12px; color: #232132; font-family: Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif; mso-line-height-alt: 14px;">
                                                        <p
                                                            style="font-size: 16px; line-height: 1.2; word-break: break-word; text-align: center; mso-line-height-alt: 19px; margin: 0;">
                                                            <span style="font-size: 16px;"><strong>Finalização</strong></span></p>
                                                    </div>
                                                </div>
                                                <div
                                                    style="color:#808080;font-family:Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;line-height:1.5;padding-top:0px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                                                    <div
                                                        style="line-height: 1.5; font-size: 12px; color: #808080; font-family: Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif; mso-line-height-alt: 18px;">
                                                        <p
                                                            style="font-size: 12px; line-height: 1.5; word-break: break-word; text-align: center; mso-line-height-alt: 18px; margin: 0;">
                                                            <span style="font-size: 12px;">Pronto! Agora é só escolher a forma de pagamento e você estará em dia com a Receita Federal.</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div style="background-color:transparent;">
                            <div class="block-grid"
                                style="Margin: 0 auto; min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;">
                                <div
                                    style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
                                    <div class="col num12"
                                        style="min-width: 320px; max-width: 640px; display: table-cell; vertical-align: top; width: 640px;">
                                        <div style="width:100% !important;">
                                            <div
                                                style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:30px; padding-bottom:30px; padding-right: 0px; padding-left: 0px;">
                                                <div 
                                                    style="color:#a6a4a2;font-family:Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;line-height:1.5;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                                                    <div
                                                        style="line-height: 1.5; font-size: 12px; color: #a6a4a2; font-family: Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif; mso-line-height-alt: 18px;">
                                                        <p
                                                            style="font-size: 12px; line-height: 1.5; word-break: break-word; text-align: center; mso-line-height-alt: 18px; margin: 0;">
                                                            <span style="font-size: 12px;">Contato: <a
                                                                    href="atendimento@declararaqui.com.br"
                                                                    style="text-decoration: none; color: #a6a4a2;"
                                                                    title="atendimento@declararaqui.com.br">atendimento@declararaqui.com.br</a></span>
                                                        </p>
                                                        
                                                    </div>
                                                </div>
                                                <table border="0" cellpadding="0" cellspacing="0" class="divider"
                                                    role="presentation"
                                                    style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;"
                                                    valign="top" width="100%">
                                                    <tbody>
                                                        <tr style="vertical-align: top;" valign="top">
                                                            <td class="divider_inner"
                                                                style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;"
                                                                valign="top">
                                                                <table align="center" border="0" cellpadding="0"
                                                                    cellspacing="0" class="divider_content"
                                                                    role="presentation"
                                                                    style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 1px solid #E8EBF1; width: 100%;"
                                                                    valign="top" width="100%">
                                                                    <tbody>
                                                                        <tr style="vertical-align: top;" valign="top">
                                                                            <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;"
                                                                                valign="top"><span></span></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <div
                                                    style="color:#a6a4a2;font-family:Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;line-height:1.5;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                                                    <div
                                                        style="line-height: 1.5; font-size: 12px; color: #a6a4a2; font-family: Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif; mso-line-height-alt: 18px;">
                                                        <p
                                                            style="font-size: 12px; line-height: 1.5; word-break: break-word; text-align: center; mso-line-height-alt: 18px; margin: 0;">
                                                            <span style="font-size: 12px;">© Copyright 2020 Declarar Aqui - Todos os direitos reservados.</span>
                                                        </p>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
    </html>';

        $to = "ppatchelli@gmail.com";
        $from = "atendimento@declararaqui.com.br";
       
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
        $headers .= 'From: Declarar Aqui <atendimento@declararaqui.com.br>';
     
       // mail($to, "MEI - Declarar Aqui",$html, $headers); echo 'foi'; exit;

        set_time_limit(9999999999);
        $arSelect = DB::select("   SELECT distinct correio_eletronico as email,cnpj,data_cadastral 
                                    FROM empresas e
                                    WHERE data_cadastral BETWEEN '20190101' AND '20191230' and  opcao_mei = 'S'
                                    and not exists (select 1 from logs_email l where e.correio_eletronico = l.email )
                                    order by `data_cadastral` ASC
                                    limit 100
                                ");

        $count = 0;                                                
        foreach($arSelect as $empresa){
            ( new Logsemail())->create(['email' => $empresa->email, 'cnpj' => $empresa->cnpj]);
            $envio = mail($empresa->email, "MEI - Declarar Aqui",$html, $headers);
            sleep(3);
            echo $count . ' - Enviado : ' . $empresa->email  . '<br>';
            $count++;
        }
        echo 'Total de envio: ' . $count;
        exit;
    }

}
