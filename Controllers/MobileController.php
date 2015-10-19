<?php

/**
 * Class MobileController
 */
class MobileController extends BaseController
{
    /**
     * Show mobile validation page
     */
    static function showMobile ()
    {
        require('Views/mobile.php');
    }

    /**
     * Call mobileHandler for AJAX
     */
    static function getMobileData ()
    {
        $obj = new MobileController();
        $obj->mobile();
    }
}