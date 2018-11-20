<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

class Filter
{
    public $range;
    public $promo;
    public $bestOffer;
    public $phones;
    public $colors;
    public $types;
    public $materials;
    public $tags;
}
