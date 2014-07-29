<?php

namespace GraphPathFinder;

/**
 * Interface INodeFinder
 * @package GraphPathFinder
 */
interface INodeFinder
{
    /**
     * @param string|int $node
     * @return array
     */
    public function findNodes($node);
} 