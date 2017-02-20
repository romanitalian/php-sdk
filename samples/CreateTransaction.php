<?php

namespace platron_sdk\samples;

require_once '../autoload.php';

use platron_sdk\request\commands\InitPayment;
use platron_sdk\request\Exception;
use platron_sdk\request\Requester;

class CreateTransaction {
		
	public function actionIndex($merchant, $secretKey){
		$requester = new Requester($merchant, $secretKey);
		$command = new InitPayment('10.00', 'Test transaction');
		$command->addTestingMode();
		$command->addUserEmail('test@test.ru');
		$command->addUserPhone('79055770000');
		$command->addPaymentSystem('TEST');
		
		try {
			$response = $requester->request($command);
		}
		catch (Exception $e){
			var_dump($e);
			die();
		}
		
		var_dump($response);
	}
}
