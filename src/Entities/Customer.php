<?php

namespace DenizTezcan\SendCloud\Entities;

class Customer extends Base
{
	
	public function getName()
	{
		return $this->get('name');
	}

	public function getCompanyName()
	{
		return $this->get('company_name');
	}

	public function getStreetAddress()
	{
		return $this->get('street_address');
	}

	public function getStreetAddressNr()
	{
		return $this->get('street_address_nr');
	}

	public function getCity()
	{
		return $this->get('city');
	}

	public function getPostalCode()
	{
		return $this->get('postal_code');
	}

	public function getCountry()
	{
		return $this->get('country');
	}

}