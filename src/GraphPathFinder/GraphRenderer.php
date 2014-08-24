<?php

namespace GraphPathFinder;


class GraphRenderer
{
    public $nodeClass = 'node';

    public $colorLines = 'C53725';

    public $colorPath = '629833';

    /**
     * @var string|null
     */
    public $itemView;

    public function render(array $graph, array $findPath = null, $processOutput = false)
    {
        if($this->itemView && !is_file($this->itemView))
            throw new \Exception('property itemView is not file');

        $output = '';
        $renderNodes = [];
        foreach($graph as $k => $path) {
            foreach($path as $i => $node){
                if(!in_array($node, $renderNodes)){
                    $output .= '<div class="'.$this->nodeClass.'" id="node'.$node.'" style="margin-top:'.(($k + 1)*15).'px; margin-left: '.(($i + 1)*100 - rand(5,40)).'px">'.
                        ($this->itemView ? include($this->itemView) : $node).
                        '</div>';
                    $renderNodes[] = $node;
                }
            }
        }
        $output .= '<div id="lines"></div>';

        if($findPath)
            $findPath = array_flip($findPath);
        $buildLine = [];
        $output .= '<script>';
        foreach($graph as $k => $path) {
            foreach($path as $node){
                if(in_array($k.$node, $buildLine))
                    continue;

                $output .= 'connect(document.getElementById("node'.$node.'"), document.getElementById("node'.$k.'")'.
                    ($findPath && array_key_exists($node, $findPath) && array_key_exists($k, $findPath) && abs($findPath[$node] - $findPath[$k]) == 1 ? ', "'.$this->colorPath.'"' : ', "'.$this->colorLines.'"') .');';
                $buildLine[] = $node.$k;
            }
        }
        $output .= '</script>';


        if($processOutput)
            echo $output;
        else
            return $output;
    }

    /**
     * @return array
     */
    public static function getJsPaths()
    {
        return ['http://localhost/symfony/GraphPathFinder/src/GraphPathFinder/assets/graph.js'];
        //return [__FILE__.'/assets/graph.js'];
    }

    /**
     * @return array
     */
    public static function getCSSPaths()
    {
        return ['http://localhost/symfony/GraphPathFinder/src/GraphPathFinder/assets/graph.css'];
        //return [__FILE__.'/assets/graph.css'];
    }
} 