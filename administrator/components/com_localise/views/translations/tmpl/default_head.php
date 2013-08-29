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
  <th width="20" class="center hidden-phone">#</th>
  <th width="100" class="center hidden-phone"><?php echo JText::_('COM_LOCALISE_HEADING_TRANSLATIONS_INFORMATION'); ?></th>
  <th width="50" class="center"><?php echo JHtml::_('grid.sort', 'COM_LOCALISE_HEADING_TRANSLATIONS_TAG', 'tag', $listDirn, $listOrder); ?></th>
  <th width="250" class="title"><?php echo JHtml::_('grid.sort', 'COM_LOCALISE_HEADING_TRANSLATIONS_NAME', 'filename', $listDirn, $listOrder); ?></th>
  <th><?php echo JHtml::_('grid.sort', 'COM_LOCALISE_HEADING_TRANSLATIONS_PATH', 'path', $listDirn, $listOrder); ?></th>
  <th width="120" class="center"><?php echo JHtml::_('grid.sort', 'COM_LOCALISE_HEADING_TRANSLATIONS_TRANSLATED', 'completed', $listDirn, $listOrder); ?></th>
  <th width="120" class="center"><?php echo JHtml::_('grid.sort', 'COM_LOCALISE_HEADING_TRANSLATIONS_PHRASES', 'translated', $listDirn, $listOrder); ?></th>
  <th width="100" class="hidden-phone"><?php echo JText::_('COM_LOCALISE_HEADING_TRANSLATIONS_AUTHOR'); ?></th>
</tr>
