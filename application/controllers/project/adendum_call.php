<?
	defined('BASEPATH') or die('Access Denied');
	
	class adendum_call extends AdminPage{

		function workinginst_call()
		{
			parent::AdminPage();
			$this->pageCaption = 'Approve Tender Evaluation';
		}
		
		function index(){	
			$this->loadTemplate('project/adendum_view');
		}
	}	
