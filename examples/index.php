<?php


require_once(__DIR__.'/../src/GraphPathFinder/INodeFinder.php');
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
    [3, 4, 6, 7],
    [2, 3, 5],
    [5],
    [1]
];

$finder = new \GraphPathFinder\GraphPathFinder(2, 5, null, $graph);

$findPath = $finder->find(false, 3);
echo '<body>';
$render = new \GraphPathFinder\GraphRenderer();
$render->render($graph, $findPath->getNodes());
echo '</body>';
?>
