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

<div class="accordion" id="accordionLegend">
  <div class="accordion-group">
    <div class="accordion-heading"> <a class="accordion-toggle" data-toggle="collapse" data-parent="accordionLegend" href="#legend"> <?php echo JText::_('COM_LOCALISE_SLIDER_TRANSLATIONS_LEGEND');?> </a> </div>
    <div id="legend" class="accordion-body collapse">
      <div class="accordion-inner">
        <table width="100%" class="adminlist">
          <thead>
            <tr>
              <th width="50"><?php echo JText::_('COM_LOCALISE_HEADING_TRANSLATIONS_LEGEND_ICON'); ?></th>
              <th><?php echo JText::_('COM_LOCALISE_HEADING_TRANSLATIONS_LEGEND_DESC'); ?></th>
              <th width="100"><?php echo JText::_('COM_LOCALISE_HEADING_TRANSLATIONS_LEGEND_USAGE'); ?></th>
            </tr>
          </thead>
          <tfoot>
          </tfoot>
          <tbody>
            <?php $i=1;?>
            <tr class="row<?php echo $i=1-$i;?>">
              <td align="center"><?php echo JHtml::_('jgrid.action', $i, '', array('tip'=>true, 'inactive_title'=>JText::_('COM_LOCALISE_OPTION_TRANSLATIONS_STORAGE_GLOBAL'),   'inactive_class'=>'16-global', 'enabled' => false, 'translate'=>false));?></td>
              <td><?php echo JText::_('COM_LOCALISE_OPTION_TRANSLATIONS_STORAGE_GLOBAL_DESC');?></td>
              <td><?php echo JText::_('COM_LOCALISE_TEXT_TRANSLATIONS_STORAGE');?></td>
            </tr>
            <tr class="row<?php echo $i=1-$i;?>">
              <td align="center"><?php echo JHtml::_('jgrid.action', $i, '', array('tip'=>true, 'inactive_title'=>JText::_('COM_LOCALISE_OPTION_TRANSLATIONS_STORAGE_LOCAL'),   'inactive_class'=>'16-local', 'enabled' => false, 'translate'=>false));?></td>
              <td><?php echo JText::_('COM_LOCALISE_OPTION_TRANSLATIONS_STORAGE_LOCAL_DESC');?></td>
              <td><?php echo JText::_('COM_LOCALISE_TEXT_TRANSLATIONS_STORAGE');?></td>
            </tr>
            <?php foreach ($this->packages as $package):?>
            <tr class="row<?php echo $i=1-$i;?>">
              <td align="center"><span class="jgrid hasTip" title="<?php echo JText::_($package->title);?>"> <span class="state" style="background-image:url(<?php echo JURI::root(true).$package->icon;?>);"> <span class="text"/> </span> </span>
              <td><?php echo JText::_($package->description);?></td>
              <td><?php echo JText::_('COM_LOCALISE_TEXT_TRANSLATIONS_ORIGIN');?></td>
            </tr>
            <?php endforeach;?>
            <tr class="row<?php echo $i=1-$i;?>">
              <td align="center"><?php echo JHtml::_('jgrid.action', $i, '', array('tip'=>true, 'inactive_title'=>JText::_('COM_LOCALISE_OPTION_TRANSLATIONS_ORIGIN_THIRDPARTY'),   'inactive_class'=>'16-thirdparty', 'enabled' => false, 'translate'=>false));?></td>
              <td><?php echo JText::_('COM_LOCALISE_OPTION_TRANSLATIONS_ORIGIN_THIRDPARTY_DESC');?></td>
              <td><?php echo JText::_('COM_LOCALISE_TEXT_TRANSLATIONS_ORIGIN');?></td>
            </tr>
            <tr class="row<?php echo $i=1-$i;?>">
              <td align="center"><?php echo JHtml::_('jgrid.action', $i, '', array('tip'=>true, 'inactive_title'=>JText::_('COM_LOCALISE_OPTION_TRANSLATIONS_ORIGIN_OVERRIDE'),   'inactive_class'=>'16-override', 'enabled' => false, 'translate'=>false));?></td>
              <td><?php echo JText::_('COM_LOCALISE_OPTION_TRANSLATIONS_ORIGIN_OVERRIDE_DESC');?></td>
              <td><?php echo JText::_('COM_LOCALISE_TEXT_TRANSLATIONS_ORIGIN_TYPE');?></td>
            </tr>
            <tr class="row<?php echo $i=1-$i;?>">
              <td align="center"><?php echo JHtml::_('jgrid.action', $i, '', array('tip'=>true, 'inactive_title'=>JText::_('COM_LOCALISE_OPTION_TRANSLATIONS_STATE_ERROR'),   'inactive_class'=>'16-error', 'enabled' => false, 'translate'=>false));?></td>
              <td><?php echo JText::_('COM_LOCALISE_OPTION_TRANSLATIONS_STATE_ERROR_DESC');?></td>
              <td><?php echo JText::_('COM_LOCALISE_TEXT_TRANSLATIONS_STATE');?></td>
            </tr>
            <tr class="row<?php echo $i=1-$i;?>">
              <td align="center"><?php echo JHtml::_('jgrid.action', $i, '', array('tip'=>true, 'inactive_title'=>JText::_('COM_LOCALISE_OPTION_TRANSLATIONS_STATE_INLANGUAGE'),   'inactive_class'=>'16-inlanguage', 'enabled' => false, 'translate'=>false));?></td>
              <td><?php echo JText::_('COM_LOCALISE_OPTION_TRANSLATIONS_STATE_INLANGUAGE_DESC');?></td>
              <td><?php echo JText::_('COM_LOCALISE_TEXT_TRANSLATIONS_STATE');?></td>
            </tr>
            <tr class="row<?php echo $i=1-$i;?>">
              <td align="center"><?php echo JHtml::_('jgrid.action', $i, '', array('tip'=>true, 'inactive_title'=>JText::_('COM_LOCALISE_OPTION_TRANSLATIONS_STATE_NOTINREFERENCE'),   'inactive_class'=>'16-notinreference', 'enabled' => false, 'translate'=>false));?></td>
              <td><?php echo JText::_('COM_LOCALISE_OPTION_TRANSLATIONS_STATE_NOTINREFERENCE_DESC');?></td>
              <td><?php echo JText::_('COM_LOCALISE_TEXT_TRANSLATIONS_STATE');?></td>
            </tr>
            <tr class="row<?php echo $i=1-$i;?>">
              <td align="center"><?php echo JHtml::_('jgrid.action', $i, '', array('tip'=>true, 'inactive_title'=>JText::_('COM_LOCALISE_OPTION_TRANSLATIONS_STATE_UNEXISTING'),   'inactive_class'=>'16-unexisting', 'enabled' => false, 'translate'=>false));?></td>
              <td><?php echo JText::_('COM_LOCALISE_OPTION_TRANSLATIONS_STATE_UNEXISTING_DESC');?></td>
              <td><?php echo JText::_('COM_LOCALISE_TEXT_TRANSLATIONS_STATE');?></td>
            </tr>
            <tr class="row<?php echo $i=1-$i;?>">
              <td align="center"><?php echo JHtml::_('jgrid.action', $i, '', array('tip'=>true, 'inactive_title'=>JText::_('COM_LOCALISE_OPTION_TRANSLATIONS_TYPE_COMPONENT'),   'inactive_class'=>'16-component', 'enabled' => false, 'translate'=>false));?></td>
              <td><?php echo JText::_('COM_LOCALISE_OPTION_TRANSLATIONS_TYPE_COMPONENT_DESC');?></td>
              <td><?php echo JText::_('COM_LOCALISE_TEXT_TRANSLATIONS_TYPE');?></td>
            </tr>
            <tr class="row<?php echo $i=1-$i;?>">
              <td align="center"><?php echo JHtml::_('jgrid.action', $i, '', array('tip'=>true, 'inactive_title'=>JText::_('COM_LOCALISE_OPTION_TRANSLATIONS_TYPE_MODULE'),   'inactive_class'=>'16-module', 'enabled' => false, 'translate'=>false));?></td>
              <td><?php echo JText::_('COM_LOCALISE_OPTION_TRANSLATIONS_TYPE_MODULE_DESC');?></td>
              <td><?php echo JText::_('COM_LOCALISE_TEXT_TRANSLATIONS_TYPE');?></td>
            </tr>
            <tr class="row<?php echo $i=1-$i;?>">
              <td align="center"><?php echo JHtml::_('jgrid.action', $i, '', array('tip'=>true, 'inactive_title'=>JText::_('COM_LOCALISE_OPTION_TRANSLATIONS_TYPE_PLUGIN'),   'inactive_class'=>'16-plugin', 'enabled' => false, 'translate'=>false));?></td>
              <td><?php echo JText::_('COM_LOCALISE_OPTION_TRANSLATIONS_TYPE_PLUGIN_DESC');?></td>
              <td><?php echo JText::_('COM_LOCALISE_TEXT_TRANSLATIONS_TYPE');?></td>
            </tr>
            <tr class="row<?php echo $i=1-$i;?>">
              <td align="center"><?php echo JHtml::_('jgrid.action', $i, '', array('tip'=>true, 'inactive_title'=>JText::_('COM_LOCALISE_OPTION_TRANSLATIONS_TYPE_TEMPLATE'),   'inactive_class'=>'16-template', 'enabled' => false, 'translate'=>false));?></td>
              <td><?php echo JText::_('COM_LOCALISE_OPTION_TRANSLATIONS_TYPE_TEMPLATE_DESC');?></td>
              <td><?php echo JText::_('COM_LOCALISE_TEXT_TRANSLATIONS_TYPE');?></td>
            </tr>
            <tr class="row<?php echo $i=1-$i;?>">
              <td align="center"><?php echo JHtml::_('jgrid.action', $i, '', array('tip'=>true, 'inactive_title'=>JText::_('COM_LOCALISE_OPTION_TRANSLATIONS_TYPE_PACKAGE'),   'inactive_class'=>'16-package', 'enabled' => false, 'translate'=>false));?></td>
              <td><?php echo JText::_('COM_LOCALISE_OPTION_TRANSLATIONS_TYPE_PACKAGE_DESC');?></td>
              <td><?php echo JText::_('COM_LOCALISE_TEXT_TRANSLATIONS_TYPE');?></td>
            </tr>
            <tr class="row<?php echo $i=1-$i;?>">
              <td align="center"><?php echo JHtml::_('jgrid.action', $i, '', array('tip'=>true, 'inactive_title'=>JText::_('COM_LOCALISE_OPTION_TRANSLATIONS_TYPE_LIBRARY'),   'inactive_class'=>'16-library', 'enabled' => false, 'translate'=>false));?></td>
              <td><?php echo JText::_('COM_LOCALISE_OPTION_TRANSLATIONS_TYPE_LIBRARY_DESC');?></td>
              <td><?php echo JText::_('COM_LOCALISE_TEXT_TRANSLATIONS_TYPE');?></td>
            </tr>
            <tr class="row<?php echo $i=1-$i;?>">
              <td align="center"><?php echo JHtml::_('jgrid.action', $i, '', array('tip'=>true, 'inactive_title'=>JText::_('COM_LOCALISE_OPTION_TRANSLATIONS_TYPE_FILE'),   'inactive_class'=>'16-file', 'enabled' => false, 'translate'=>false));?></td>
              <td><?php echo JText::_('COM_LOCALISE_OPTION_TRANSLATIONS_TYPE_FILE_DESC');?></td>
              <td><?php echo JText::_('COM_LOCALISE_TEXT_TRANSLATIONS_TYPE');?></td>
            </tr>
            <tr class="row<?php echo $i=1-$i;?>">
              <td align="center"><?php echo JHtml::_('jgrid.action', $i, '', array('tip'=>true, 'inactive_title'=>JText::_('COM_LOCALISE_OPTION_TRANSLATIONS_TYPE_JOOMLA'),   'inactive_class'=>'16-joomla', 'enabled' => false, 'translate'=>false));?></td>
              <td><?php echo JText::_('COM_LOCALISE_OPTION_TRANSLATIONS_TYPE_JOOMLA_DESC');?></td>
              <td><?php echo JText::_('COM_LOCALISE_TEXT_TRANSLATIONS_TYPE');?></td>
            </tr>
            <tr class="row<?php echo $i=1-$i;?>">
              <td align="center"><?php echo JHtml::_('jgrid.action', $i, '', array('tip'=>true, 'inactive_title'=>JText::_('COM_LOCALISE_OPTION_CLIENT_SITE'),   'inactive_class'=>'16-site', 'enabled' => false, 'translate'=>false));?></td>
              <td><?php echo JText::_('COM_LOCALISE_OPTION_CLIENT_SITE_DESC');?></td>
              <td><?php echo JText::_('COM_LOCALISE_TEXT_CLIENT');?></td>
            </tr>
            <tr class="row<?php echo $i=1-$i;?>">
              <td align="center"><?php echo JHtml::_('jgrid.action', $i, '', array('tip'=>true, 'inactive_title'=>JText::_('COM_LOCALISE_OPTION_CLIENT_ADMINISTRATOR'),   'inactive_class'=>'16-administrator', 'enabled' => false, 'translate'=>false));?></td>
              <td><?php echo JText::_('COM_LOCALISE_OPTION_CLIENT_ADMINISTRATOR_DESC');?></td>
              <td><?php echo JText::_('COM_LOCALISE_TEXT_CLIENT');?></td>
            </tr>
            <tr class="row<?php echo $i=1-$i;?>">
              <td align="center"><?php echo JHtml::_('jgrid.action', $i, '', array('tip'=>true, 'inactive_title'=>JText::_('COM_LOCALISE_OPTION_CLIENT_INSTALLATION'),   'inactive_class'=>'16-installation', 'enabled' => false, 'translate'=>false));?></td>
              <td><?php echo JText::_('COM_LOCALISE_OPTION_CLIENT_INSTALLATION_DESC');?></td>
              <td><?php echo JText::_('COM_LOCALISE_TEXT_CLIENT');?></td>
            </tr>
            <tr class="row<?php echo $i=1-$i;?>">
              <td align="center"><?php echo JHtml::_('jgrid.action', $i, '', array('tip'=>true, 'inactive_title'=>JText::_('COM_LOCALISE_OPTION_TRANSLATIONS_REFERENCE'),   'inactive_class'=>'16-reference', 'enabled' => false, 'translate'=>false));?></td>
              <td><?php echo JText::_('COM_LOCALISE_OPTION_TRANSLATIONS_REFERENCE_DESC');?></td>
              <td><?php echo JText::_('COM_LOCALISE_TEXT_TRANSLATIONS_LANGUAGE');?></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
