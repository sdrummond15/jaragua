<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_club
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * View class for a list of clubs.
 *
 * @package     Joomla.Administrator
 * @subpackage  com_club
 * @since       1.6
 */
class JobsViewJobs extends JViewLegacy
{
    protected $categories;

    protected $items;

    protected $pagination;

    protected $state;

    /**
     * Display the view
     *
     * @return  void
     */
    public function display($tpl = null)
    {
        $this->categories = $this->get('CategoryOrders');
        $this->items = $this->get('Items');
        $this->pagination = $this->get('Pagination');
        $this->state = $this->get('State');

        // Check for errors.
        if (count($errors = $this->get('Errors'))) {
            JError::raiseError(500, implode("\n", $errors));
            return false;
        }


        $this->addToolbar();

        JHtml::addIncludePath(JPATH_COMPONENT . '/helper/html');

        $this->sidebar = JHtmlSidebar::render();

        parent::display($tpl);
    }

    /**
     * Add the page title and toolbar.
     *
     * @since   1.6
     */
    protected function addToolbar()
    {

        JLoader::register('JobHelper', JPATH_ADMINISTRATOR . '/components/com_jobs/helpers/jobs.php');

        $canDo = JobsHelper::getActions($this->state->get('filter.category_id'));

        $user = JFactory::getUser();

        JToolbarHelper::title(JText::_('COM_JOBS_MANAGER_JOBS'), 'jobs.png');

        if (count($user->getAuthorisedCategories('com_jobs', 'core.create')) > 0) {
            JToolbarHelper::addNew('job.add');
        }

        if (($canDo->get('core.edit'))) {
            JToolbarHelper::editList('job.edit');
        }


        if ($this->state->get('filter.published') != 2) {
            JToolBarHelper::divider();
            JToolBarHelper::publish('jobs.publish', 'JTOOLBAR_PUBLISH', true);
            JToolBarHelper::unpublish('jobs.unpublish', 'JTOOLBAR_UNPUBLISH', true);
        }

        if ($this->state->get('filter.published') != -1) {
            JToolBarHelper::divider();
            if ($this->state->get('filter.published') != 2) {
                JToolBarHelper::archiveList('jobs.archive');
            } elseif ($this->state->get('filter.published') == 2) {
                JToolBarHelper::unarchiveList('jobs.publish');
            }
        }

        if ($canDo->get('core.edit.state')) {
            JToolbarHelper::checkin('jobs.checkin');
        }

        if ($this->state->get('filter.state') == -2 && $canDo->get('core.delete')) {
            JToolbarHelper::deleteList('', 'jobs.delete', 'JTOOLBAR_EMPTY_TRASH');

        } elseif ($canDo->get('core.edit.state')) {
            JToolbarHelper::trash('clubs.trash');
            JToolbarHelper::divider();
        }

        if ($canDo->get('core.admin')) {
            JToolbarHelper::preferences('com_clubs');
            JToolbarHelper::divider();
        }
        JToolbarHelper::help('clubs', $com = true);
    }


    /**
     * Returns an array of fields the table can be sorted by
     *
     * @return  array  Array containing the field name to sort by as the key and display text as value
     *
     * @since   3.0
     */
    protected function getSortFields()
    {
        return array(
            'a.ordering' => JText::_('JGRID_HEADING_ORDERING'),
            'a.published' => JText::_('JSTATUS'),
            'a.name' => JText::_('JGLOBAL_TITLE'),
            'category_title' => JText::_('JCATEGORY'),
            'ul.name' => JText::_('COM_CLUBS_FIELD_LINKED_USER_LABEL'),
            'a.featured' => JText::_('JFEATURED'),
            'a.access' => JText::_('JGRID_HEADING_ACCESS'),
            'a.language' => JText::_('JGRID_HEADING_LANGUAGE'),
            'a.id' => JText::_('JGRID_HEADING_ID')
        );
    }

}
