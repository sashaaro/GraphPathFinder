<?php

/**
 * Class GraphPathFinderTest
 */
class GraphPathFinderTest extends PHPUnit_Framework_TestCase
{
    public function testFindOne()
    {
        $graph = [
            1 => [2, 3, 8],
            2 => [1, 3, 4, 6],
            3 => [1, 2, 4, 5, 6],
            4 => [2, 3, 5],
            5 => [3, 4, 6, 7, 9],
            6 => [2, 3, 5],
            7 => [5],
            8 => [1],
            9 => [5]
        ];

        $nodeFinder = new \Sashaaro\GraphPathFinder\ArrayNodeFinder($graph);
        $finder = new \Sashaaro\GraphPathFinder\GraphPathFinder(2, 7, $nodeFinder);
        /** @var \Sashaaro\GraphPathFinder\GraphPath $findPath */
        $findPath = $finder->findOne();
        $this->assertEquals($findPath->getNodes(), [2, 6, 5, 7]);
    }
}
 