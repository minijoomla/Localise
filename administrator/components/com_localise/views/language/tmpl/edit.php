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
JHtml::_('formbehavior.chosen', 'select');

$fieldSets = $this->form->getFieldsets();
$ftpSets = $this->formftp->getFieldsets();
?>
<script type="text/javascript">
  Joomla.submitbutton = function(task) {
    if (task == 'language.cancel' || document.formvalidator.isValid(document.id('localise-language-form'))) {
      submitform(task);
    }
    else {
      alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED'));?>');
    }
  }
</script>

<form action="<?php JRoute::_('index.php?option=com_localise'); ?>" method="post" name="adminForm" id="localise-language-form" class="form-validate">
  <div class="row-fluid"> 
    <!-- Begin Localise Language -->
    <div class="span12 form-horizontal">
      <fieldset>
        <ul class="nav nav-tabs">
          <?php if ($this->ftp) : ?>
          <li class="active"><a href="#ftp" data-toggle="tab"><?php echo JText::_($ftpSets['ftp']->label); ?></a></li>
          <?php endif; ?>
          <li <?php if (!$this->ftp) : ?>class="active"<?php endif; ?>><a href="#default" data-toggle="tab"><?php echo JText::_($fieldSets['default']->label); ?></a></li>
          <li><a href="#author" data-toggle="tab"><?php echo JText::_($fieldSets['author']->label); ?></a></li>
          <li><a href="#permissions" data-toggle="tab"><?php echo JText::_($fieldSets['permissions']->label); ?></a></li>
        </ul>
        <div class="tab-content">
          <?php if ($this->ftp) : ?>
          <div class="tab-pane active" id="ftp">
            <?php if (!empty($ftpSets['ftp']->description)):?>
            <p class="tip"><?php echo JText::_($ftpSets['ftp']->description); ?></p>
            <?php endif;?>
            <?php if (JError::isError($this->ftp)): ?>
            <p class="error"><?php echo JText::_($this->ftp->message); ?></p>
            <?php endif; ?>
            <?php foreach($this->formftp->getFieldset('ftp',false) as $field): ?>
            <div class="control-group">
              <div class="control-label"> <?php echo $field->label; ?></div>
              <div class="controls"> <?php echo $field->input; ?></div>
            </div>
            <?php endforeach; ?>
          </div>
          <?php endif; ?>
          <div class="tab-pane <?php if (!$this->ftp) : ?>active<?php endif; ?>" id="default">
            <?php if (!empty($fieldSets['default']->description)):?>
            <p class="tip"><?php echo JText::_($fieldSets['default']->description); ?></p>
            <?php endif;?>
            <?php foreach($this->form->getFieldset('default') as $field): ?>
            <div class="control-group">
              <div class="control-label"><?php echo $field->label; ?></div>
              <div class="controls"> <?php echo $field->input; ?></div>
            </div>
            <?php endforeach; ?>
          </div>
          <div class="tab-pane" id="author">
            <?php if (!empty($fieldSets['author']->description)):?>
            <p class="tip"><?php echo JText::_($fieldSets['author']->description); ?></p>
            <?php endif;?>
            <?php foreach($this->form->getFieldset('author') as $field): ?>
            <div class="control-group">
              <div class="control-label"> <?php echo $field->label; ?></div>
              <div class="controls"> <?php echo $field->input; ?></div>
            </div>
            <?php endforeach; ?>
          </div>
          <div class="tab-pane" id="permissions">
            <?php if (!empty($fieldSets['permissions']->description)):?>
            <p class="tip"><?php echo JText::_($fieldSets['permissions']->description); ?></p>
            <?php endif;?>
            <?php foreach($this->form->getFieldset('permissions') as $field): ?>
            <div class="control-group form-vertical">
              <div class="controls"><?php echo $field->input; ?> </div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
        <input type="hidden" name="task" value="" />
        <?php echo JHtml::_('form.token'); ?>
      </fieldset>
    </div>
    <!-- End Localise Language --> 
  </div>
</form>
