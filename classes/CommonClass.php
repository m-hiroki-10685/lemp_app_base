<?php

namespace Classes;

use Dotenv\Dotenv;

class CommonClass
{
	public function __construct()
	{
		Dotenv::createImmutable(__DIR__ . '/../')->load();
	}
}