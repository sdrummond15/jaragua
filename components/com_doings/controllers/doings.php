<?php
defined('_JEXEC') or die;
jimport('joomla.application.component.controllerform');

class DoingsControllerDoings extends JControllerForm
{
    public function filter(){

        var_dump($this);
        die;
    }
}

class PHP_email extends PHPMailer
{

    public static function email_confirma_contrato($dataForm)
    {

        $menu =& JSite::getMenu();
        $item = $menu->getActive();

        $user = JFactory::getUser($item->query['id_user_mail']);
        $email = $user->get('email');//user email

        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
        $query->select('*');
        $query->from('#__doings');
        $query->where('id = ' . $dataForm['id']);
        $db->setQuery($query);
        $doing = $db->loadObjectList();

        $app = JFactory::getApplication();
        $mailfrom = $email;
        $fromname = 'Evento AMDA';
        $sitename = $app->getCfg('sitename');

        $mail = JFactory::getMailer();
        $mail->addRecipient(array($mailfrom));
        $mail->setSender(array($mailfrom, $fromname));
        $mail->IsHTML();
        $mail->setSubject("Inscrito no Evento");
        $mail->setBody(
            '<html>'
            . '<body>'
            . '<p>Inscrito no evento: ' . $doing[0]->name . ' com sucesso.</p>'
            . '<p>Nome: ' . $dataForm["name"] . '</p>'
            . '<p>E-mail: ' . $dataForm["email"] . '</p>'
            . '<p>CPF: ' . $dataForm["cpf"] . '</p>'
            . '<p>Identidade(RG): ' . $dataForm["rg"] . '</p>'
            . '<p>Telefone: ' . $dataForm["phone"] . '</p>'
            . '<p>Data de Nascimento: ' . $dataForm["date_birth"] . '</p>'
            . '<p>Sexo: ' . $dataForm["gender"] . '</p>'
            . '<p>Escolaridade: ' . $dataForm["schooling"] . '</p>'
            . '<p>Endereço: ' . $dataForm["address"] . '</p>'
            . '<p>Número: ' . $dataForm["number"] . '</p>'
            . '<p>Complemento: ' . $dataForm["complement"] . '</p>'
            . '<p>Bairro: ' . $dataForm["district"] . '</p>'
            . '<p>Cidade: ' . $dataForm["city"] . '</p>'
            . '<p>Estado: ' . $dataForm["state"] . '</p>'
            . '<p>CEP: ' . $dataForm["postal_code"] . '</p>'
            . '</body>'
            . '</html>');

        $sent = $mail->Send();

        //Email de confirmação inscrição

        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
        $query->select('*');
        $query->from('#__doings');
        $query->where('id = ' . $dataForm['id']);
        $db->setQuery($query);
        $doing = $db->loadObjectList();

        $mail = JFactory::getMailer();
        $mail->addRecipient(array($dataForm['email']));
        $mail->setSender(array($mailfrom, $fromname));
        $mail->IsHTML();
        $mail->setSubject("Inscrição Evento");
        $mail->setBody(
            '<html>'
            . '<body>'
            . '<p>Inscrição no evento: ' . $doing[0]->name . ' com sucesso.</p>'
            . '<p>Aguardamos sua presença.</p>'
            . 'Att.: ' . $sitename
            . '</body>'
            . '</html>');

        $sent = $mail->Send();
    }

}