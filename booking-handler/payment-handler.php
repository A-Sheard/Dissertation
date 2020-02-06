<?php
require_once('../vendor/autoload.php');

\Stripe\Stripe::setApiKey('sk_test_o0pzORcgY7CRabjnjImjkWbi');

$token = $_POST['stripeToken'];
/*
// This is a $20.00 charge in US Dollar.
$charge = \Stripe\Charge::create(
    array(
        'amount' => 2000,
        'currency' => 'gbp',
        'source' => $token
    )
);
*/

function chargeGuest($Amount,$Currency){
	$charge = \Stripe\Charge::create(
	    array(
	        'amount' => $Amount,
	        'currency' => $Currency,
	        'source' => $token
	    )
	);
	echo "Success";
}


print_r($charge);
?>