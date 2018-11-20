<?php

namespace ApiBundle\Entity;
/**
 * OrderAddItem
 *
 */
class OrderAddItem
{
    public $vendor;
    public $phone;
    public $pattern;
    public $category;
    private $items;
    public function __construct(array $arr = []){
        if(isset($arr['vendor']))$this->vendor=$arr['vendor'];
        if(isset($arr['phone']))$this->phone = $arr['phone'];
        if(isset($arr['pattern']))$this->pattern = $arr['pattern'];
        if(isset($arr['category']))$this->category = $arr['category'];
        (isset($arr['items']))?$this->items = $arr['items']:new \Doctrine\Common\Collections\ArrayCollection();
    }
    public function addItem(\ApiBundle\Entity\OrderAddItemElement $item)
    {
        $this->items[] = $item;
        return $this;
    }
    public function removeItem(\ApiBundle\Entity\OrderAddItemElement $item)
    {
        $this->items->removeElement($item);
    }
    public function getItems()
    {
        return $this->items;
    }
    public function setItems($items){
        $this->items = $items;
    }
}
