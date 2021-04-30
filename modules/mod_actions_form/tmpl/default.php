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
                            <input id="frase" name="frase" type="text" placeholder="Frase sobre a foto com a mãe (145 caracteres)." maxlength="145" required>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <input id="palavra" name="palavra" type="text" placeholder="Palavra que expresse seu sentimento para com o clube (45 caracteres)." maxlength="45" required>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <label for="anexo">Foto:</label>
                            <input id="anexo" name="anexo" type="file" accept="image/*">
                        </div>
                    </div>
                    <div class="control-group termo">
                        <div class="controls">
                            <input type="checkbox" id="termo" name="termo" value="Aceito">
                            <label for="termo">Aceito e autorizo o uso da imagem pelo clube.</label>
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