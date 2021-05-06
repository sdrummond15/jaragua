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

// Creating an app instance
$app = JFactory::getApplication('site');

$app->initialise();
jimport('joomla.user.user');
jimport('joomla.user.helper');

$nome = $_POST['nome'];
$email = $_POST['email'];
$cota = $_POST['cota'];
$phone = $_POST['phone'];
$cell = $_POST['cell'];
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
        $mailfrom = $app->get('mailfrom');
    }else{
        $mailfrom = $email_form;
    }

    $fromname = $app->get('fromname');
    $sitename = $app->get('sitename');

    if(!empty($subject)){
        $subject = $subject;
    }else{
        $subject = 'Cadastro de Cota Jaraguá';
    }

    /* CORPO DO E-MAIL */
    $body = "<h2>".$subject."</h2>";
    $body .= "<p><b>Nome:</b> $nome <br>";

    if(!empty($cota)){
        $body .= "<b>Nº da Cota:</b> $cota <br>";
    }

    if(!empty($email)){
        $body .= "<b>E-mail:</b> $email <br>";
    }

    if(!empty($phone)){
        $body .= "<b>Telefone:</b> $phone <br>";
    }

    if(!empty($cell)){
        $body .= "<b>Celular:</b> $cell <br>";
    }

    $mail = JFactory::getMailer();

    $mail->addRecipient($mailfrom);
    $mail->addReplyTo(array($email, $nome));
    $mail->setSender(array($mailfrom, $fromname));
    $mail->isHtml();
    $mail->setSubject($subject);
    $mail->setBody($body);
    $sent = $mail->Send();

    if(!empty($sucesso)){
        $sucesso = $sucesso;
    }else{
        $sucesso = 'Obrigado por <br>cadastrar sua cota!';
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
        $erro = 'Obrigado por<br>cadastrar sua cota!';
    }

    echo '<div class="enviado-overlay"></div>'
        .'<div class="erro animated fadeIn">'
        . '<div class="fechar"><i class="fa fa-times" aria-hidden="true"></i></div>'
        . '<h1>'.$erro.'</h1>'
        . '<div class="linha"></div>'
        . '</div>';
}