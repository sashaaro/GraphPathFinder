<?php

namespace Sashaaro\GraphPathFinder;

/**
 * Class ArrayNodeFinder
 * @author Alexandr Arofikin <sashaaro@gmail.com>
 */
class ArrayNodeFinder implements NodeFinderInterface
{
    /**
     * @var array
     */
    private $graph;

    /**
     * @param array $graph
     * @example
     * [
     *        1 => [2, 3, 8], key is node and this array of parent nodes
     *        2 => [1, 3, 4, 6],
     *        3 => [1, 2, 4, 5, 6],
     *        4 => [2, 3, 5],
     *      ...
     *    ];
     */
    public function __construct(array $graph)
    {
        $this->graph = $graph;
    }

    /**
     * @param string|int $node
     * @return array
     */
    public function findNodes($node)
    {
        if (array_key_exists($node, $this->graph)) {
            return $this->graph[$node];
        } else {
            return [];
        }
    }

    public function doEntire()
    {
        foreach ($this->graph as $node => $nodes) {
            foreach ($nodes as $n) {
                if (!array_key_exists($n, $this->graph) || !is_array($this->graph[$n])) {
                    $this->graph[$n] = [];
                }
                if (!array_search($node, $this->graph[$n])) {
                    $this->graph[$n][] = $node;
                }
            }
        }
    }
} 
