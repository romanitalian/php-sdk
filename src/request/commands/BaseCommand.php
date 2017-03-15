<?php

namespace Platron\PhpSdk\request\commands;

use Platron\PhpSdk\request\clients\iClient;
use SimpleXMLElement;

abstract class BaseCommand {

	const PLATRON_URL = 'https://www.platron.ru/';

	/**
	 * Получить url ждя запроса
	 * @return string
	 */
	abstract protected function getRequestUrl();

	/**
	 * Получить параметры, сгенерированные командой
	 * @return array
	 */
	protected function getParameters() {
		$filledvars = array();
		foreach (get_object_vars($this) as $name => $value) {
			if ($value) {
				$filledvars[$name] = $value;
			}
		}

		return $filledvars;
	}

	/**
	 * Выполнить команду
	 * @param iClient $client
	 * @return SimpleXMLElement
	 */
	public function execute(iClient $client) {
		return $client->request($this->getRequestUrl(), $this->getParameters());
	}

}