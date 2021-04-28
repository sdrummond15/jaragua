<?php

defined('_JEXEC') or die('Restricted access');



$app = JFactory::getApplication();

$menu = $app->getMenu()->getActive();

$msg_partner = '
<p>A Ouvidoria do Jaraguá Country Club agradece o seu contato.</p>
<p>Informamos que a sua manifestação foi encaminhada para a Diretoria.</p>
<p>Vamos retornar com a maior brevidade possível.</p>
<br><p>Fineza aguardar.</p>';
?>

<div id="claims">

    <h1><?= $this->get('document')->title; ?></h1>

    <div id="claim">

        <div id="retornoHTML">

            <form class="form-claim" name="claim_form" id="claim_form">

                <fieldset>

                    <input name="nome" id="nome" type="text" placeholder="Nome" required>

                    <input name="phone" id="phone" type="tel" placeholder="Telefone">

                    <input name="email" id="email" type="email" placeholder="E-mail">

                    <input name="cota" id="cota" type="text" placeholder="Cota" required>

                </fieldset>

                <fieldset>

                    <textarea name="msg" id="msg" placeholder="Mensagem" rows="5"></textarea>

                    <input name="email_admin" id="email_admin" type="hidden" name="email_admin"

                           value="<?= (isset($menu->query['email_admin'])) ? $menu->query['email_admin'] : ''; ?>"/>

                    <input name="email_form" id="email_form" type="hidden" name="email_form"

                           value="<?= (isset($menu->query['email_form'])) ? $menu->query['email_form'] : ''; ?>"/>

                    <input name="subject" id="subject" type="hidden" name="subject"

                           value="<?= (isset($menu->query['subject'])) ? $menu->query['subject'] : ''; ?>"/>

                    <input name="sucesso" id="sucesso" type="hidden" name="sucesso"

                           value="<?= (isset($menu->query['sucesso'])) ? $menu->query['sucesso'] : ''; ?>"/>

                    <input name="erro" id="erro" type="hidden" name="erro"

                           value="<?= (isset($menu->query['erro'])) ? $menu->query['erro'] : ''; ?>"/>

                    <input name="msg_partner" id="msg_partner" type="hidden" name="msg_partner"

                           value="<?= (isset($menu->query['msg_partner'])) ? $menu->query['msg_partner'] : $msg_partner; ?>"/>

                    <input type="submit" id="btn-claims" class="btn"

                           value="<?= (isset($menu->query['enviar'])) ? $menu->query['enviar '] : 'Enviar'; ?>">

                    <div class="loading">

                        <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>

                    </div>

                </fieldset>

            </form>

        </div>

    </div>



</div>

   

