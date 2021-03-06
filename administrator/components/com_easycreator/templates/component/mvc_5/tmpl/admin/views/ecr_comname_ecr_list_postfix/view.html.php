<?php
##*HEADER*##

jimport('joomla.application.component.view');

/**
 * HTML View class for the ECR_COM_NAME Component.
 *
 * @package    ECR_COM_NAME
 * @subpackage Views
 */
class ECR_COM_NAMEECR_LIST_POSTFIXViewECR_COM_NAMEECR_LIST_POSTFIX extends JView
{
    /**
     * ECR_COM_NAMEECR_LIST_POSTFIX view display method.
     *
     * @param string $tpl The name of the template file to parse;
     *
     * @return void
     */
    public function display($tpl = null)
    {
        JToolBarHelper::title(JText::_('ECR_COM_NAME Manager'), 'generic.png');
        JToolBarHelper::deleteList();
        JToolBarHelper::editListX();
        JToolBarHelper::addNewX();

        //-- Get data from the model
        $items =& $this->get('Data');
        $pagination =& $this->get('Pagination');

        //-- Push data into the template
        $this->assignRef('items', $items);
        $this->assignRef('pagination', $pagination);

        parent::display($tpl);
    }//function
}//class
