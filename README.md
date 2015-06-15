## CreditPilot PHP library

This is a library for [CreditPilot](http://www.creditpilot.ru/) service.

##How to use (simple example)

	require_once 'vendor/autoload.php';

	use CreditPilot\ResultCode;

	$gateway = new \CreditPilot\Gateway(
	    'test_gateway_url',
	    'login',
	    'password',
	    []
	);
	
	$response = $gateway->prepare(time(), '712698259', '9631234567', 100);

	if($response->canPay()) {
	
		$response = $gateway->pay(time(), '712698259', '9631234567', 100);
		
		if($response->succeed()) {
		
			$billNumber = $response->billNumber();
			
			$response = $gateway->findPay($billNumber);
			
			echo ResultCode::message($response->resultCode())
		
		}
	
	}


##Unit tests (PHPUnit)

Will be provided soon. I promise.

##Contribution

Feel free to make pull requests.