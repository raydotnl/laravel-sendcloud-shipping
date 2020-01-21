<?php

namespace DenizTezcan\SendCloud\Http\Traits;

trait Multiple
{
	public function saveMultiple(array $models)
	{
		$resultModels = [];
		$results = $this->insertMultiple($models);
		foreach ($results[$this->namespaces['plural']] as $result)
		{
			$resultModels[] = new static($this->connection(), $result);
		}
		return $resultModels;
	}

	public function insertMultiple(array $models)
	{
		$json = [];
		$json[$this->namespaces['plural']] = [];
		foreach ($models as $model)
		{
			$json[$this->namespaces['plural']][] = $model->attributes();
		}
		return $this->connection()->post($this->url, json_encode($json));
	}
}