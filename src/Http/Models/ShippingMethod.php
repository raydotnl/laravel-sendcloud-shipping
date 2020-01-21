<?php

namespace DenizTezcan\SendCloud\Http\Models;

use DenizTezcan\SendCloud\Http\Traits\Findable;

class ShippingMethod extends Model
{

    use Findable;

    protected $fillable = [
        'id',
        'name',
        'carrier',
        'price',
        'min_weight',
        'max_weight',
        'service_point_input',
        'options',
        'countries'
    ];

    protected $url = 'shipping_methods';

    protected $namespaces = [
        'singular' => 'shipping_method',
        'plural' => 'shipping_methods'
    ];

}