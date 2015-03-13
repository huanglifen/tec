<?php

if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

abstract class BaseLib {

    protected $ci;

    function __construct() {
        $this->ci = &get_instance();
    }

}