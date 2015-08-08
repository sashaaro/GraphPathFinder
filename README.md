# GraphPathFinder

Looking for the shortest way or all the way from the specified node to the end. You have override NodeFinderInterface, which find child nodes.

```php
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
$render = new \GraphPathFinder\GraphRenderer();
$render->render($graph, $findPath->getNodes());
```