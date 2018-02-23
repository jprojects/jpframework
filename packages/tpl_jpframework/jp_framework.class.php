<?php

/**
 * @version		jp_framework.php $ kim 2014-12-05 15:57
 * @package		JPFramework
 * @copyright   Copyright © 2014 - All rights reserved.
 * @license		GNU/GPL
 * @author		kim
 * @author mail kim@aficat.com
 * @website		http://www.afi.cat
 *
*/

require(JPATH_ADMINISTRATOR.'/components/com_jpframework/helpers/blocks.php');

if(!defined('DS')) { define('DS', DIRECTORY_SEPARATOR); }
if(!defined('JPF_BLOCKS_PATH')) { define('JPF_BLOCKS_PATH', JPATH_ADMINISTRATOR.'/components/com_jpframework/blocks'); }

class jpf  extends blocksHelper
{       
    /**
     * Method to load a JP Framework layout
     * @access public
     * @return boolean, return a JP Framework layout output
    */
    public static function getLayout($name, $folder = "")
    {
        $html = "";
        if($folder != "") { 
            $path = dirname(__FILE__).DS.'layouts'.DS.$folder.DS.$name.'.php'; 
        } else {
            $path = dirname(__FILE__).DS.'layouts'.DS.$name.'.php';
        }
        if (is_file($path)) {  
            ob_start();
    		include $path;
			$html = ob_get_clean();		
       	} 
        
        return $html;
    }   
    
    
   /**
     * css styles
     * @return  void
     * @since   3.0
    */
    public static function setHead()
    {
    	$params = JComponentHelper::getParams( 'com_jpframework' );
    	
    	$body_font 	= $params->get('body_font');
    	$unload 	= $params->get('unload');

		//add stylesheets
    	JFactory::getDocument()->addStylesheet('templates/jpframework/css/jpframework.css');
    	//ToDo::permitir multiples fuentes a cargar
    	JFactory::getDocument()->addStylesheet('//fonts.googleapis.com/css?family='.str_replace(' ', '+', $body_font).':300italic,400italic,700italic,400,300,700');
    	
    	//add scripts...
    	JFactory::getDocument()->addScript('https://use.fontawesome.com/releases/v5.0.6/js/all.js');
    	
    	//unload scripts from configuration..
    	if($unload != '') {
			$scripts = implode(',', $params->get('unload'));    	
			$scripts[] = 'media/jui/js/bootstrap.min.js';
			
			foreach($scripts as $script) {
				unset(JFactory::getDocument()->_scripts[JURI::root().$script]);
			}
    	}
    }

    /**
     * Method to know if we are in the frontpage or not
     * @access public
     * @return boolean, true if is in frontpage or false if not
    */
    public static function isFrontpage()
    {
        $app = JFactory::getApplication();
        $menu = $app->getMenu();
	    $lang = JFactory::getLanguage();
	    if ($menu->getActive() == $menu->getDefault($lang->getTag())) {
            return true;
        }
        return false;
    }    

    /**
     * Get the site name
     * @access public
     * @return the website title
    */
    public static function getSiteName()
    {
        $app = JFactory::getApplication();       
        return $app->getCfg('sitename', 'JP Framework by Afi informàtica');
    }
    
    /**
     * Method to know if component is show in a page or not
     * @access public
     * @return boolean, true if is in frontpage or false if not
    */
    public static function showComponent()
    {
    	$params = JComponentHelper::getParams( 'com_jpframework' );
    	
    	if($params->get('front_component') == 1 && jpf::isFrontpage()) { return true; }
    	
    	$ids 	= $params->get('itemids');
    	
        $app    = JFactory::getApplication();
        $lang   = JFactory::getLanguage();
        
        $menu   = $app->getMenu();	 
	    $active = $menu->getActive();
	    $itemId = $active->id;
	    
	    if (!in_array($itemId, $ids)) {
            return true;
        }
        return false;
    }
    
