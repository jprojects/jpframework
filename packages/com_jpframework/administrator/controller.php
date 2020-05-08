<?php

/**
 * @version     1.0.0
 * @package     com_jpframework
 * @copyright   Copyright (C) 2015. Todos los derechos reservados.
 * @license     Licencia Pública General GNU versión 2 o posterior. Consulte LICENSE.txt
 * @author      aficat <kim@aficat.com> - http://www.afi.cat
 */
// No direct access
defined('_JEXEC') or die;

class JpframeworkController extends JControllerLegacy {

    /**
     * Method to display a view.
     *
     * @param	boolean			$cachable	If true, the view output will be cached
     * @param	array			$urlparams	An array of safe url parameters and their variable types, for valid values see {@link JFilterInput::clean()}.
     *
     * @return	JController		This object to support chaining.
     * @since	1.5
     */
    public function display($cachable = false, $urlparams = false) {
        require_once JPATH_COMPONENT . '/helpers/jpframework.php';

        $view = JFactory::getApplication()->input->getCmd('view', 'jpf');
        JFactory::getApplication()->input->set('view', $view);

        parent::display($cachable, $urlparams);

        return $this;
    }

    public function legal() 
    {
        $app    = JFactory::getApplication();
        $db     = JFactory::getDbo();

        $nom     = $_POST['nom'];
    	$empresa = $_POST['empresa'];
    	$nif	 = $_POST['nif'];
    	$adreca	 = $_POST['adreca'];
    	$email	 = $_POST['email'];
    	$jutjats = $_POST['jutjats'];

    	//Avis legal català
    	$cat_avis_legal = file_get_contents(JPATH_COMPONENT_ADMINISTRATOR.'/assets/legal/cat_avis_legal.html');
        $cat_avis_legal = str_replace('<EMPRESA>', '<b>'.$empresa.'</b>', $cat_avis_legal);
        $cat_avis_legal = str_replace('<NIF>', '<b>'.$nif.'</b>', $cat_avis_legal);
        $cat_avis_legal = str_replace('<POBLACIO_JUJATS>', '<b>'.$jutjats.'</b>', $cat_avis_legal);
        
        //create article base to associate all menú items
		$post = new stdClass();
		$post->title 	= 'Avís legal';
		$post->alias 	= 'avis-legal';
        $post->introtext 	= '';
        $post->fulltext 	= $cat_avis_legal;
		$post->state 	= 1;
		$post->catid 	= 2;
		$post->created 	= date('Y-m-d H:i:s');
		$post->created_by = 928;
        $post->modified 	= date('Y-m-d H:i:s');
        $post->modified_by = 928;
        $post->checked_out_time 	= date('Y-m-d H:i:s');
        $post->publish_up 	= date('Y-m-d H:i:s');
        $post->images 	= '';
        $post->urls 	= '';
        $post->metakey 	= '';
        $post->metadesc 	= '';
		$post->access 	= 1;
		$post->metadata = '{"robots":"","author":"","rights":"","xreference":""}';
		$post->featured = 0;
		$post->language = 'ca-ES';
		$post->attribs  = '{"article_layout":"","show_title":"0","link_titles":"","show_tags":"","show_intro":"","info_block_position":"","info_block_show_title":"","show_category":"0","link_category":"","show_parent_category":"","link_parent_category":"","show_associations":"","show_author":"0","link_author":"","show_create_date":"0","show_modify_date":"0","show_publish_date":"0","show_item_navigation":"0","show_icons":"0","show_print_icon":"0","show_email_icon":"0","show_vote":"0","show_hits":"0","show_noauth":"","urls_position":"","alternative_readmore":"","article_page_title":"","show_publishing_options":"","show_article_options":"","show_urls_images_backend":"","show_urls_images_frontend":""}';

		$db->insertObject('#__content', $post);

    	//Aviso legal español
    	$esp_aviso_legal = file_get_contents(JPATH_COMPONENT_ADMINISTRATOR.'/assets/legal/esp_aviso_legal.html');
        $esp_aviso_legal = str_replace('<EMPRESA>', '<b>'.$empresa.'</b>', $esp_aviso_legal);
        $esp_aviso_legal = str_replace('<NIF>', '<b>'.$nif.'</b>', $esp_aviso_legal);
        $esp_aviso_legal = str_replace('<POBLACIO_JUJATS>', '<b>'.$jutjats.'</b>', $esp_aviso_legal);
        
        //create article base to associate all menú items
		$post = new stdClass();
		$post->title 	= 'Aviso legal';
		$post->alias 	= 'aviso-legal';
        $post->introtext 	= '';
        $post->fulltext 	= $esp_aviso_legal;
		$post->state 	= 1;
		$post->catid 	= 2;
		$post->created 	= date('Y-m-d H:i:s');
		$post->created_by = 928;
        $post->modified 	= date('Y-m-d H:i:s');
        $post->modified_by = 928;
        $post->checked_out_time 	= date('Y-m-d H:i:s');
        $post->publish_up 	= date('Y-m-d H:i:s');
        $post->images 	= '';
        $post->urls 	= '';
        $post->metakey 	= '';
        $post->metadesc 	= '';
		$post->access 	= 1;
		$post->metadata = '{"robots":"","author":"","rights":"","xreference":""}';
		$post->featured = 0;
		$post->language = 'es-ES';
		$post->attribs  = '{"article_layout":"","show_title":"0","link_titles":"","show_tags":"","show_intro":"","info_block_position":"","info_block_show_title":"","show_category":"0","link_category":"","show_parent_category":"","link_parent_category":"","show_associations":"","show_author":"0","link_author":"","show_create_date":"0","show_modify_date":"0","show_publish_date":"0","show_item_navigation":"0","show_icons":"0","show_print_icon":"0","show_email_icon":"0","show_vote":"0","show_hits":"0","show_noauth":"","urls_position":"","alternative_readmore":"","article_page_title":"","show_publishing_options":"","show_article_options":"","show_urls_images_backend":"","show_urls_images_frontend":""}';

		$db->insertObject('#__content', $post);

    	//Cookies català
        $cat_cookies = file_get_contents(JPATH_COMPONENT_ADMINISTRATOR.'/assets/legal/cat_cookies.html');
        
        //create article base to associate all menú items
		$post = new stdClass();
		$post->title 	= 'Política de galetes';
		$post->alias 	= 'politica-de-galetes';
        $post->introtext 	= '';
        $post->fulltext 	= $cat_cookies;
		$post->state 	= 1;
		$post->catid 	= 2;
		$post->created 	= date('Y-m-d H:i:s');
		$post->created_by = 928;
        $post->modified 	= date('Y-m-d H:i:s');
        $post->modified_by = 928;
        $post->checked_out_time 	= date('Y-m-d H:i:s');
        $post->publish_up 	= date('Y-m-d H:i:s');
        $post->images 	= '';
        $post->urls 	= '';
        $post->metakey 	= '';
        $post->metadesc 	= '';
		$post->access 	= 1;
		$post->metadata = '{"robots":"","author":"","rights":"","xreference":""}';
		$post->featured = 0;
		$post->language = 'ca-ES';
		$post->attribs  = '{"article_layout":"","show_title":"0","link_titles":"","show_tags":"","show_intro":"","info_block_position":"","info_block_show_title":"","show_category":"0","link_category":"","show_parent_category":"","link_parent_category":"","show_associations":"","show_author":"0","link_author":"","show_create_date":"0","show_modify_date":"0","show_publish_date":"0","show_item_navigation":"0","show_icons":"0","show_print_icon":"0","show_email_icon":"0","show_vote":"0","show_hits":"0","show_noauth":"","urls_position":"","alternative_readmore":"","article_page_title":"","show_publishing_options":"","show_article_options":"","show_urls_images_backend":"","show_urls_images_frontend":""}';

		$db->insertObject('#__content', $post);

    	//Cookies español
        $esp_cookies = file_get_contents(JPATH_COMPONENT_ADMINISTRATOR.'/assets/legal/esp_cookies.html');
        
        //create article base to associate all menú items
		$post = new stdClass();
		$post->title 	= 'Política de cookies';
		$post->alias 	= 'politica-de-cookies';
        $post->introtext 	= '';
        $post->fulltext 	= $esp_cookies;
		$post->state 	= 1;
		$post->catid 	= 2;
		$post->created 	= date('Y-m-d H:i:s');
		$post->created_by = 928;
        $post->modified 	= date('Y-m-d H:i:s');
        $post->modified_by = 928;
        $post->checked_out_time 	= date('Y-m-d H:i:s');
        $post->publish_up 	= date('Y-m-d H:i:s');
        $post->images 	= '';
        $post->urls 	= '';
        $post->metakey 	= '';
        $post->metadesc 	= '';
		$post->access 	= 1;
		$post->metadata = '{"robots":"","author":"","rights":"","xreference":""}';
		$post->featured = 0;
		$post->language = 'es-ES';
		$post->attribs  = '{"article_layout":"","show_title":"0","link_titles":"","show_tags":"","show_intro":"","info_block_position":"","info_block_show_title":"","show_category":"0","link_category":"","show_parent_category":"","link_parent_category":"","show_associations":"","show_author":"0","link_author":"","show_create_date":"0","show_modify_date":"0","show_publish_date":"0","show_item_navigation":"0","show_icons":"0","show_print_icon":"0","show_email_icon":"0","show_vote":"0","show_hits":"0","show_noauth":"","urls_position":"","alternative_readmore":"","article_page_title":"","show_publishing_options":"","show_article_options":"","show_urls_images_backend":"","show_urls_images_frontend":""}';

		$db->insertObject('#__content', $post);

    	//Política de privacitat català
    	$cat_politica_privacitat = file_get_contents(JPATH_COMPONENT_ADMINISTRATOR.'/assets/legal/cat_politica_privacitat.html');
    	$cat_politica_privacitat = str_replace('<EMPRESA>', '<b>'.$empresa.'</b>', $cat_politica_privacitat);
    	$cat_politica_privacitat = str_replace('<ADRECA>', '<b>'.$adreca.'</b>', $cat_politica_privacitat);
    	$cat_politica_privacitat = str_replace('<NIF>', '<b>'.$nif.'</b>', $cat_politica_privacitat);
        $cat_politica_privacitat = str_replace('<EMAIL_EMPRESA>', '<b>'.$email.'</b>', $cat_politica_privacitat);
        
        //create article base to associate all menú items
		$post = new stdClass();
		$post->title 	= 'Política de privacitat';
		$post->alias 	= 'politica-de-privacitat';
        $post->introtext 	= '';
        $post->fulltext 	= $cat_politica_privacitat;
		$post->state 	= 1;
		$post->catid 	= 2;
		$post->created 	= date('Y-m-d H:i:s');
		$post->created_by = 928;
        $post->modified 	= date('Y-m-d H:i:s');
        $post->modified_by = 928;
        $post->checked_out_time 	= date('Y-m-d H:i:s');
        $post->publish_up 	= date('Y-m-d H:i:s');
        $post->images 	= '';
        $post->urls 	= '';
        $post->metakey 	= '';
        $post->metadesc 	= '';
		$post->access 	= 1;
		$post->metadata = '{"robots":"","author":"","rights":"","xreference":""}';
		$post->featured = 0;
		$post->language = 'ca-ES';
		$post->attribs  = '{"article_layout":"","show_title":"0","link_titles":"","show_tags":"","show_intro":"","info_block_position":"","info_block_show_title":"","show_category":"0","link_category":"","show_parent_category":"","link_parent_category":"","show_associations":"","show_author":"0","link_author":"","show_create_date":"0","show_modify_date":"0","show_publish_date":"0","show_item_navigation":"0","show_icons":"0","show_print_icon":"0","show_email_icon":"0","show_vote":"0","show_hits":"0","show_noauth":"","urls_position":"","alternative_readmore":"","article_page_title":"","show_publishing_options":"","show_article_options":"","show_urls_images_backend":"","show_urls_images_frontend":""}';

		$db->insertObject('#__content', $post);

    	//Política de privacitat español
    	$esp_politica_privacitat = file_get_contents(JPATH_COMPONENT_ADMINISTRATOR.'/assets/legal/esp_politica_privacidad.html');
    	$esp_politica_privacitat = str_replace('<EMPRESA>', '<b>'.$empresa.'</b>', $esp_politica_privacitat);
    	$esp_politica_privacitat = str_replace('<ADRECA>', '<b>'.$adreca.'</b>', $esp_politica_privacitat);
    	$esp_politica_privacitat = str_replace('<NIF>', '<b>'.$nif.'</b>', $esp_politica_privacitat);
        $esp_politica_privacitat = str_replace('<EMAIL_EMPRESA>', '<b>'.$email.'</b>', $esp_politica_privacitat);
        
        //create article base to associate all menú items
		$post = new stdClass();
		$post->title 	= 'Política de privacidad';
		$post->alias 	= 'politica-de-privacidad';
        $post->introtext 	= '';
        $post->fulltext 	= $esp_politica_privacitat;
		$post->state 	= 1;
		$post->catid 	= 2;
		$post->created 	= date('Y-m-d H:i:s');
		$post->created_by = 928;
        $post->modified 	= date('Y-m-d H:i:s');
        $post->modified_by = 928;
        $post->checked_out_time 	= date('Y-m-d H:i:s');
        $post->publish_up 	= date('Y-m-d H:i:s');
        $post->images 	= '';
        $post->urls 	= '';
        $post->metakey 	= '';
        $post->metadesc 	= '';
		$post->access 	= 1;
		$post->metadata = '{"robots":"","author":"","rights":"","xreference":""}';
		$post->featured = 0;
		$post->language = 'es-ES';
		$post->attribs  = '{"article_layout":"","show_title":"0","link_titles":"","show_tags":"","show_intro":"","info_block_position":"","info_block_show_title":"","show_category":"0","link_category":"","show_parent_category":"","link_parent_category":"","show_associations":"","show_author":"0","link_author":"","show_create_date":"0","show_modify_date":"0","show_publish_date":"0","show_item_navigation":"0","show_icons":"0","show_print_icon":"0","show_email_icon":"0","show_vote":"0","show_hits":"0","show_noauth":"","urls_position":"","alternative_readmore":"","article_page_title":"","show_publishing_options":"","show_article_options":"","show_urls_images_backend":"","show_urls_images_frontend":""}';

		$db->insertObject('#__content', $post);

        $this->setRedirect('index.php?option=com_jpframework');
    }

}
