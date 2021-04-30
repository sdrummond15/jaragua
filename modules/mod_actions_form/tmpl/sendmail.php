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
$cota = $_POST['cota'];
$frase = $_POST['frase'];
$palavra = $_POST['palavra'];
$anexo = $_FILES['anexo'];
$termo = $_POST['termo'];
$email_admin = $_POST['email_admin'];
$subject = $_POST['subject'];
try {
    $time = time();

    $uploadDir = JPATH_BASE . DS . 'images' . DS . 'acao/';
    $file = $uploadDir . $time . basename($anexo["name"]);
    $imageFileType = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    if (!move_uploaded_file($anexo["tmp_name"], $file)) {
        throw new Exception('Erro no upload da imagem!', 1);
    }

    $app = JFactory::getApplication();

    if (empty($email_admin)) {
        $mailfrom = $app->get('mailfrom');
    } else {
        $mailfrom = $email_admin;
    }

    $fromname = $app->get('fromname');
    $sitename = $app->get('sitename');

    if (!empty($subject)) {
        $subject = $subject;
    } else {
        $subject = 'Ação do Dia das Mães através do site ' . $app->get('sitename');
    }
    /* CORPO DO E-MAIL */
    $body = '<h3>Dados Cadastrados</h3>';
    $body .= '<p><b>Nome:</b>' . $nome . '<br>';
    $body .= '<b>Cota:</b>' . $cota . '<br>';
    $body .= '<b>Frase:</b>' . $frase . '<br>';
    $body .= '<b>Palavra:</b>' . $palavra . '</p>';
    $body .= '<b>Termo:</b>' . $termo . '</p>';
    if (!empty($anexo['name'])) {
        $body .= '<p>Anexo:</p>' . JPATH_BASE . DS . 'images' . DS . 'acao' .DS . $time . $anexo['name'];
        $body .= '<img src="' . JPATH_BASE . DS . 'images' . DS . 'acao' .DS . $time . $anexo['name'] . '" />';
    }

    $mail = JFactory::getMailer();
    $mail->addRecipient($mailfrom);
    $mail->addReplyTo(array($mailfrom, $fromname));
    $mail->setSender(array($mailfrom, $fromname));
    $mail->isHtml();
    $mail->setSubject($subject);
    $mail->setBody($body);
    $sent = $mail->Send();

    $response['msg'] = 'Obrigado por participar!';
    $response['class'] = 'success';
} catch (phpmailerException $e) {
    $response['class'] = 'danger';
    $response['msg'] = $e->message;
}

echo json_encode($response);