    /**
	 * Method to get the page suffix
     * @access public
     * @return the page suffix
    */
    public static function getPageSuffix()
    {
        $menus = JSite::getMenu();
        $menu = $menus->getActive();
        $PageClassSfx = '';
        if (is_object( $menu )) :
            $params = new JParameter( $menu->params );
            $PageClassSfx = $params->get( 'pageclass_sfx' );
        endif;      
        return $PageClassSfx;
    }
    
    /**
	 * Method to get the privacy or terms article by language
     * @access public
     * @param string $type privacy or terms
     * @return the article url
    */
    public static function getArticleByLanguage($type)
    {
		$lang = JFactory::getLanguage()->getTag();
		$articles = json_decode(jpf::getparameter($type));
		foreach ($articles as $art) 
      	{
			foreach ($art as $k => $v) 
			{
				$result[$k][] = $v;
			}
      	}
      	
	  	foreach ($result as $index=>$value) 
		{   
			if($value[0] == $lang) { return $value[1]; }
		}
    }
    
    /**
     * Method to get a block from component
     * @access public
     * @param $position string module position name
     * @return the layout output
     */
	public static function getBlock($position)
    {
    	$db   = JFactory::getDbo();
    	$lang = JFactory::getLanguage();
		$app = JFactory::getApplication();
    	$db->setQuery(	
    			'select menuitem,id,type '.
    			'from #__jpframework_blocks '.
    			'where position = '.$db->quote($position).' '.
    			'and state = 1 '.
    			'and language = '.$db->quote($lang->getTag()).' '.
    			'order by ordering asc'
		);
    	$rows = $db->loadObjectList();
		ob_start();
		foreach($rows as $row) {
	    	$itemid = $app->getMenu()->getActive()->id;
	    	$menuitems = explode(';', $row->menuitem);
	    	if($row->menuitem == 0 || in_array($itemid, $menuitems)) { 
		    	$html = "";
		    	JRequest::setVar('blockid', $row->id);
	    		$path1 = dirname(__FILE__).DS.'html'.DS.'blocks'.DS.$row->type.DS.'block.php';
				$path2 = JPF_BLOCKS_PATH.DS.$row->type.DS.'block.php';
		    	if (is_file($path1)) {
		    		//tmpl override
		    		include $path1;
		    		$html .= ob_get_contents();				
		    	} else {
					if (is_file($path2)) {		    		
		    			include $path2;
		    			$html .= ob_get_contents();			
		    		}			
				}
			}
    	}
		$html = ob_get_clean();
    	return $html;
    }
    
    /**
     * Method to render the number of columns on every position
     * @access public
     * @return set columns number and width
    */
    public static function getColumn($mod, $name, $class="")
    {
    	jimport( 'joomla.document.html.html' );
    	$num = parent::getParameter($mod);
    	$grid = array();
      	
    	//$grid[] = '<div class="col-md-12 '.$class.'">';
    	if($num != 0) { $grid[] = jpf::getBlock('jpf-'.$name); }
    	if(JDocumentHTML::countModules('jpf-'.$name)) {
    		$grid[] = '<jdoc:include type="modules" name="jpf-'.$name.'" />';
    	}
    	//$grid[] = '</div>';
    
    	return implode("\n", $grid);
    }    
    
    public static function getCarritoCount() 
    {
   		$db 	 = JFactory::getDbo();
   		$session = JFactory::getSession();
   		$user 	 = JFactory::getUser();
   		
   		if($user->guest) { return 0; }

		//check if a comanda exist
		$db->setQuery('select id from #__botiga_comandes where userid = '.$user->id.' and status = 1');
		$id = $db->loadResult();
		if($id > 0) { $session->set('idComanda', $id); }
		
		$idComanda = $session->get('idComanda', '');
		
		if($idComanda != '') {
   			$db->setQuery('select sum(qty) from #__botiga_comandesDetall where idComanda = '.$idComanda);
   			return $db->loadResult();
   		} else {
   			return 0;
   		}
    }
}

?>
