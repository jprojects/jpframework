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
    	$icon_font 	= $params->get('icon_font', 'forkawesome');
      $unload 	  = $params->get('unload');
      
      $doc        = JFactory::getDocument();

		//add stylesheets
    	$doc->addStylesheet('templates/jpframework/css/jpframework.css');
    	if($icon_font == 'fontawesome') {
        $doc->addScript('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/js/all.min.js');
        $doc->addStylesheet('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css');
    	}
    	if($icon_font == 'forkawesome') {
    		$doc->addStylesheet('https://cdnjs.cloudflare.com/ajax/libs/fork-awesome/1.1.7/css/fork-awesome.min.css');
    	}
    	//ToDo::permitir multiples fuentes a cargar
    	$doc->addStylesheet('//fonts.googleapis.com/css?family='.str_replace(' ', '+', $body_font).':300italic,400italic,700italic,400,300,700');

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

    	if($params->get('front_component', 0) == 0 && jpf::isFrontpage()) { return false; }
    	$mode = $params->get('itemids_mind');
    	$ids 	= $params->get('itemids');

      $app    = JFactory::getApplication();
      $lang   = JFactory::getLanguage();

      $menu   = $app->getMenu();
	    $active = $menu->getActive();
	    $itemId = $active->id;

      if($mode = 0) { //mode 0 itemids selected not display the main component
  	    if (!in_array($itemId, $ids)) {
          return true;
        }
      } else { //mode 1 itemids selected display the main component
        if (in_array($itemId, $ids)) {
          return true;
        }
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
	 * Method to get the social links
     * @access public
     * @return string
    */
    public static function getSocial()
    {
		$items = json_decode(jpf::getparameter('list_social'));
		$html = array();

		foreach ($items as $item)
      	{
			foreach ($item as $k => $v)
			{
				$result[$k][] = $v;
			}
      	}

	  	foreach ($result as $k => $v)
		{
			$html[] = '<a class="mx-1" target="_blank" href="'.$v[2].'"><i title="'.$v[0].'" class="fa '.$v[1].'"></i></a>';
		}

		return implode($html);
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
		    	//override blocks from template
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

    	$jdoc = new JDocumentHTML;
    	if($num != 0) { $grid[] = jpf::getBlock('jpf-'.$name); }
    	if($jdoc->countModules('jpf-'.$name)) {
    		$grid[] = '<jdoc:include type="modules" name="jpf-'.$name.'" />';
    	}

    	return implode("\n", $grid);
    }

}

?>
