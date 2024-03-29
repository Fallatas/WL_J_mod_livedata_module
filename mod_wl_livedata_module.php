<?php
/**
 * @package     mod_livedata_module
 * @author      Thomas Winterling
 * @email       info@winterling-labs.com
 * @copyright   Copyright (C) 2005 - 2013, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Include the syndicate functions only once
require_once __DIR__ . '/helper.php';   // Helper

JHTML::_('script', 'mod_wl_livedata_module/scripts.js', array('version' => 'auto', 'relative' => true));



    $data = ModWL_Livedata_Module_Helper::getLivedataParams ($params);

    $datasets = ModWL_Livedata_Module_Helper::CreateNewDataSets ($params);
    $allusers = ModWL_Livedata_Module_Helper::getUsers();
    $articles = ModWL_Livedata_Module_Helper::getArticles();
    $style = ModWL_Livedata_Module_Helper::getStyleParams();
    $count = ModWL_Livedata_Module_Helper::getOnlineCount();
    /* Single Data */
    $testi = ModWL_Livedata_Module_Helper::test ($data);
    $chartJs =  ModWL_Livedata_Module_Helper::chartJs($count,$data,$datasets,$testi);

    if($data->userdisplay === true){
        // Get a handle to the Joomla! application object
        $application = JFactory::getApplication();

// Add a message to the message queue
        $application->enqueueMessage(JText::_('SOME_ERROR_OCCURRED'), 'error');

        /** Alternatively you may use chaining */
        JFactory::getApplication()->enqueueMessage(JText::_('SOME_ERROR_OCCURRED'), 'error');
    }

	// Check for a custom CSS file
    JHtml::_('stylesheet', 'mod_wl_livedata_module/user.css', array('version' => 'auto', 'relative' => true));
    

   require JModuleHelper::getLayoutPath('mod_wl_livedata_module', $params->get('layout', 'default'));