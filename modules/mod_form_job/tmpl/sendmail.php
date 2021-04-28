<?php



define('_JEXEC', 1);



// defining the base path.

if (stristr($_SERVER['SERVER_SOFTWARE'], 'win32')) {

    define('JPATH_BASE', realpath(dirname(__FILE__) . '\..\..\..'));

} else define('JPATH_BASE', realpath(dirname(__FILE__) . '/../../..'));

define('DS', DIRECTORY_SEPARATOR);



// including the main joomla files

require_once(JPATH_BASE . DS . 'includes' . DS . 'defines.php');

require_once(JPATH_BASE . DS . 'includes' . DS . 'framework.php');

require_once(JPATH_BASE . DS . 'libraries' . DS . 'phpcrop' . DS . 'WideImage.php');



// Creating an app instance

$app = JFactory::getApplication('site');



$app->initialise();

jimport('joomla.user.user');

jimport('joomla.user.helper');

jimport('joomla.filesystem.file');



function removeCharacters($string)

{

    // matriz de entrada

    $what = array('ä', 'ã', 'à', 'á', 'â', 'ê', 'ë', 'è', 'é', 'ï', 'ì', 'í', 'ö', 'õ', 'ò', 'ó', 'ô', 'ü', 'ù', 'ú', 'û', 'À', 'Á', 'É', 'Í', 'Ó', 'Ú', 'ñ', 'Ñ', 'ç', 'Ç', ' ', '-', '(', ')', ',', ';', ':', '|', '!', '"', '#', '$', '%', '&', '/', '=', '?', '~', '^', '>', '<', 'ª', 'º');

    // matriz de saída

    $by = array('a', 'a', 'a', 'a', 'a', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'A', 'A', 'E', 'I', 'O', 'U', 'n', 'n', 'c', 'C', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_');

    // devolver a string

    return strtolower(str_replace($what, $by, $string));

}

$type_work = $_POST['type-work'];

$nome = $_POST['nome'];

$oportunidade = $_POST['oportunidade'];

$atividade = $_POST['atividade'];

$phone = $_POST['phone'];

$phone2 = $_POST['phone2'];

$email = $_POST['email'];

$services = $_POST['services'];

$cota = $_POST['cota'];

$email_admin = $_POST['email_admin'];

$email_form = $_POST['email_form'];

$subject = $_POST['subject'];

$sucesso = $_POST['sucesso'];

$erro = $_POST['erro'];




?>



    <script>

        jQuery("div.enviado > div.fechar i").click(function () {

            jQuery('.enviado-overlay').css('transition', 'linear 100ms');

            jQuery('.enviado-overlay').hide();

            jQuery('.enviado').css('transition', 'linear 100ms');

            jQuery('.enviado').hide();

        });



        jQuery(document).keyup(function(e) {

            if (e.keyCode == 27) {

                jQuery('.enviado-overlay').css('transition', 'linear 100ms');

                jQuery('.enviado-overlay').hide();

                jQuery('.enviado').css('transition', 'linear 100ms');

                jQuery('.enviado').hide();

            }

        });



        jQuery(".enviado-overlay").click(function () {

            jQuery('.enviado-overlay').css('transition', 'linear 100ms');

            jQuery('.enviado-overlay').hide();

            jQuery('.enviado').css('transition', 'linear 100ms');

            jQuery('.enviado').hide();

        });

    </script>



<?php



try {

    $app = JFactory::getApplication();



    if(!empty($email_admin)){

        $mailfrom = 'marketing@jaraguaclub.com.br';

    }else{

        $mailfrom = 'marketing@jaraguaclub.com.br';

    }



    $fromname = $app->get('fromname');

    $sitename = $app->get('sitename');



    if(!empty($subject)){

        $subject = $subject;

    }else{

        $subject = 'Cadastro Jarajob';

    }



    /* CORPO DO E-MAIL */

    $body = "<h2>".$subject."</h2>";
    if(!empty($type_work)){
        $body .= "<p><b>Oferta de Serviço Autônomo</b></p>";
        $body .= "<p><b>Nome:</b> $nome </p>";
    }else{
        $body .= "<p><b>Oferta de Vaga de Trabalho</b></p>";
        $body .= '<p><b>Oportunidade:</b>' . $oportunidade . '</p>';
    }




    if(!empty($email)){

        $body .= "<b>E-mail:</b> $email <br>";

    }



    if(!empty($phone)){

        $body .= "<b>Telefone:</b> $phone <br>";

    }
    if(!empty($phone2)){

        $body .= "<b>Telefone(2):</b> $phone2 <br>";

    }

    $body .= "<b>Descrição:</b> $services </p>";
    $body .= "<b>Cota:</b> $cota </p>";



    $mail = JFactory::getMailer();




    $mail->addRecipient($mailfrom);

    $mail->addReplyTo(array($email, $nome));

    $mail->setSender(array($mailfrom, $fromname));

    $mail->isHtml();

    $mail->setSubject($subject);

 //   $mail->AddAttachment($logoImg);

    $mail->setBody($body);

    $sent = $mail->Send();



    if(!empty($sucesso)){

        $sucesso = $sucesso;

    }else{

        $sucesso = 'Cadastro Enviado.<br />Obrigado!';

    }



    echo '<div class="enviado-overlay"></div>'

        .'<div class="enviado animated fadeIn">'

        . '<div class="fechar"><i class="fa fa-times" aria-hidden="true"></i></div>'

        . '<h1>'.$sucesso.'</h1>'

        . '<div class="linha"></div>'

        . '</div>'; //retorno devolvido para o ajax caso sucesso

} catch (phpmailerException $e) {



    if(!empty($erro)){

        $erro = $erro;

    }else{

        $erro = 'Cadastro Enviado.<br />Obrigado!';

    }



    echo '<div class="enviado-overlay"></div>'

        .'<div class="erro animated fadeIn">'

        . '<div class="fechar"><i class="fa fa-times" aria-hidden="true"></i></div>'

        . '<h1>'.$erro.'</h1>'

        . '<div class="linha"></div>'

        . '</div>';

}