<?php

namespace Market\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;
use Zend\Db\Sql\Expression;
use Zend\Db\Sql\Where;

class ListingsTable extends TableGateway
{
    public static $tableName = 'listings';
    
    public function getListingsByCategory() 
    {        
        return $this->select();
    }
    
    public function getListingById($itemId)
    {        
        $rowSet = $this->select(array('listings_id' => $itemId));
        
        return $rowSet->current();
    }
    
    public function getMostRecentListing() 
    {
        $select = new Select();
        $select->from(self::$tableName);        
        $subquery = new Select();
        $subquery->from(self::$tableName)
                    ->columns([new Expression('max(`listings_id`)')]);
        
        $where = new Where();
        $where->in('listings_id', $subquery);
        
        $select->where($where);
        
        return $this->selectWith($select)
                ->current();
    }
    
    public function addPosting(array $data)
    {        
        unset($data['submit']);
        $data['country'] = $data['city_code']->country;
        $data['city'] = $data['city_code']->city;
        unset($data['city_code']);
        
        $dateExpires = new \DateTime();        
        $interval = new \DateInterval("P{$data['date_expires']}D");        
        $dateExpires->add($interval);
        $data['date_expires'] = $dateExpires->format('Y-m-d H:i:s');
        
        $this->insert($data);
    }
    
    public function deleteByDeleteCode($listingId, $deleteCode)
    {
        $this->delete([
           'delete_code'  => $deleteCode,
            'listings_id' => $listingId
        ]);
    }
}
