<?php
/**
 * @version     1.0.0
 * @package     com_jpframework
 * @copyright   Copyright (C) 2015. Todos los derechos reservados.
 * @license     Licencia Pública General GNU versión 2 o posterior. Consulte LICENSE.txt
 * @author      aficat <kim@aficat.com> - http://www.afi.cat
 */

// No direct access.
defined('_JEXEC') or die;

jimport('joomla.application.component.modeladmin');

/**
 * Jpframework model.
 */
class JpframeworkModelBlock extends JModelAdmin
{
	/**
	 * @var		string	The prefix to use with controller messages.
	 * @since	1.6
	 */
	protected $text_prefix = 'COM_JPFRAMEWORK';


	/**
	 * Returns a reference to the a Table object, always creating it.
	 *
	 * @param	type	The table type to instantiate
	 * @param	string	A prefix for the table class name. Optional.
	 * @param	array	Configuration array for model. Optional.
	 * @return	JTable	A database object
	 * @since	1.6
	 */
	public function getTable($type = 'Blocks', $prefix = 'JpframeworkTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}

	/**
	 * Method to get the record form.
	 *
	 * @param	array	$data		An optional array of data for the form to interogate.
	 * @param	boolean	$loadData	True if the form is to load its own data (default case), false if not.
	 * @return	JForm	A JForm object on success, false on failure
	 * @since	1.6
	 */
	public function getForm($data = array(), $loadData = true)
	{
		// Initialise variables.
		$app	= JFactory::getApplication();

		// Get the form.
		$form = $this->loadForm('com_jpframework.block', 'block', array('control' => 'jform', 'load_data' => $loadData));

		if (empty($form)) {
			return false;
		}

		return $form;
	}

	function isMedia($block) {
		$form = new JForm('block');
		$form->loadFile(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_jpframework'.DS.'blocks'.DS.$block.DS.'block.xml');
		$fields = $form->getFieldset('block');
		foreach ($fields as $field)
		{
			if($field->type == 'Media') { return true; }
		}

		return false;
	}

	function renderFieldSet ($block, $name) {
			$id = JRequest::getInt('id', 0, 'get');
			if($id != 0) {
				$db = JFactory::getDbo();
				$db->setQuery('select params from #__jpframework_blocks where id = '.$id);
				$registry = new JRegistry;
				$registry->loadString($db->loadResult());
				$params = $registry->toArray();
			}
			// create new JForm object
			$form = new JForm('block');
			//overiide if exists
			$path1 = JPATH_ROOT.DS.'templates'.DS.'jpframework'.DS.'html'.DS.'blocks'.DS.$block.DS.'block.xml';
			$path2 = JPATH_ADMINISTRATOR.DS.'components'.DS.'com_jpframework'.DS.'blocks'.DS.$block.DS.'block.xml';
			if (is_file($path1)) {
				$form->loadFile($path1);
			} else {
				$form->loadFile($path2);
			}
			$fields = $form->getFieldset($name);
			$html = array();
			foreach ($fields as $field)
			{
				$html[] = $form->renderField($field->name, '', $params[$field->name]);
				//$html[] = '<script>jQuery("#'.$field->name.'").val("'.$params[$field->name].'");</script>';
			}

			return implode('', $html);
	}

	/**
	 * Method to get the data that should be injected in the form.
	 *
	 * @return	mixed	The data for the form.
	 * @since	1.6
	 */
	protected function loadFormData()
	{
		// Check the session for previously entered form data.
		$data = JFactory::getApplication()->getUserState('com_jpframework.edit.block.data', array());

		if (empty($data)) {
			$data = $this->getItem();
			$data->menuitem = explode(';',$data->menuitem);
		}

		return $data;
	}

	/**
	 * Method to get a single record.
	 *
	 * @param	integer	The id of the primary key.
	 *
	 * @return	mixed	Object on success, false on failure.
	 * @since	1.6
	 */
	public function getItem($pk = null)
	{
		if ($item = parent::getItem($pk)) {

			//Do any procesing on fields here if needed

		}

		return $item;
	}

	/**
	 * Prepare and sanitise the table prior to saving.
	 *
	 * @since	1.6
	 */
	protected function prepareTable($table)
	{
		jimport('joomla.filter.output');

		if (empty($table->id)) {

			// Set ordering to the last item if not set
			if (@$table->ordering === '') {
				$db = JFactory::getDbo();
				$db->setQuery('SELECT MAX(ordering) FROM #__jpframework_blocks');
				$max = $db->loadResult();
				$table->ordering = $max+1;
			}

		}
	}

	/**
	 * method to store data into the database
	 * @param boolean
	*/
    function store()
	{
		$row =& $this->getTable();

		$post_data  = JRequest::get( 'post' );
   		$data       = $post_data["jform"];
		$data['id'] = JRequest::getInt('id', 0, 'get');

		if($data['id'] != 0) {
			$form = new JForm('block');
			$form->loadFile(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_jpframework'.DS.'blocks'.DS.$data['type'].DS.'block.xml');

			//block fieldset
			$fields = $form->getFieldset('block');
			$values = array();
			foreach($fields as $field) {
				$values[$field->name] = $_POST[$field->name];
			}

			//styles fieldset
			$fields = $form->getFieldset('styles');
			foreach($fields as $field) {
				$values[$field->name] = $_POST[$field->name];
			}

			$registry = new JRegistry;
	    	$registry->loadArray($values);
	    	$row->params = (string) $registry;

	    	$menuitems = array();
	    	foreach($data['menuitem'] as $k) {
	    		$menuitems[] = $k;
	    	}

	    	$data['menuitem'] = implode(';', $menuitems);
	    	$row->title    = $_POST['title'];
	    	$row->uniqid   = $_POST['uniqid'];

			if (!$row->bind( $data )) {
				return JError::raiseWarning( 500, $row->getError() );
			}

			if (!$row->store()) {
				return JError::raiseError(500, $row->getError() );
			}
		}
		return true;

	}

	/**
	 * Method to duplicate block.
	 *
	 * @param   array  &$pks  An array of primary key IDs.
	 *
	 * @return  boolean  True if successful.
	 *
	 * @since   1.6
	 * @throws  Exception
	 */
	public function duplicate(&$pks)
	{
		$db = $this->getDbo();
		foreach($pks as $id) {
			$db->setQuery('select * from #__jpframework_blocks where id = '.$id);
			$row 								= $db->loadObject();
			$item 							= new stdClass();
			$item->title 				= $row->title;
			$item->uniqid 			= $row->uniqid;
			$item->ordering 		= $row->ordering;
			$item->state 				= 0;
			$item->checked_out 	= $row->checked_out;
			$item->checked_out_time = $row->checked_out_time;
			$item->created_by 	= $row->created_by;
			$item->type 				= $row->type;
			$item->position 		= $row->position;
			$item->language 		= $row->language;
			$item->menuitem 		= $row->menuitem;
			$item->params 			= $row->params;
			$response 					= $db->insertObject('#__jpframework_blocks', $item, 'id');
		}
		return $response;
	}

}
