<?php

use \Model_Portal;
use \Model_Page;

class Controller_Portal extends Controller
{
	private $defaultPortal;
	private $model;
	private $portalUri;
	private $user;
	
	public function before()
	{
		$this->defaultPortal = $this->createDefaultPortal();
	}
	
	public function action_index()
	{
		return $this->action_page();
	}
	
	public function action_page($uri = "home")
	{
		$this->createPortal($uri);		
		$view = $this->createViewLayout($uri);
		
		$navigation = View::forge('components/content/nav');
		$navigation->set_global('subPortals', $this->model->children);
		$navigation->set_global('subPages', $this->model->pages);
		
		$navigation->model = $this->model;
		
		$content = View::forge('components/content/content');
		$content->page = $this->findPage($uri);
		if($content->page == NULL)
		{
			return $this->action_404();	
		}
		
		$view->navigation = $navigation;
		$view->content = $content;
		
		return $view;
	}
	
	public function action_process($uri)
	{
		$view = View::forge('portal/process');
		$view->name = $uri;
		
		return $view;
	}

	public function action_admin($uri = "home")
	{
		if(!$this->user->isAdmin())
		{
			return $this->action_401();
		}
		
		$this->createPortal($uri);
		$view = $this->createViewLayout($uri);
		
		//add some assets
		Asset::css(array('admin.css'), array(), 'css');
		
		//override some global variables
		$view->set_global('portalName', $this->model->portal_name." Admin Portal");
		$view->set_global('breadCrumb', $this->defaultPortal->portal_name." | ".$this->model->portal_name." | Admin Portal");		
		
		$navigation = View::forge('components/content/nav');
		$navigation->set_global('subPortals', Portal::find_by('parent', $this->model->id));
		$navigation->set_global('subPages', Page::find_by(array(
													'portal_id' => $this->model->id,
													'is_viewable' => 1
								)));
		$navigation->model = $this->model;
		
		$view->navigation = $navigation;
		$view->content = NULL;
		
		return $view;
	}
	
	/*
	error actions
	*/
	public function action_404()
	{
		$this->model = $this->createDefaultPortal();
		$view = $this->createViewLayout('Error 404');
		
		$view->navigation = NULL;
		$view->content = View::forge("404");
		
		return Response::forge($view, 404);
	}
	
	public function action_401()
	{
		$this->model = $this->createDefaultPortal();
		$view = $this->createViewLayout('Error 401');
		
		$view->navigation = NULL;
		$view->content = View::forge("401");
		
		return Response::forge($view, 401);
	}
	
	private function createViewLayout($uri)
	{
		$view = View::forge('layout');
		Asset::css(array('style.css', 'ap_element.css'), array(), 'css');
		
		$view->set_global('defaultPortalName', $this->defaultPortal->name);
		$view->set_global('portalName', $this->model->name);
		$view->set_global('breadCrumb', $this->defaultPortal->name." | ".$this->model->name);
		$view->set_global('topLevelChildren', $this->defaultPortal->children);
		
		$view->header = View::forge('components/header');
		$view->contentHeader = View::forge('components/content/header');
		$view->footer = View::forge('components/footer');
		
		$view->name = $uri;
		
		return $view;
	}
	
	private function createPortal($uri)
	{
		$thePortal = "";
		$segments = Uri::segments();
		foreach($segments as $segment)
		{
			if($segment == $uri)
			{
				//break early, portal uri matched
				break;
			}
			else if($segment == 'admin')
			{
				//break early, portal uri is previous segment
				break;
			}
			else if($segment != $uri)
			{
				//possible portal here
				$thePortal = $segment;	
			}
		}
		
		if($thePortal == "")
		{
			$this->model = $this->createDefaultPortal();
		}
		else
		{
			$this->model = Model_Portal::find('first', array(
				'where' => array(array('uri', $thePortal)))
			);
		}
	}
	
	private function createDefaultPortal()
	{
		return Model_Portal::find('first', array(
			'where' => array(array('parent', 0)))
		);
	}
	
	private function findPage($uri)
	{
		foreach($this->model->pages as $page)
		{
			if($page['uri'] == $uri)
			{
				return $page;
			}
		}
		return NULL;
	}
}
?>