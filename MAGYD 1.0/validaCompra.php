<?php

    
    namespace chillerlan \ QRCodeExamples;
    
    use chillerlan \ QRCode \ { QRCode , QROptions };

    include "QRCODE/vendor/autoload.php";

    session_start();
    if (!isset($_SESSION['usuario_autenticado']) or $_SESSION['usuario_autenticado'] != 'SIM') {
        header('location:logado.php');
       }
    $id = $_SESSION['Id'];
    
    $Pedidos = $_REQUEST['txtpedidos'];
    $Nome = $_REQUEST['txtnome'];
    $Numero = $_REQUEST['txtncartao'];
    $CVV = $_REQUEST['txtcvv'];
    $DataV = $_REQUEST['txtdatav'];
    $cpf = $_REQUEST['txtcpf'];

    $options = new  QROptions ([
        'version'     => 5 ,
        'outputType' => QRCode :: OUTPUT_MARKUP_SVG ,
        'eccLevel'    => QRCode :: ECC_L ,
    ]);
    
    $qrcode = new  QRCode ( $options );

    function validaCPF($cpf) {

        // Verifica se um número foi informado
        if(empty($cpf)) {
            return false;
        }
    
        // Elimina possivel mascara
        $cpf = preg_replace("/[^0-9]/", "", $cpf);
        $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);
        
        // Verifica se o numero de digitos informados é igual a 11 
        if (strlen($cpf) != 11) {
            return false;
        }
        // Verifica se nenhuma das sequências invalidas abaixo 
        // foi digitada. Caso afirmativo, retorna falso
        else if ($cpf == '00000000000' || 
            $cpf == '11111111111' || 
            $cpf == '22222222222' || 
            $cpf == '33333333333' || 
            $cpf == '44444444444' || 
            $cpf == '55555555555' || 
            $cpf == '66666666666' || 
            $cpf == '77777777777' || 
            $cpf == '88888888888' || 
            $cpf == '99999999999') {
            return false;
         // Calcula os digitos verificadores para verificar se o
         // CPF é válido
         } else {   
            
            for ($t = 9; $t < 11; $t++) {
                
                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $cpf{$c} * (($t + 1) - $c);
                }
                $d = ((10 * $d) % 11) % 10;
                if ($cpf{$c} != $d) {
                    return false;
                }
            }
    
            return true;
        }
    }
    if(ValidaCpf($cpf) == true){

        $qrcode -> render ( $Pedidos );

        $qrcode -> render ( $Pedidos , 'qrcode/pedidos'.$id.'.svg' );
        header("location:logado.php");
        
    }
    else{
        echo "<script> alert('cpf invalido tente novamente')</script>";
    }
   
        
?>
