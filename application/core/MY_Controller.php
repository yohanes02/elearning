<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Core_Controller extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
  }


  public function template($view = "", $title = "", $data = [])
  {

    $dita['content'] = $view;
    $dita['site_title'] = "Online Learning - " . $title;

    $pass = array_merge($dita, $data);

    $this->load->view('v_core', $pass);
  }
}
