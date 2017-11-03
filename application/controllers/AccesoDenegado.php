<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AccesoDenegado extends CI_Controller {

	public function index()
	{
		$this->load->view('Errores/error_403');

		//echo "Hola";
	}


}