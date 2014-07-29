<?php
/**
 * Created by PhpStorm.
 * User: Sasha
 * Date: 17.07.14
 * Time: 9:26
 */

namespace GraphPathFinder;


class GraphPath implements \ArrayAccess
{
    protected $nodes = [];

    public function addNode($node)
    {
        if(in_array($node, $this->nodes))
            throw new \Exception('this node already exist in path');

        $this->nodes[] = $node;
    }


    /**
     * @return int
     */
    public function getDistance()
    {
        $distance = count($this->nodes) - 1;
        if($distance < 0)
            $distance = 0;

        return $distance;
    }


    /**
     * @return array
     */
    public function getNodes()
    {
        return $this->nodes;
    }



    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Whether a offset exists
     * @link http://php.net/manual/en/arrayaccess.offsetexists.php
     * @param mixed $offset <p>
     * An offset to check for.
     * </p>
     * @return boolean true on success or false on failure.
     * </p>
     * <p>
     * The return value will be casted to boolean if non-boolean was returned.
     */
    public function offsetExists($offset)
    {
        // TODO: Implement offsetExists() method.
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Offset to retrieve
     * @link http://php.net/manual/en/arrayaccess.offsetget.php
     * @param mixed $offset <p>
     * The offset to retrieve.
     * </p>
     * @return mixed Can return all value types.
     */
    public function offsetGet($offset)
    {
        // TODO: Implement offsetGet() method.
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Offset to set
     * @link http://php.net/manual/en/arrayaccess.offsetset.php
     * @param mixed $offset <p>
     * The offset to assign the value to.
     * </p>
     * @param mixed $value <p>
     * The value to set.
     * </p>
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        // TODO: Implement offsetSet() method.
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Offset to unset
     * @link http://php.net/manual/en/arrayaccess.offsetunset.php
     * @param mixed $offset <p>
     * The offset to unset.
     * </p>
     * @return void
     */
    public function offsetUnset($offset)
    {
        // TODO: Implement offsetUnset() method.
    }

    function __call($name, $arguments)
    {
        // TODO: Implement __call() method.
    }
}