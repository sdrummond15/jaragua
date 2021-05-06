<section id="actions-form">

    <div class="actions-form">

        <div id="retornoHTML">

            <div id="msg-box" class="alert alert-danger" role="alert">

                <span class="fechar"><i class="fa fa-times" aria-hidden="true"></i></span>

                <div id="msg"></div>

            </div>

            <form id="form-actions-form" method="post" enctype="multipart/form-data">

                <fieldset>

                    <div class="control-group left metade">

                        <div class="controls">

                            <input id="nome" name="nome" type="text" placeholder="Nome" required>

                        </div>

                    </div>

                    <div class="control-group metade">

                        <div class="controls">

                            <input id="cota" name="cota" type="text" placeholder="Cota" required>

                        </div>

                    </div>

                    <div class="control-group">

                        <div class="controls">

                            <label for="anexo">Foto:</label>

                            <input id="anexo" name="anexo" type="file" accept="image/*">

                        </div>

                    </div>

                    <div class="control-group">

                        <div class="controls">

                            <input id="frase" name="frase" type="text" placeholder="Faça uma legenda sobre este momento especial com a sua mãe." maxlength="145" required>

                        </div>

                    </div>

                    <div class="control-group">

                        <div class="controls">

                            <input id="palavra" name="palavra" type="text" placeholder="Descreva em uma palavra o seu sentimento pelo clube: “Alegria”, “Festa”, “Família”." maxlength="45" required>

                        </div>

                    </div>

                    <div class="control-group termo">

                        <div class="controls">

                            <input type="checkbox" id="termo" name="termo" value="Aceito">

                            <label for="termo">Aceito e autorizo o uso da imagem pelo clube.</label>
			    
			    <p align="left">A presente autoriza&ccedil;&atilde;o &eacute; concedida a t&iacute;tulo gratuito, abrangendo o uso da imagem acima mencionada pelo Clube Jaragu&aacute; em todas as suas modalidades e, em destaque, das seguintes formas: 
			       (I) home page; (II) cartazes; (III) Redes Sociais (IV); revista impressa e digital (V), v&iacute;deos (VI) e divulga&ccedil;&atilde;o em geral. 
			       Por esta ser a express&atilde;o da minha vontade declaro que autorizo o uso acima descrito sem que nada haja a ser reclamado a t&iacute;tulo de direitos conexos &agrave; minha imagem ou a qualquer outro.</p>

                        </div>

                    </div>

                    <input id="email_admin" type="hidden" name="email_admin" value="<?= $email_admin; ?>" />

                    <input id="subject" type="hidden" name="subject" value="<?= $subject; ?>" />

                    <button type="submit" id="enviar" class="btn btn-default" disabled><?= (!empty($enviar)) ? $enviar : 'ENVIAR'; ?></button>

                    <div class="loading">

                        <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>

                    </div>

                </fieldset>

            </form>

        </div>

    </div>

</section>

<script type="text/javascript" src="<?= JURI::base(true) ?>/modules/mod_actions_form/assets/js/jquery.mask.min.js"></script>

<script type="text/javascript" src="<?= JURI::base(true) ?>/modules/mod_actions_form/assets/js/scripts.js"></script>