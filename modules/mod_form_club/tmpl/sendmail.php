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



$logoImg = '';

if (isset($_FILES['logo']) && empty($_FILES['logo']['error'][0])) {



    $logo = $_FILES['logo'];



    jimport('joomla.filesystem.file');



    if (!JFolder::exists(JPATH_SITE . DS . "images" . DS . "clube_vantagens")) {

        JFolder::create(JPATH_SITE . DS . "images" . DS . "clube_vantagens");

    }



    $logoName = removeCharacters($logo['name']);

    $filename = JFile::makeSafe($logo['name']);

    $dest = JPATH_SITE . DS . "images" . DS . "clube_vantagens";

    $logoImage = JPATH_SITE . DS . "images" . DS . "clube_vantagens" . DS  . $logoName;



    if (empty($logo['error'])) {

        if ((strtolower(JFile::getExt($filename)) == 'jpg') || (strtolower(JFile::getExt($filename)) == 'gif')

            || (strtolower(JFile::getExt($filename)) == 'png') || (strtolower(JFile::getExt($filename)) == 'jpeg')

        ) {

            //Diminui e corta quadrado imagem

            $image = WideImage::load($logo['tmp_name']);

            $resized = $image->resize(450, 450, 'outside');

            $resized = $resized->crop('center', 'center', 450, 450);

            $resized->saveToFile($logoImage, 80);

        }

    }



    $logoImg = JPATH_BASE . DS . 'images/clube_vantagens/' . $logoName;



}



$nome = $_POST['nome'];

$contato = $_POST['contato'];

$discount = $_POST['discount'];

$phone = $_POST['phone'];

$whatsapp = $_POST['whatsapp'];

$email = $_POST['email'];

$site = $_POST['site'];

$address = $_POST['address'];



$facebook = '';

if(isset($_POST['facebook'])){

    $facebook = $_POST['facebook'];

}



$instagram = '';

if(isset($_POST['instagram'])){

    $instagram = $_POST['instagram'];

}



$services = $_POST['services'];

$email_admin = $_POST['email_admin'];

$email_form = $_POST['email_form'];

$subject = $_POST['subject'];

$sucesso = $_POST['sucesso'];

$erro = $_POST['erro'];

$image = $_FILES['logo']['tmp_name'];



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

        $mailfrom = $app->get('mailfrom');

    }else{

        $mailfrom = $email_form;

    }



    $fromname = $app->get('fromname');

    $sitename = $app->get('sitename');



    if(!empty($subject)){

        $subject = $subject;

    }else{

        $subject = 'Parceiro Jaraguá';

    }



    /* CORPO DO E-MAIL */

    $body = "<h2>".$subject."</h2>";

    $body .= "<p><b>Nome da Empresa:</b> $nome <br>";



    if(!empty($contato)){

        $body .= "<b>Contato:</b> $contato <br>";

    }



    $body .= "<b>Desconto:</b> $discount <br>";



    if(!empty($phone)){

        $body .= "<b>Telefone:</b> $phone <br>";

    }



    if(!empty($whatsapp)){

        $body .= "<b>Whatsapp:</b> $whatsapp <br>";

    }



    if(!empty($email)){

        $body .= "<b>E-mail:</b> $email <br>";

    }



    if(!empty($site)){

        $body .= "<b>Website:</b> $site <br>";

    }



    if(!empty($address)){

        $body .= "<b>Endereço:</b> $address <br>";

    }



    if(!empty($facebook)){

        $body .= "<b>Facebook:</b> $facebook <br>";

    }





    if(!empty($instagram)){

        $body .= "<b>Instagram:</b> $instagram <br>";

    }



    $body .= "<b>Serviços Ofertados:</b> $services </p>";



    $mail = JFactory::getMailer();



    if(!empty($logoImg)){

        $body .= "<h4>Logo em anexo!</h4>";

    }



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

        $sucesso = 'Obrigado por se <br> tornar nosso parceiro!';

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

        $erro = 'Obrigada por<br>se tornar nosso parceiro!';

    }



    echo '<div class="enviado-overlay"></div>'

        .'<div class="erro animated fadeIn">'

        . '<div class="fechar"><i class="fa fa-times" aria-hidden="true"></i></div>'

        . '<h1>'.$erro.'</h1>'

        . '<div class="linha"></div>'

        . '</div>';

}