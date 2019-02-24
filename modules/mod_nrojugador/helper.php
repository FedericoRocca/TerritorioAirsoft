<?php
/**
 * Helper class for Hello World! module
 * 
 * @package    Joomla.Tutorials
 * @subpackage Modules
 * @link http://docs.joomla.org/J3.x:Creating_a_simple_module/Developing_a_Basic_Module
 * @license        GNU/GPL, see LICENSE.php
 * mod_helloworld is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 */
class nroJugador
{
    /**
     * Retrieves the hello message
     *
     * @param   array  $params An object containing the module parameters
     *
     * @access public
     */    
    public static function getplayerNumberByUserID($params)
    {
        $db = JFactory::getDbo();
        // $query = $db->getQuery(true);
        // $query->select($db->quoteName(array('user_id', 'profile_key', 'profile_value', 'ordering')));
        // $query->from($db->quoteName('#__user_profiles'));
        // $query->where($db->quoteName('profile_key') . ' LIKE '. $db->quote('\'custom.%\''));
        // $query->order('ordering ASC');
        //$sql = "SELECT * FROM `jos_comprofiler`";
        
        $database =& JFactory::getDBO();
        
        $user = JFactory::getUser();

        $query = "SELECT cb_nrodejugador FROM `jos_comprofiler` where user_id = " .$user->id. ";";
        $database->setQuery($query);
        //$result = $database->query();
        $result = $database->loadResult();
        
        return $result;
    }
}