<?php

namespace Sashaaro\GraphPathFinder;

/**
 * Class GraphPath
 * @author Alexandr Arofikin <sashaaro@gmail.com>
 */
class GraphPath implements \ArrayAccess, \Iterator
{
    /**
     * @var array
     */
    protected $nodes = [];

    public function addNode($node)
    {
        if (in_array($node, $this->nodes)) {
            throw new \Exception('this node already exist in path');
        }

        $this->nodes[] = $node;
    }

    public function current()
    {
        return current($this->nodes);
    }

    public function next()
    {
        return next($this->nodes);
    }

    public function key()
    {
        return key($this->nodes);
    }

    public function valid()
    {
        return key($this->nodes) !== null;
    }

    public function rewind()
    {
        reset($this->nodes);
    }

    /**
     * @return int
     */
    public function getDistance()
    {
        $distance = count($this->nodes) - 1;
        if ($distance < 0) {
            $distance = 0;
        }

        return $distance;
    }

    /**
     * @return array
     */
    public function getNodes()
    {
        return $this->nodes;
    }

    public function offsetExists($offset)
    {
        return array_key_exists($offset, $this->nodes);
    }

    public function offsetGet($offset)
    {
        return $this->offsetExists($offset) ? $this->nodes[$offset] : null;
    }

    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->nodes[] = &$value;
        } else {
            $this->
            nodes[$offset] = &$value;
        }

        return $value;
    }

    public function offsetUnset($offset)
    {
        if ($this->offsetExists($offset)) {
            unset($this->nodes[$offset]);
        }
    }
}