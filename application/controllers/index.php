<?php if(! defined('BASEPATH')) exit('No direct script access allowed');

require_once('application/controllers/controller.php');

class Index extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->showView('index');
    }
}

