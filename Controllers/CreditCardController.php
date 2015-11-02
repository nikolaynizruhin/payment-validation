<?php

/**
 * Class CreditCardController
 */
class CreditCardController extends BaseController
{
    /**
     * Show creditCard validation page
     */
    static function showCreditCard ()
    {
        require('Views/creditcard.php');
    }

    /**
     * Call creditCardHandler for AJAX
     */
    static function getCreditCardData ()
    {
        $obj = new CreditCardController();
        $obj->creditCard();
    }
}
