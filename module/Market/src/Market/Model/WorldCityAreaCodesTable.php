<?php

namespace Market\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;

class WorldCityAreaCodesTable extends TableGateway 
{

	public static $tableName = 'world_city_area_codes';


	public function getCodesForForm() 
	{
		$codes = $this->select();
		
		$array = [];
		
		foreach($codes as $code) {
			$array[$code->id] = "{$code->city},{$code->country}";
		}
		
		return $array;
	}
	
	public function getCodeById($id)
	{
		return $this->select(['id' => $id])
			->current();
	}

}
