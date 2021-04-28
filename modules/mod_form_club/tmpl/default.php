<section id="form-club">

    <div class="form-club">

        <?php if ($params->get('text_intro')): ?>

            <div id="desc-club">

                <?= $params->get('text_intro') ?>

            </div>

        <?php endif; ?>

        <div id="retornoHTML">

            <form name="club_form" id="club-form" enctype="multipart/form-data">

                <fieldset>

                    <input name="nome" id="nome" type="text" placeholder="Nome da Empresa" required><br>

                    <input name="contato" id="contato" type="text" placeholder="Contato" ><br>

                    <input name="discount" id="discount" type="text" placeholder="Desconto" required><br>

                    <input name="phone" id="phone" type="text" placeholder="Telefone" pattern="\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4,5}" maxlength="15"><br>

                    <?php if ($whatsapp == 1): ?>

                        <input name="whatsapp" id="whatsapp" type="text" placeholder="Whatsapp"><br>

                    <?php endif; ?>

                    <input name="email" id="email" type="email" placeholder="E-mail"><br>

                    <input name="site" id="site" type="url" placeholder="Site"><br>

                    <input name="address" id="address" type="text" placeholder="Endereço Completo" ><br>

                    <?php if ($facebook == 1): ?>

                        <input name="facebook" id="facebook" type="url" placeholder="Facebook"><br>

                    <?php endif; ?>

                    <?php if ($instagram == 1): ?>

                        <input name="instagram" id="instagram" type="url" placeholder="Instagram"><br>

                    <?php endif; ?>

                    <textarea name="services" id="services" placeholder="Serviços" rows="5" required></textarea><br>

                    
                    <input id="email_admin" type="hidden" name="email_admin" value="<?php echo $email_admin; ?>"/>

                    <input id="email_form" type="hidden" name="email_form" value="<?php echo $email_form; ?>"/>

                    <input id="subject" type="hidden" name="subject" value="<?php echo $subject; ?>"/>

                    <input id="sucesso" type="hidden" name="sucesso" value="<?php echo $sucesso; ?>"/>

                    <input id="erro" type="hidden" name="erro" value="<?php echo $erro; ?>"/>

                    <input type="submit" id="btn-club" class="btn" value="<?= (!empty($enviar)) ? $enviar : 'Enviar'; ?>">

                    <div class="loading">

                        <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>

                    </div>

                </fieldset>

            </form>

        </div>

    </div>

</section>

