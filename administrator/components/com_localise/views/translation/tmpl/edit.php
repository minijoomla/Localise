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
JHtml::_('stylesheet','com_localise/localise.css', null, true);

$parts = explode('-', $this->state->get('translation.reference'));
$src = $parts[0];
$parts = explode('-', $this->state->get('translation.tag'));
$dest = $parts[0];
$document = JFactory::getDocument();
//$document->addScript('http://www.google.com/jsapi');
$document->addScriptDeclaration("
if (typeof(Localise) === 'undefined') {
  Localise = {};
}
Localise.language_src = '".$src."';
Localise.language_dest = '".$dest."';
");
$fieldSets = $this->form->getFieldsets();
$sections = $this->form->getFieldsets('strings');
$ftpSets = $this->formftp->getFieldsets();

//Prepare Bing translation
JText::script('COM_LOCALISE_BINGTRANSLATING_NOW');
?>
<script type="text/javascript">
  var bingTranslateComplete = false, translator;
  var Localise = {};
  Localise.language_src = '<?php echo $src; ?>';
  Localise.language_dest = '<?php echo $dest; ?>';

  function AzureTranslator(obj, targets, i, token, transUrl){
   var idname = jQuery(obj).attr('rel');
   if(translator && !translator.status){
     alert(Joomla.JText._('COM_LOCALISE_BINGTRANSLATING_NOW'));
     return;
   }

   translator =jQuery.ajax({
      type:'POST',
      uril:'index.php',
      data:'option=com_localise&view=translator&format=json&id=<?php echo $this->form->getValue('id');?>&from=<?php echo $src;?>&to=<?php echo $dest;?>&text='
      +encodeURI(jQuery('#'+idname+'text').val())+'&'+token+'=1',
      dataType:'json',
      success:function(res){
        if(res.success){
          jQuery('#'+idname).val(res.text);
        }
        if(targets && targets.length > (i+1)){
          AzureTranslator(targets[i+1], targets, i+1, token);
          jQuery('html,body').animate({scrollTop:jQuery(targets[i+1]).offset().top-150}, 0);
        } else {
          bingTranslateComplete = false;
          if(targets.length > 1)
            jQuery('html,body').animate({scrollTop:0}, 0);
        }
      }
    });
  }

  function returnAll()
  {
    $$('img.return').each(function(e){
      if(e.click)
        e.click();
      else
        e.onclick();
    });
  }

  function translateAll()
  {
    if(bingTranslateComplete){
      alert(Joomla.JText._('COM_LOCALISE_BINGTRANSLATING_NOW'));
      return false;
    }

    bingTranslateComplete = true;
    var targets = $$('img.translate');
    AzureTranslator(targets[0], targets, 0, '<?php echo JSession::getFormToken();?>');
  }
  /* if (typeof(google) !== 'undefined')
  {
    google.load('language', '1');
    google.setOnLoadCallback(null);
  } */
  Joomla.submitbutton = function(task) {
    if (task == 'translation.cancel' || document.formvalidator.isValid(document.id('localise-translation-form'))) {
      Joomla.submitform(task, document.getElementById('localise-translation-form'));
    } else {
      alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED'));?>');
    }
  }
</script>

<form action="<?php JRoute::_('index.php?option=com_localise'); ?>" method="post" name="adminForm" id="localise-translation-form" class="form-validate">
  <div class="row-fluid"> 
    <!-- Begin Localise Translation -->
    <div class="span12 form-horizontal">
      <fieldset>
        <ul class="nav nav-tabs">
          <?php if ($this->ftp) : ?>
          <li class="active"><a href="#ftp" data-toggle="tab"><?php echo JText::_($ftpSets['ftp']->label); ?></a></li>
          <?php endif; ?>
          <li <?php if (!$this->ftp) : ?>class="active"<?php endif; ?>><a href="#default" data-toggle="tab"><?php echo JText::_($fieldSets['default']->label); ?></a></li>
          <li><a href="#strings" data-toggle="tab"><?php echo JText::_('COM_LOCALISE_FIELDSET_TRANSLATION_STRINGS'); ?></a></li>
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
              <div class="controls"> <?php echo $field->input; ?> </div>
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
              <div class="control-label"> <?php echo $field->label; ?></div>
              <div class="controls"> <?php echo $field->input; ?> </div>
            </div>
            <?php endforeach; ?>
          </div>
          <div class="tab-pane" id="strings">
            <div class="key">
              <div class="accordion" id="com_localise_legend_translation">
                <div class="accordion-group">
                  <div class="accordion-heading"> <a class="accordion-toggle" data-toggle="collapse" data-parent="com_localise_legend_translation" href="#legend"> <?php echo JText::_($fieldSets['legend']->label);?> </a> </div>
                  <div id="legend" class="accordion-body collapse">
                    <div class="accordion-inner">
                      <?php if (!empty($fieldSets['legend']->description)):?>
                      <p class="tip"><?php echo JText::_($fieldSets['legend']->description); ?></p>
                      <?php endif;?>
                      <ul class="adminformlist">
                        <?php foreach($this->form->getFieldset('legend') as $field): ?>
                        <li> <?php echo $field->label; ?> <?php echo $field->input; ?> </li>
                        <?php endforeach; ?>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div id="translationbar"> <a href="javascript:void(0);" class="btn bnt-small" id="translateall" onclick="translateAll();"><?php echo JText::_('COM_LOCALISE_BUTTON_TRANSLATE_ALL');?></a> <a href="javascript:void(0);" class="btn bnt-small" id="resetall" onclick="returnAll();"><?php echo JText::_('COM_LOCALISE_BUTTON_RESET_ALL');?></a></div>
              <?php
              if(count($sections)>1):
                echo '<br />';
                echo JHtml::_('bootstrap.startAccordion', 'localise-translation-sliders' /* , array('active' => 'collapse0')*/);
		        $i = 0;
                foreach ($sections as $name => $fieldSet) :
		          echo JHtml::_('bootstrap.addSlide', 'localise-translation-sliders', JText::_($fieldSet->label), 'collapse' . $i++);
              ?>
                  <ul class="adminformlist">
                    <?php foreach ($this->form->getFieldset($name) as $field) :?>
                    <li> <?php echo $field->label; ?> <?php echo $field->input; ?> </li>
                    <?php endforeach;?>
                  </ul>
              <?php
                  echo JHtml::_('bootstrap.endSlide');
                endforeach;
                echo JHtml::_('bootstrap.endAccordion');
              ?>
              <?php else:?>
              <ul class="adminformlist">
                <?php $sections = array_keys($sections);?>
                <?php foreach ($this->form->getFieldset($sections[0]) as $field) :?>
                <li> <?php echo $field->label; ?> <?php echo $field->input; ?> </li>
                <?php endforeach;?>
              </ul>
              <?php endif;?>
            </div>
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
    <!-- End Localise Translation --> 
  </div>
</form>
