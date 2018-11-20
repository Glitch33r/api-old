<?php

namespace ApiBundle\Entity;
/**
 * OrderAddItem
 *
 */
class OrderAddItemElement
{
    public $add;
    public $phone;
    public $number=1;
    public $item;
    public $id;
    public function __construct(array $arr = []){
        if(isset($arr['id']))$this->id=$arr['id'];
        if(isset($arr['add']))$this->add=$arr['add'];
        if(isset($arr['item']))$this->item=$arr['item'];
        if(isset($arr['phone']))$this->phone = $arr['phone'];
        if(isset($arr['number']))$this->number = $arr['number'];
    }
}
