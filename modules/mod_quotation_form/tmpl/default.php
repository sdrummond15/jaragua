<section id="quotation">
    <div class="quotation">
        <div id="retornoHTML">
            <div id="msg-box" class="alert alert-danger" role="alert">
                <span class="fechar"><i class="fa fa-times" aria-hidden="true"></i></span>
                <div id="msg"></div>
            </div>
            <form id="form-quotation" method="post" enctype="multipart/form-data">
                  <fieldset>
                    <h3>Já pensou em trabalhar em um dos clubes mais tradicionais de Belo Horizonte?
                        Preencha o formulário e anexe seu currículo.</h3>
                    <div class="control-group">
                        <div class="controls">
                            <input id="nome" name="nome" type="text" placeholder="Empresa" required>
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <div class="controls">
                            <input id="telefone" name="telefone" type="tel" placeholder="Telefone" required>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <input id="email" name="email" type="email" placeholder="E-mail" required>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <input id="idade" name="idade" type="text" placeholder="Idade" required>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <input id="sexo" name="sexo" type="text" placeholder="Sexo" required>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <input id="estado_civil" name="estado_civil" type="text" placeholder="Estado Civil" required>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <input id="endereco" name="endereco" type="text" placeholder="Endereço Completo" required>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <label for="anexo">Anexo:</label>
                            <input id="anexo" name="anexo" type="file" accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint, text/plain, application/pdf, image/*">
                        </div>
                    </div>
                    
                    <input id="email_admin" type="hidden" name="email_admin" value="<?= $email_admin; ?>" />
                    <input id="subject" type="hidden" name="subject" value="<?= $subject; ?>" />
                    <button type="submit" id="enviar" class="btn btn-default"><?= (!empty($enviar)) ? $enviar : 'Enviar'; ?></button>
                    <div class="loading">
                        <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</section>
<script type="text/javascript" src="<?= JURI::base(true) ?>/modules/mod_quotation_form/assets/js/jquery.mask.min.js"></script>
<script type="text/javascript" src="<?= JURI::base(true) ?>/modules/mod_quotation_form/assets/js/scripts.js"></script>