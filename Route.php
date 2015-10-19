<?php

/**
 * Class Route
 */
class Route
{

    /**
     * Assign views according to uri
     *
     * @param $uri
     */
    public function __construct($uri)
    {
        $mobileHandlerUri = '';
        $creditCardHandlerUri = '';

        if (preg_match("/^\/PaymentAPI\/Mobile\/Handler.+$/", $uri)) {
            $mobileHandlerUri = $uri;
        } elseif (preg_match("/^\/PaymentAPI\/CreditCard\/Handler.+$/", $uri)) {
            $creditCardHandlerUri = $uri;
        }

        switch ($uri) {
            case "/PaymentAPI/":
                BaseController::index();
                break;
            case "/PaymentAPI/Mobile/":
                MobileController::showMobile();
                break;
            case $mobileHandlerUri:
                MobileController::getMobileData();
                break;
            case "/PaymentAPI/CreditCard/":
                CreditCardController::showCreditCard();
                break;
            case $creditCardHandlerUri:
                CreditCardController::getCreditCardData();
                break;
            default:
                BaseController::errorPage();
        }
    }
}