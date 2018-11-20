<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Search
 */
class Search
{

    /**
     * @var string
     */
    private $search;

    /**
     * @var string
     */
    private $type = "site";

    /**
     * Set search
     *
     * @param string $search
     *
     * @return Search
     */
    public function setSearch($search)
    {
        $this->search = $search;

        return $this;
    }

    /**
     * Get search
     *
     * @return string
     */
    public function getSearch()
    {
        return $this->search;
    }
    /**
     * Set type
     *
     * @param string $type
     *
     * @return Search
     */
    public function setType($type)
    {
        $types = array('site','artikul','news');
        if(in_array($type, $types))
            $this->type = $type;
        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
}
