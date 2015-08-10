<?php

namespace Sashaaro\GraphPathFinder;

/**
 * Interface NodeFinderInterface
 * @package GraphPathFinder
 */
interface NodeFinderInterface
{
    /**
     * Find parents (neighbor nodes)
     * @param string|int $node
     * @return array
     */
    public function findNodes($node);
} 
