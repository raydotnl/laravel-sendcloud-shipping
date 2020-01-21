<?php

namespace DenizTezcan\SendCloud;

use DenizTezcan\SendCloud\Entities\Customer;
use DenizTezcan\SendCloud\Http\Connection;
use DenizTezcan\SendCloud\Http\SendCloudApiException;
use DenizTezcan\SendCloud\Http\SendCloudBase;
use Exception;

class SendCloud
{
    protected $api = null;

    public function __construct()
    {
        if ($this->api === null) {
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

        if (null !== $orderNummer) {
            $parcel->order_number = $orderNummer;
        }

        try {
            $parcel->save();

            return $parcel;
        } catch (SendCloudApiException $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function getPDFFromSingleParcel($parcel)
    {
        $label = $this->api->labels();
        $label->normal_printer = $parcel->label['normal_printer'];
        $label->label_printer = $parcel->label['label_printer'];

        header('Content-type: application/pdf');
        echo $label->labelPrinterContent();
        exit;
    }
}
