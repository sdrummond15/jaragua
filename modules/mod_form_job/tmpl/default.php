<section id="form-job">

    <div class="form-job">

        <?php if ($params->get('text_intro')): ?>

            <div id="desc-job">

                <?= $params->get('text_intro') ?>

            </div>

        <?php endif; ?>

        <div id="retornoHTML">

            <form name="job_form" id="job-form" enctype="multipart/form-data">

                <fieldset>

                    <div id="type-works">
                        <div>
                            <input type="radio" id="oferta" class="type-work" name="type-work" value="0" checked/>
                            <label for="oferta" class="btn-type-work"><span>Oferta de Vaga de Trabalho</span></label>
                        </div>
                        <div>
                            <input type="radio" id="prestador" class="type-work" name="type-work" value="1"/>
                            <label for="prestador" class="btn-type-work"><span>Oferta de Serviço Autônomo</span></label>
                        </div>
                    </div>

                    <div id="tp_oportunidade">
                        <select name="oportunidade" id="oportunidade">
                            <option value="1231212">Selecione a oportunidade</option>
                            <option value="Emprego">Emprego</option>
                            <option value="Estágio">Estágio</option>
                            <option value="Temporário">Temporário</option>
                            <option value="Serviço">Serviço</option>
                        </select>
                    </div>

                    <input name="nome" id="nome" type="text" placeholder="Nome">

                    <input name="atividade" id="atividade" type="text" placeholder="Ramo de atividade" required>

                    <input name="phone" id="phone" type="text" placeholder="Telefone / Whatsapp" pattern="\([0-9]{2}\) [0-9]{4,6}-[0-9]{3,4}$" maxlength="15">

                    <input name="phone2" id="phone2" type="text" placeholder="Telefone (2)" pattern="\([0-9]{2}\) [0-9]{4,6}-[0-9]{3,4}$" maxlength="15">

                    <input name="email" id="email" type="email" placeholder="E-mail">

                    <textarea name="services" id="services" placeholder="Descrição da Oportunidade" rows="5"></textarea>

                    <input name="cota" id="cota" type="text" placeholder="Cota" required>

                    <input id="email_admin" type="hidden" name="email_admin" value="<?php echo $email_admin; ?>"/>

                    <input id="email_form" type="hidden" name="email_form" value="<?php echo $email_form; ?>"/>

                    <input id="subject" type="hidden" name="subject" value="<?php echo $subject; ?>"/>

                    <input id="sucesso" type="hidden" name="sucesso" value="<?php echo $sucesso; ?>"/>

                    <input id="erro" type="hidden" name="erro" value="<?php echo $erro; ?>"/>

                    <input type="submit" id="btn-job" class="btn"
                           value="<?= (!empty($enviar)) ? $enviar : 'Enviar'; ?>">

                    <div class="loading">

                        <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>

                    </div>

                </fieldset>

            </form>

        </div>

    </div>

</section>

