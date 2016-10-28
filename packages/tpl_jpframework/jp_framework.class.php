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
if(!defined('JPF_BLOCKS_PATH')) { define('JPF_BLOCKS_PATH', JPATH_ADMINISTRATOR.'/components/com_jpframework/blocks/'); }

class jpf  extends blocksHelper
{       
    /**
     * Method to load a JP Framework layout
     * @access public
     * @return boolean, return a JP Framework layout output
    */
    public function getLayout($name, $folder = "")
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
    public function styles()
    {
    	$params = &JComponentHelper::getParams( 'com_jpframework' );
    	
    	$body_font 	= $params->get('body_font');

    	JFactory::getDocument()->addStylesheet('templates/'.$this->template.'/css/jpframework.css');
    	JFactory::getDocument()->addStylesheet('//fonts.googleapis.com/css?family='.str_replace(' ', '+', $body_font));
    }

    /**
     * Method to know if we are in the frontpage or not
     * @access public
     * @return boolean, true if is in frontpage or false if not
    */
    public function isFrontpage()
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
	 * Method to get the page suffix
     * @access public
     * @return the page suffix
    */
    public function getPageSuffix()
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
     * Method to get a block from component
     * @access public
     * @param $position string module position name
     * @return the layout output
     */
	public function getBlock($position)
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
	    	if($row->menuitem == 0 || $row->menuitem == $itemid) { 
		    	$html = "";
		    	JRequest::setVar('blockid', $row->id);
	    		$path1 = dirname(__FILE__).DS.'html'.DS.'blocks'.DS.$row->type.DS.'block.php';
				$path2 = JPATH_ADMINISTRATOR.DS.'components'.DS.'com_jpframework'.DS.'blocks'.DS.$row->type.DS.'block.php';
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
    public function getColumn($mod, $name, $class="")
    {
    	$params = &JComponentHelper::getParams( 'com_jpframework' );

    	$num = $params->get($mod);
    	switch($num) {
    		case 1:
    			$row = 1;
    			$num = 12;
    			break;
    		case 2:
    			$row = 2;
    			$num = 6;
    			break;
    		case 3:
    			$row = 3;
    			$num = 4;
    			break;
    		case 4:
    			$row = 4;
    			$num = 3;
    			break;
    		default:
    			$row = 3;
    			break;
    	}
    	$grid = array();
    
    	$i = 1;
    	while($i <= $row) {
    		$grid[] = '<div class="col-lg-'.$num.' '.$class.'">';
    		$grid[] = jpf::getBlock('jpf-'.$name.'-'.$i);
    		if($this->countModules('jpf-'.$name.'-'.$i)) {
    			$grid[] = '<jdoc:include type="modules" name="jpf-'.$name.'-'.$i.'" />';
    		}
    		$grid[] = '</div>';
    		$i++;
    	}
    
    	return implode("\n", $grid);
    }
}

?>
