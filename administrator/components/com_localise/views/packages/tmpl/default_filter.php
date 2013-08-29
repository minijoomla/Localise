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

$listOrder = $this->escape($this->state->get('list.ordering'));
$listDirn = $this->escape($this->state->get('list.direction'));
$params = (isset($this->state->params)) ? $this->state->params : new JObject;
$saveOrder = $listOrder == 'title';
$sortFields = $this->getSortFields();
?>

<!-- Begin Sidebar -->

<div id="sidebar" class="span2">
  <div class="sidebar-nav">
    <?php
      // Display the submenu position modules
      $this->submenumodules = JModuleHelper::getModules('submenu');
      foreach ($this->submenumodules as $submenumodule) {
        $output = JModuleHelper::renderModule($submenumodule);
        $params->loadString($submenumodule->params);
        echo $output;
      }
    ?>
  </div>
</div>
<!-- End Sidebar --> 
<!-- Begin Content -->
<div class="span10">
<div id="filter-bar" class="btn-toolbar">
  <?php foreach($this->form->getFieldset('search') as $field): ?>
  <?php echo $field->input; ?>
  <?php endforeach; ?>
  <div class="btn-group pull-right hidden-phone">
    <label for="limit" class="element-invisible"><?php echo JText::_('JFIELD_PLG_SEARCH_SEARCHLIMIT_DESC');?></label>
    <?php echo $this->pagination->getLimitBox(); ?> </div>
  <div class="btn-group pull-right hidden-phone">
    <label for="directionTable" class="element-invisible"><?php echo JText::_('JFIELD_ORDERING_DESC');?></label>
    <select name="directionTable" id="directionTable" class="input-small" onchange="Joomla.orderTable()">
      <option value=""><?php echo JText::_('JFIELD_ORDERING_DESC');?></option>
      <option value="asc" <?php if ($listDirn == 'asc') echo 'selected="selected"'; ?>><?php echo JText::_('JGLOBAL_ORDER_ASCENDING');?></option>
      <option value="desc" <?php if ($listDirn == 'desc') echo 'selected="selected"'; ?>><?php echo JText::_('JGLOBAL_ORDER_DESCENDING');?></option>
    </select>
  </div>
  <div class="btn-group pull-right">
    <label for="sortTable" class="element-invisible"><?php echo JText::_('JGLOBAL_SORT_BY');?></label>
    <select name="sortTable" id="sortTable" class="input-medium" onchange="Joomla.orderTable()">
      <option value=""><?php echo JText::_('JGLOBAL_SORT_BY');?></option>
      <?php echo JHtml::_('select.options', $sortFields, 'value', 'text', $listOrder);?>
    </select>
  </div>
</div>
<div class="clearfix"> </div>
