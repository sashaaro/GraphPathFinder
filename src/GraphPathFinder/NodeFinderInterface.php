<?php

namespace GraphPathFinder;

/**
 * Interface NodeFinderInterface
 * @package GraphPathFinder
 */
interface NodeFinderInterface
{
    /**
     * @param string|int $node
     * @return array
     */
    public function findNodes($node);
} 
