<?php

namespace DenizTezcan\SendCloud\Http\Traits;

trait FindAll
{
    public function all($params = [])
    {
        $result = $this->connection()->get($this->url, $params);

        return $this->collectionFromResult($result);
    }

    public function collectionFromResult($result)
    {
        $collection = [];

        foreach ($result[$this->namespaces['plural']] as $r) {
            $collection[] = new self($this->connection(), $r);
        }

        return $collection;
    }
}
