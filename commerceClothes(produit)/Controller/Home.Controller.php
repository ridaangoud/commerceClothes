<?php
	/*  Controlers : Home*/
	//Inclusion de Classe Mére
	require_once('Controller.Controller.php');
	class HomeController extends Controller{
		
		//Action index
		public function index(){
			$this->View( __FUNCTION__);
		}
	}
?>

