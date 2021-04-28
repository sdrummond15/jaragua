<?php

defined('_JEXEC') or die('Restricted access');

$document = JFactory::getDocument();

?>
<div class="doings">

    <h2>Eventos</h2>

    <div id="box-filter">
        <form id="filter">
            <label>Mês</label>
            <select id="filter-month" name="month" onchange="this.form.submit();">
                <option value="">Todos</option>
                <?php
                setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                date_default_timezone_set('America/Sao_Paulo');
                $month = array();
                $monthSelect = JRequest::getVar('month');
                foreach ($this->filter as $months) {
                    $dateStart = date('Ym', strtotime($months->date_start));
                    $date = date('Y-m-d');
                    if ($months->date_start >= $date) {
                        if (!in_array($dateStart, $month)) {
                            $selected = '';
                            if ($dateStart == $monthSelect) {
                                $selected = 'selected';
                            }
                            echo '<option value="' . $dateStart . '" ' . $selected . '>' .
                                ucfirst(utf8_encode(strftime('%B', strtotime($months->date_start)))) .
                                '</option>';
                            array_push($month, $dateStart);
                        }
                    }
                }
                ?>
            </select>
        </form>

        <?php if (JRequest::getVar('month')): ?>
            <h4>
                <?php
                $mes = substr(JRequest::getVar('month'), 0, 4) . '-' . substr(JRequest::getVar('month'), -2) . '-01';
                echo ucfirst(utf8_encode(strftime('%B', strtotime($mes))))
                ?>
            </h4>
        <?php endif; ?>
    </div>
    <div id="list-doings">
        <?php foreach ($this->doings as $doing): ?>
            <div class="doing">
                <div class="doing-img">
                    <a href="<?php echo JRoute::_('index.php?option=com_doings&view=evento&id=' . $doing->id); ?>">
                        <span style="background-image: url(<?= $doing->image; ?>)"></span>
                    </a>
                </div>
                <div class="doing-desc">
                    <div class="doing-data">
                        <h4>
                            <?php echo strftime('%d', strtotime($doing->date_start)); ?>
                        </h4>
                        <h3>
                            <?php echo strftime('%b', strtotime($doing->date_start)); ?>
                            <span>
                                <?php echo strftime('%Y', strtotime($doing->date_start)); ?>
                            </span>
                        </h3>
                    </div>
                    <div class="doing-locale">
                        <h1>
                            <a href="<?php echo JRoute::_('index.php?option=com_doings&view=evento&id=' . $doing->id); ?>">
                                <?php echo $doing->name; ?>
                            </a>
                        </h1>
                        <p>
                            <?= DoingsModelDoings::convDate($doing->date_start, $doing->date_end); ?>
                            <small>
                                <?= DoingsModelDoings::convHour($doing->hour_start, $doing->hour_end); ?>
                            </small>
                        </p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>