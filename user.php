<?php

class User
{
	private $mysqli;
	public $lang = array(
		'firstName'	=> 'First name',
		'lastName'	=> 'Last name',
		'address1'	=> 'Address 1',
		'address2'	=> 'Address 2',
		'city'		=> 'City',
		'state'		=> 'State',
		'zip'		=> 'Zip',
		'country'	=> 'Country',
	);

	public function __construct()
	{
		$this->mysqli = new mysqli("127.0.0.1", "root", "root", "helloworld");
		if ($this->mysqli->connect_errno) {
			$this->output("Failed to connect to MySQL: {$this->mysqli->connect_error}", 'error');
		}
	}

	public function getUsers()
	{
		$results = array();
		$sql = 'SELECT * FROM User';
		$res = $this->mysqli->query($sql);

		if ($res) {
			while ($row = $res->fetch_object()) {
				$results[] = $row;
			}
		}
		$res->close();

		return $results;
	}

	public function createUser()
	{
		$Result = $this->validUser();
		if (!empty($Result['success'])) {
			$User = $Result['user'];
		} else {
			// return the results to the page to be handled by the form
			return $Result;
		}

		$Fields = array(
			'firstName',
			'lastName',
			'address1',
			'address2',
			'city',
			'state',
			'zip',
			'country',
		);

		foreach ($User as $field => $value) {
			$User[$field] = $this->mysqli->real_escape_string($value);
		}

		$sql = sprintf("INSERT INTO User (%s) VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')"
			, implode(', ', $Fields)
			, $User['firstName']
			, $User['lastName']
			, $User['address1']
			, $User['address2']
			, $User['city']
			, $User['state']
			, $User['zip']
			, $User['country']
		);

		if (!$this->mysqli->query($sql)) {
			return array('success' => false);
		}

		return array('success' => true);
	}

	public function validUser()
	{
		$Fields = array(
			'firstName' => "[\w\s\'\-\.]+",
			'lastName' => "[\w\s\'\-\.]+",
			'address1' => "[\w\d\s\'\-\.]+",
			'address2' => "[\w\d\s\#\.]*",
			'city' => "[\w\s\-\'\.]+",
			'state' => "[\w]{2}",
			'zip' => "([\d]{5})(\-)?([\d]{4})?",
			'country' => "[\w]{2}",
		);

		$Errors = array();
		$User = array();
		foreach ($Fields as $name => $format) {
			$Results = array();
			if (!preg_match("#^$format\$#", trim($_POST[$name]), $Results)) {
				$Errors[$name] = 'Invalid format';
			} else {
				$User[$name] = $Results[0];
			}
		}

		if (!empty($Errors)) {
			return array('success' => false, 'errors' => $Errors);
		}

		return array('success' => true, 'user' => $User);
	}
}
