<?php
##*HEADER*##

jimport('joomla.plugin.plugin');

/**
 * Example System Plugin.
 *
 * @package    ECR_COM_NAME
 * @subpackage	Plugin
 */
class plgSystemECR_COM_NAME extends JPlugin
{
    /**
     * Constructor
     *
     * For php4 compatability we must not use the __constructor as a constructor for plugins
     * because func_get_args ( void ) returns a copy of all passed arguments NOT references.
     * This causes problems with cross-referencing necessary for the observer design pattern.
     *
     * @access      protected
     * @param       object  $subject The object to observe
     * @param       array   $config  An array that holds the plugin configuration
     */
    function plgSystemECR_COM_NAME(&$subject, $config)
    {
        parent::__construct($subject, $config);

        // Do some extra initialisation in this constructor if required
    }//function

    /**
     * Do something onAfterInitialise
     */
    function onAfterInitialise()
    {
    }//function

    /**
     * Do something onAfterRoute
     */
    function onAfterRoute()
    {
    }//function

    /**
     * Do something onAfterDispatch
     */
    function onAfterDispatch()
    {
    }//function

    /**
     * Do something onAfterRender
     */
    function onAfterRender()
    {
    }//function
}//class
