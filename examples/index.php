<?php


require_once(__DIR__.'/../src/GraphPathFinder/NodeFinderInterface.php'); //TODO autoload
foreach (glob(__DIR__.'/../src/GraphPathFinder/*.php') as $filename)
{
    require_once $filename;
}

foreach(\GraphPathFinder\GraphRenderer::getJsPaths() as $js)
    echo '<script type="text/javascript" src="'.$js.'"></script>';

foreach(\GraphPathFinder\GraphRenderer::getCSSPaths() as $css)
    echo '<link rel="stylesheet" href="'.$css.'" type="text/css" />';

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
$nodeFinder = new ArrayNodeFinder($graph);

$finder = new \GraphPathFinder\GraphPathFinder(2, 7, $nodeFinder);

$findPath = $finder->find(false);
echo '<body>';
$render = new \GraphPathFinder\GraphRenderer();
if($findPath)
    $render->render($graph, $findPath->getNodes());
echo '</body>';
?>
