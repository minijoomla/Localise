<?php
/*------------------------------------------------------------------------
# com_localise - Localise
# ------------------------------------------------------------------------
# author    Mohammad Hasani Eghtedar <m.h.eghtedar@gmail.com>
# copyright Copyright (C) 2012 http://joomlacode.org/gf/project/com_localise/. All Rights Reserved.
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Websites: http://joomlacode.org/gf/project/com_localise/
# Technical Support:  Forum - http://joomlacode.org/gf/project/com_localise/forum/
-------------------------------------------------------------------------*/
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
?>
<script type="text/javascript">
<!--
  function submitbutton(task)
  {
    if (task == 'package.cancel' || document.formvalidator.isValid(document.id('localise-downloadpackage-form'))) {
      submitform(task);
    }
    else {
      alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED'));?>');
    }
  }
// -->
</script>

<form action="<?php echo JRoute::_('index.php?option=com_localise&view=exportpackage&format=raw');?>" method="post" name="adminForm" id="localise-downloadpackage-form" class="form-validate">
  <?php if ($this->item->standalone):?>
  <fieldset class="adminform">
    <legend><?php echo JText::_('COM_LOCALISE_GROUP_DOWNLOADPACKAGE');?></legend>
    <?php foreach($this->form->getFieldset('default') as $field): ?>
    <?php if (!$field->hidden): ?>
    <?php echo $field->label; ?>
    <?php endif; ?>
    <?php echo $field->input; //for submit button: window.top.setTimeout('window.parent.SqueezeBox.close()', 2000);?>
    <?php endforeach; ?>
    <div class="clr"></div>
    <button type="button" onclick="javascript: submitbutton('display');"><?php echo JText::_('JSubmit');?></button>
    <?php endif;?>
    <button type="button" onclick="javascript: window.parent.SqueezeBox.close();"><?php echo JText::_('JCancel');?></button>
  </fieldset>
  <input type="hidden" name="task" value="" />
  <?php echo JHtml::_('form.token'); ?>
</form>
