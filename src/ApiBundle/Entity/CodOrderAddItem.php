<?php

namespace ApiBundle\Entity;
/**
 * OrderAddItem
 *
 */
class CodOrderAddItem
{
    public $text;
    public $items;
    public function __construct(array $arr = []){
        if(isset($arr['text']))$this->text = $arr['text'];
        (isset($arr['items']))?$this->items = $arr['items']:new \Doctrine\Common\Collections\ArrayCollection();
    }
}
