<?php

if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

abstract class BaseLib {

    protected $ci;
    const NUM_PER_PAGE = 10;

    function __construct() {
        $this->ci = &get_instance();
    }

}