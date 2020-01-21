<?php

namespace DenizTezcan\SendCloud\Http;

use DenizTezcan\SendCloud\Http\Models\Label;
use DenizTezcan\SendCloud\Http\Models\Parcel;
use DenizTezcan\SendCloud\Http\Models\ShippingMethod;

class SendCloudBase
{
    protected $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function labels()
    {
        return new Label($this->connection);
    }

    public function parcels()
    {
        return new Parcel($this->connection);
    }

    public function shippingMethods()
    {
        return new ShippingMethod($this->connection);
    }
}
