<?php
/**
 * @package    EasyCreator
 * @subpackage ProjectTypes
 * @author     Nikolai Plath
 * @author     Created on 26-May-2010
 * @license    GNU/GPL, see JROOT/LICENSE.php
 */

//-- No direct access
defined('_JEXEC') || die('=;)');

/**
 * Empty project for creating new projects.
 */
class EcrProjectTypeEmpty extends EcrProjectBase
{
    /**
     * Project type.
     *
     * @var string
     */
    public $type = '';

    /**
     * Project prefix.
     *
     * @var string
     */
    public $prefix = '';

    /**
     * Translate the type
     * @return string
     */
    public function translateType()
    {
        return '';
    }

    /**
     * Translate the plural type
     * @return string
     */
    public function translateTypePlural()
    {
        return '';
    }

    /**
     * Translate the plural type using a count
     *
     * @param int $n The amount
     *
     * @return string
     */
    public function translateTypeCount($n)
    {
        return '';
    }

    /**
     * Find all files and folders belonging to the project.
     *
     * @return array
     */
    public function findCopies()
    {
        return $this->copies;
    }//function

    /**
     * Get the extension base path.
     *
     * @return string
     */
    public function getExtensionPath()
    {
        return '';
    }//function

    /**
     * Gets the language scopes for the extension type.
     *
     * @return array Indexed array.
     */
    public function getLanguageScopes()
    {
        $scopes = array();
        $scopes[] =($this->scope) == 'admin' ? 'admin' : 'site';

        return $scopes;
    }//function

    /**
     * Gets the paths to language files.
     *
     * @param string $scope
     *
     * @return array
     */
    public function getLanguagePaths($scope = '')
    {
        return array('site' => JPATH_SITE);
    }//function

    /**
     * Get the name for language files.
     *
     * @param string $scope
     *
     * @return string
     */
    public function getLanguageFileName($scope = '')
    {
        return $this->prefix.$this->comName.'.ini';
    }//function

    /**
     * Gets the DTD for the extension type.
     *
     * @param string $jVersion Joomla! version
     *
     * @return mixed [array index array on success | false if not found]
     */
    public function getDTD($jVersion)
    {
        $dtd = false;

        //-- @Joomla!-version-check
        switch(ECR_JVERSION)
        {
            case '1.5':
                $dtd = array(
                'type' => 'install'
                , 'public' => '-//Joomla! 1.5//DTD module 1.0//EN'
                , 'uri' => 'http://joomla.org/xml/dtd/1.5/module-install.dtd');
                break;

            case '1.6':
            case '1.7':
            case '2.5':
                break;

            default:
                break;
        }//switch

        return $dtd;
    }//function

    /**
     * Get a file name for a EasyCreator setup XML file.
     *
     * @return string
     */
    public function getEcrXmlFileName()
    {
        return $this->getFileName().'.xml';
    }//function

    /**
     * Get a common file name.
     *
     * @return string
     */
    public function getFileName()
    {
        return $this->prefix.$this->comName;
    }//function

    /**
     * Get the path for the Joomla! XML manifest file.
     *
     * @return string
     */
    public function getJoomlaManifestPath()
    {
        return '';
    }//function

    /**
     * Get a Joomla! manifest XML file name.
     *
     * @return string The file name
     */
    public function getJoomlaManifestName()
    {
        return $this->prefix.$this->comName.'.xml';
    }//function

    /**
     * Get the project Id.
     *
     * @return int Id
     */
    public function getId()
    {
        $db = JFactory::getDBO();
        $clId =($this->scope == 'admin') ? 1 : 0;

        $query = new JDatabaseQuery;

        $query->from('#__extensions AS e');
        $query->select('e.extension_id');
        $query->where('e.type = '.$db->quote($this->type));
        $query->where('e.element = '.$db->quote($this->prefix.$this->comName));

        $db->setQuery((string)$query);

        return $db->loadResult();
    }//function

    /**
     * Discover all projects.
     *
     * @param string $scope The scope - admin or site.
     *
     * @return array
     */
    public function getAllProjects($scope)
    {
        JFactory::getApplication()->enqueueMessage(__METHOD__.' unfinished', 'warning');
    }//function

    /**
     * Get a list of known core projects.
     *
     * @param string $scope The scope - admin or site.
     *
     * @return array
     */
    public function getCoreProjects($scope)
    {
        JFactory::getApplication()->enqueueMessage(__METHOD__.' unfinished', 'warning');

        return array();
    }//function
}//class
