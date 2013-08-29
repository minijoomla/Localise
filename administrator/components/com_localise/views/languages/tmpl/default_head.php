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
?>

<tr>
  <th width="20" class="center hidden-phone"></th>
  <th class="title"><?php echo JHtml::_('grid.sort', 'COM_LOCALISE_HEADING_LANGUAGES_NAME', 'tag', $listDirn, $listOrder); ?></th>
  <th class="center"><?php echo JHtml::_('grid.sort', 'COM_LOCALISE_HEADING_LANGUAGES_CLIENT', 'client', $listDirn, $listOrder); ?></th>
  <th class="center"><?php echo JText::_('COM_LOCALISE_HEADING_LANGUAGES_DEFAULT'); ?></th>
  <th class="center"><?php echo JText::_('COM_LOCALISE_HEADING_LANGUAGES_FILES'); ?></th>
  <th class="center hidden-phone"><?php echo JText::_('COM_LOCALISE_HEADING_LANGUAGES_VERSION'); ?></th>
  <th class="center hidden-phone"><?php echo JText::_('COM_LOCALISE_HEADING_LANGUAGES_DATE'); ?></th>
  <th class="hidden-phone"><?php echo JText::_('COM_LOCALISE_HEADING_LANGUAGES_AUTHOR'); ?></th>
</tr>
