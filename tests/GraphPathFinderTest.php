<?php

class GraphPathFinderTest extends PHPUnit_Framework_TestCase
{
    public function testFind()
    {
        $graph = [
            [],
            [2, 3, 8],
            [1, 3, 4, 6],
            [1, 2, 4, 5, 6],
            [2, 3, 5],
            [3, 4, 6, 7, 9],
            [2, 3, 5],
            [5],
            [1],
            [5]
        ];

        $nodeFinder = new \GraphPathFinder\ArrayNodeFinder($graph);
        $finder = new \GraphPathFinder\GraphPathFinder(2, 7, $nodeFinder);

        $findPath = $finder->find(false);
        //$this->assertEquels($findPath, );
    }
}
 