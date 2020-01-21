<?php

namespace DenizTezcan\SendCloud;

use Picqer\Carriers\SendCloud\Connection;
use Picqer\Carriers\SendCloud\SendCloud as SendCloudBase;
use Picqer\Carriers\SendCloud\SendCloudApiException;
use DenizTezcan\SendCloud\Entities\Customer;
use Exception;

class SendCloud
{

	protected $api = NULL;

	public function __construct()
	{
		if($api === null){
			$this->api = new SendCloudBase(new Connection(config('shipping-sendcloud.api.key'), config('shipping-sendcloud.api.secret')));
		}
	}

	public function getShippingMethods()
	{
		return $this->api->shippingMethods()->all();
	}

	public function createSingleParcel(Customer $customer, $shipment = 10, $orderNummer = null)
	{
		$parcel = $this->api->parcels();

		$parcel->name = $customer->getName();
		$parcel->company_name = $customer->getCompanyName();
		$parcel->address = $customer->getStreetAddress();
		$parcel->house_number = $customer->getStreetAddressNr();
		$parcel->city = $customer->getCity();
		$parcel->postal_code = $customer->getPostalCode();
		$parcel->country = $customer->getCountry();
		$parcel->requestShipment = true;
		$parcel->shipment = $shipment;
		
		if(null !== $orderNummer){
			$parcel->order_number = $orderNummer;
		}

		try {
		    $parcel->save();
		} catch (SendCloudApiException $e) {
		    throw new Exception($e->getMessage());
		}

	}

}