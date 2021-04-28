<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_club
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Include the component HTML helpers.
JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');

JHtml::_('behavior.formvalidation');
JHtml::_('formbehavior.chosen', 'select');

$app = JFactory::getApplication();
$assoc = JLanguageAssociations::isEnabled();
?>
<script type="text/javascript">
    Joomla.submitbutton = function (task) {
        if (task == 'jobb.cancel' || document.formvalidator.isValid(document.id('job-form'))) {
            Joomla.submitform(task, document.getElementById('job-form'));
        }
    }
</script>

<form action="<?php echo JRoute::_('index.php?option=com_jobs&layout=edit&id=' . (int)$this->item->id); ?>"
      method="post" name="adminForm" id="job-form" class="form-validate">

    <?php echo JLayoutHelper::render('joomla.edit.title_alias', $this); ?>
    <div class="form-personalizado">
        <div class="form-horizontal">
            <?php echo JHtml::_('bootstrap.startTabSet', 'myTab', array('active' => 'details')); ?>

            <?php echo JHtml::_('bootstrap.addTab', 'myTab', 'details', empty($this->item->id) ? JText::_('COM_JOB_NEW_JOB', true) : JText::_('COM_JOB_EDIT_JOB', true)); ?>
            <div class="row-fluid">
                <div class="span9">
                    <div class="row-fluid form-horizontal-desktop">
                        <?php echo $this->form->renderField('activity'); ?>
                        <?php echo $this->form->renderField('phone'); ?>
                        <?php echo $this->form->renderField('whatsapp'); ?>
                        <?php echo $this->form->renderField('email'); ?>
                        <?php echo $this->form->renderField('description'); ?>
                        <?php echo $this->form->renderField('keywords'); ?>
                    </div>
                </div>
                <div class="span3">
                    <?php echo JLayoutHelper::render('joomla.edit.global', $this); ?>
                </div>
            </div>
            <?php echo JHtml::_('bootstrap.endTab'); ?>

            <?php echo JHtml::_('bootstrap.addTab', 'myTab', 'publishing', JText::_('JGLOBAL_FIELDSET_PUBLISHING', true)); ?>
            <div class="row-fluid form-horizontal-desktop">
                <div class="span6">
                    <?php echo JLayoutHelper::render('joomla.edit.publishingdata', $this); ?>
                </div>
                <div class="span6">
                    <?php echo JLayoutHelper::render('joomla.edit.metadata', $this); ?>
                </div>
            </div>
            <?php echo JHtml::_('bootstrap.endTab'); ?>


            <?php if ($assoc) : ?>
                <?php echo JHtml::_('bootstrap.addTab', 'myTab', 'associations', JText::_('JGLOBAL_FIELDSET_ASSOCIATIONS', true)); ?>
                <?php echo $this->loadTemplate('associations'); ?>
                <?php echo JHtml::_('bootstrap.endTab'); ?>
            <?php endif; ?>

            <?php echo JHtml::_('bootstrap.endTabSet'); ?>
        </div>
    </div>
    <input type="hidden" name="task" value=""/>
    <?php echo JHtml::_('form.token'); ?>
</form>
