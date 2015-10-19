<?php

/**
 * Include required files
 */
require('Route.php');
require('Controllers/BaseController.php');
require('Controllers/MobileController.php');
require('Controllers/CreditCardController.php');

/**
 * Call router
 */
$route = new Route($_SERVER['REQUEST_URI']);