# GraphPathFinder #

Looking for the shortest way or all the way from the specified node to the end. You have override NodeFinderInterface, which find child nodes.

```php
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

$nodeFinder = new \GraphPathFinder\ArrayNodeFinder($graph);
$finder = new \GraphPathFinder\GraphPathFinder(2, 7, $nodeFinder);

/** @var \Sashaaro\GraphPathFinder\GraphPath $findPath Shortest path */
$findPath = $finder->findOne(); //[2, 6, 5, 7]

$render = new \GraphPathFinder\GraphRenderer();
$render->render($graph, $findPath->getNodes());
```

![example](https://raw.githubusercontent.com/sashaaro/GraphPathFinder/master/examples/1.png)

## Installation ##
Add package and repository to composer.json
```
"require": {
    ...
    "sashaaro/graph-path-finder": "*"
},
"repositories": [
    ....
    {
        "type": "vcs",
        "url": "https://github.com/sashaaro/GraphPathFinder"
    }
]
```

Composer update
