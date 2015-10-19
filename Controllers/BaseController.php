<?php

/**
 * Class BaseController
 */
class BaseController
{
    /**
     * Show main page
     */
    static function index ()
    {
        require('Views/index.php');
    }

    /**
     * Show 404 error page
     */
    static function errorPage ()
    {
        require('Views/404.php');
    }

    /**
     * Assign handler for mobile json and xml format data
     */
    protected function mobile()
    {
        if(isset($_POST['phoneNumber'])&&(!empty($_POST['phoneNumber']))) {
            echo json_encode($this->jsonRequestMobile($_POST));
        }

        if(isset($_GET['phoneNumber'])&&(!empty($_GET['phoneNumber']))) {
            echo $this->xmlRequestMobile($_GET)->asXML();
        }
    }

    /**
     * Request authorize
     *
     * @param array $requestParams
     * @param $timestamp
     * @return string
     */
    protected function requestAuthorize (array $requestParams, $timestamp)
    {
        $params = '';
        foreach ($requestParams as $key => $value) {
            $params .= "$key=$value";
        }
        return md5($params . $timestamp);
    }

    /**
     * Get request authorize
     *
     * @param $request
     * @return string
     */
    protected function getSig ($request)
    {
        return $this->requestAuthorize($request, date("Y-m-d H:i:s"));
    }

    /**
     * Validate phone number
     *
     * @param $phoneNumber
     * @return bool
     */
    protected function phoneNumberValidate ($phoneNumber)
    {
        return preg_match("/^(380)[0-9]{9}$/", $phoneNumber) ? true : false;
    }

    /**
     * Handler for mobile json data
     *
     * @param $request
     * @return array
     */
    protected function jsonRequestMobile ($request)
    {
        $request['sig'] = $this->getSig($request);

        if(!$this->phoneNumberValidate($request['phoneNumber'])) {
            $request['phoneNumber'] = 'error';
        }

        return $request;

    }

    /**
     * Handler for mobile xml data
     *
     * @param $request
     * @return object
     */
    protected function xmlRequestMobile ($request)
    {
        $mobile = new SimpleXMLElement('<xml/>');
        $mobile->mobile->sig = $this->getSig($request);

        $this->phoneNumberValidate($request['phoneNumber']) ?
            $mobile->mobile->phoneNumber = $request['phoneNumber'] :
            $mobile->mobile->phoneNumber = 'error';

        return $mobile;
    }

    /**
     * Assign handler for credit card json and xml format data
     */
    protected function creditCard()
    {
        if(isset($_POST)&&(!empty($_POST))) {
            echo json_encode($this->validateAll($_POST));
        }

        if(isset($_GET)&&(!empty($_GET))) {
            echo $this->xmlRequestCreditCard($_GET)->asXML();
        }
    }

    /**
     * Validate Credit card number using Luhn algorithm
     *
     * @param $creditCardNumber
     * @return bool
     */
    protected function creditCardNumberValidate ($creditCardNumber)
    {
        $cardLength=strlen($creditCardNumber);
        $parity=$cardLength % 2;
        $total=0;
        for ($i=0; $i<$cardLength; $i++) {
            $digit=$creditCardNumber[$i];
            if ($i % 2 == $parity) {
                $digit*=2;
                if ($digit > 9) {
                    $digit-=9;
                }
            }
            $total+=$digit;
        }
        return ($total % 10 == 0) ? true : false;
    }

    /**
     * Validate Expiration date
     *
     * @param $expirationDate
     * @return bool
     */
    protected function expirationDateValidate ($expirationDate)
    {
        return ($expirationDate > date('Y-m')) ? true : false;
    }

    /**
     * Validate CVV2
     *
     * @param $cvv2
     * @return bool
     */
    protected function cvv2Validate ($cvv2)
    {
        return preg_match("/^[0-9]{3}$/", $cvv2) ? true : false;
    }

    /**
     * Validate all fields for credit card
     *
     * @param $request
     * @return array
     */
    protected function validateAll ($request)
    {
        $request['sig'] = $this->requestAuthorize($request, date("Y-m-d H:i:s"));

        if(!$this->expirationDateValidate($request['expirationDate'])) {
            $request['expirationDate'] = 'error';
        }

        if(!$this->cvv2Validate($request['cvv2'])) {
            $request['cvv2'] = 'error';
        }

        if(!$this->creditCardNumberValidate($request['creditCardNumber'])) {
            $request['creditCardNumber'] = 'error';
        }

        return $request;
    }

    /**
     * Handler for credit card xml data
     *
     * @param $request
     * @return SimpleXMLElement
     */
    protected function xmlRequestCreditCard ($request)
    {
        $request = $this->validateAll($request);
        $creditCard = new SimpleXMLElement('<xml/>');

        $creditCard->creditCard->sig = $request['sig'];
        $creditCard->creditCard->creditCardNumber = $request['creditCardNumber'];
        $creditCard->creditCard->expirationDate = $request['expirationDate'];
        $creditCard->creditCard->cvv2 = $request['cvv2'];
        $creditCard->creditCard->email = $request['email'];

        return $creditCard;
    }
}
