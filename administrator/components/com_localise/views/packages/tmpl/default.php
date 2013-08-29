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
JHtml::_('behavior.modal');
JHTML::_('stylesheet','com_localise/localise.css', null, true);

$listOrder = $this->escape($this->state->get('list.ordering'));
$listDirn = $this->escape($this->state->get('list.direction'));
$saveOrder = $listOrder == 'tag';
$sortFields = $this->getSortFields();
?>
<script type="text/javascript">
  Joomla.orderTable = function() {
    table = document.getElementById("sortTable");
    direction = document.getElementById("directionTable");
    order = table.options[table.selectedIndex].value;
    if (order != '<?php echo $listOrder; ?>') {
      dirn = 'asc';
    } else {
      dirn = direction.options[direction.selectedIndex].value;
    }
    Joomla.tableOrdering(order, dirn, '');
  }
</script>
<script type="text/javascript">
<!--
  Joomla.submitbutton = function submitbutton(task) {
    if (task== 'package.download') {
      var s=null;
      for (var i = 0, n = document.adminForm.elements.length; i < n; i++) {
        var e = document.adminForm.elements[i];
        if (e.type == 'checkbox' && e.name=='cid[]' && e.checked) {
          s = e.value;
          break;
        }
      }
      if (s!=null) {
        SqueezeBox.open('index.php?option=com_localise&task=package.download&cid[]='+s, {handler: 'iframe', size: {x: 600, y: 300}});
      }
    }
    else {
      submitform(task);
    }
  }
// -->
</script>

<form action="<?php echo JRoute::_('index.php?option=com_localise&view=packages');?>" method="post" name="adminForm" id="adminForm">
  <div class="row-fluid"> <?php echo $this->loadTemplate('filter'); ?>
    <table class="table table-striped" id="localiseList">
      <thead>
        <?php echo $this->loadTemplate('head'); ?>
      </thead>
      <tfoot>
        <?php echo $this->loadTemplate('foot'); ?>
      </tfoot>
      <tbody>
        <?php echo $this->loadTemplate('body'); ?>
      </tbody>
    </table>
    <div>
      <input type="hidden" name="boxchecked" value="0" />
      <input type="hidden" name="task" value="" />
      <input type="hidden" name="filter_order" value="" />
      <input type="hidden" name="filter_order_Dir" value="<?php echo $this->state->get('list.direction'); ?>" />
      <?php echo JHtml::_('form.token'); ?></div>
    <!-- End Content --> 
  </div>
</form>
