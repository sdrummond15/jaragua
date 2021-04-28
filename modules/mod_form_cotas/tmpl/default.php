<section id="form-cota">
    <div class="form-cota">
        <?php if($params->get('text_intro')): ?>
            <div id="desc-cota">
            <?= $params->get('text_intro') ?>
            </div>
        <?php endif; ?>
        <div id="retornoHTML">
            <form name="cota_form" id="cota_form">
                <fieldset>
                    <input name="nome" id="nome" type="text" placeholder="Nome" required><br>
                    <input name="email" id="email" type="email" placeholder="E-mail" required><br>
                    <input name="cota" id="cota" type="text" placeholder="Cota" required><br>
                    <?php if ($telefone == 1): ?>
                        <input name="phone" id="phone" type="tel" placeholder="Telefone"><br>
                    <?php endif; ?>
                    <?php if ($celular == 1): ?>
                        <input name="cell" id="cell" type="tel" placeholder="Celular"><br>
                    <?php endif; ?>
                    <input name="email_admin" id="email_admin" type="hidden" name="email_admin" value="<?php echo $email_admin; ?>"/>
                    <input name="email_form" id="email_form" type="hidden" name="email_form" value="<?php echo $email_form; ?>"/>
                    <input name="subject" id="subject" type="hidden" name="subject" value="<?php echo $subject; ?>"/>
                    <input name="sucesso" id="sucesso" type="hidden" name="sucesso" value="<?php echo $sucesso; ?>"/>
                    <input name="erro" id="erro" type="hidden" name="erro" value="<?php echo $erro; ?>"/>
                    <input type="submit" id="btn" class="btn" value="<?= (!empty($enviar)) ? $enviar : 'Enviar'; ?>">
                    <div class="loading">
                        <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</section>
