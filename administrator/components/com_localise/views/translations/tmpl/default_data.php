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
?>
<?php if ($this->language->tag == $this->form->getValue('reftag')): ?>

<div style="float:right;"> <?php echo JText::sprintf('COM_LOCALISE_TOTAL_FILES', $this->total); ?><br/>
</div>
<div style="float:right;"> <?php echo JText::sprintf('COM_LOCALISE_TOTAL_PHRASES', $this->nbphrases); ?><br/>
</div>
<div style="float:right;color:red;"> <?php echo JText::_('COM_LOCALISE_THIS_IS_THE_REFERENCE_LANGUAGE'); ?> </div>
<?php else: ?>
<div style="float:right;"> <?php echo JText::sprintf('COM_LOCALISE_TOTAL_FILES', $this->total); ?><br/>
  <?php echo JText::sprintf('COM_LOCALISE_TOTAL_EXISTS', $this->totalexist); ?><br/>
</div>
<div style="float:right;"> <?php echo JText::sprintf('COM_LOCALISE_TOTAL_PHRASES', $this->nbphrases); ?><br/>
  <?php echo JText::sprintf('COM_LOCALISE_TOTAL_CHANGED', $this->changed); ?><br/>
</div>
<div style="float:right;"> <span class="hasTip" title="<?php echo JText::sprintf('COM_LOCALISE_IN_PROGRESS', $this->changed); ?>">
  <?php $percentage = $this->nbphrases ? intval(100 * $this->changed / $this->nbphrases) : 0;?>
  <div style="text-align:center;"><?php echo $percentage; ?>%</div>
  <div style="text-align:left;border:solid silver 1px;width:100px;height:8px;">
    <div style="height:100%; width:<?php echo $percentage; ?>% ;background:green;"> </div>
  </div>
  </span> </div>
<?php endif; ?>
<div class="clr"></div>
