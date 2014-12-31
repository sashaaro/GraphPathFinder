<?php
/**
 * Created by PhpStorm.
 * User: Sasha
 * Date: 02.08.14
 * Time: 0:19
 */

namespace GraphPathFinder;


class ArrayNodeFinder implements NodeFinderInterface
{
	private $graph;

	/**
	 * @param array $graph
	 * @example 
	 * [
	 *	    0 => [],
	 *	    1 => [2, 3, 8], key is node and this array of parent nodes
	 *	    2 => [1, 3, 4, 6],
	 *	    3 => [1, 2, 4, 5, 6],
	 *	    4 => [2, 3, 5],
	 *      ...
	 *	];
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
    	if(array_key_exists($start, $this->graph))
        	return $this->graph[$node];
        else 
        	return [];
    }

    public function checkEntire()
    {
        foreach($this->graph as $node => $nodes)
            foreach($nodes as $n){
                if(!array_key_exists($n, $this->paths) || !is_array($this->paths[$n]))
                    $this->paths[$n] = [];
                if(!array_search($node, $this->paths[$n]))
                    $this->paths[$n][] = $node;
            }
	}
} 
