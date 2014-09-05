<?php 
class UserController extends BaseController {

    /**
     * Instantiate a new UserController instance.
     */
    public function __construct()
    {
        $this->beforeFilter('csrf', array('on' => 'post'));

    }

    public function storeRegister()
    {
        // POST
        echo "sdfsd";
    }
}