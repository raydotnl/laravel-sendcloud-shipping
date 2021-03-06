<?php

namespace DenizTezcan\SendCloud\Http\Models;

use DenizTezcan\SendCloud\Http\Traits\FindOne;

class Label extends Model
{
    use FindOne;

    protected $fillable = [
        'normal_printer',
        'label_printer',
    ];

    protected $url = 'labels';

    protected $namespaces = [
        'singular' => 'label',
        'plural'   => 'labels',
    ];

    /**
     * Returns the label content (PDF) in A6 format.
     *
     * @return string
     */
    public function labelPrinterContent()
    {
        $url = str_replace($this->connection->apiUrl(), '', $this->label_printer);

        return $this->connection->download($url);
    }

    /**
     * Returns the label content (PDF) in A4 format.
     *
     * @return string
     */
    public function normalPrinterContent()
    {
        $download_arr = [];

        foreach ($this->normal_printer as $normalprinter) {
            $url = str_replace($this->connection->apiUrl(), '', $normalprinter);
            $download_arr[] = $this->connection->download($url);
        }

        return $download_arr;
    }
}
