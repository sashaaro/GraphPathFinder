<?php

namespace GraphPathFinder;

/**
 * Class GraphShortestPathFinder
 * @package Blog\Bundle\Lib
 */
class GraphPathFinder
{
    /**
     * @var array
     */
    protected $graph;

    /**
     * @var int
     */
    protected $start;

    /**
     * @var int
     */
    protected $end;


    protected $finder;

    /**
     * @var GraphPath[]
     */
    public $paths = [];


    public function __construct($start, $end, INodeFinder $finder = null, array $graph = [], $checkIntegrity = true)
    {
        if(is_null($finder) && empty($graph))
            throw new \Exception("no specified IFinderCloseNodes and graph empty");

        $this->graph = $graph;
        $this->start = $start;
        $this->end = $end;

        $this->finder = $finder;

        if($checkIntegrity){
            //TODO:
        }
    }

    public function find($all = false, $maxStep = 100)
    {
        $this->paths = [];

        $startPath = new GraphPath();
        $startPath->addNode($this->start);

        if($this->end != $this->start)
            $this->recursiveFind($this->start, $startPath);
        else
            $this->paths[] = clone($startPath);
        /*foreach($this->graph[$this->start] as  $node){
            $path = clone($startPath);

            if(in_array($node, $path->getNodes()))
                continue;

            $path->addNode($node);

            foreach($this->graph[$node] as $n){
                if(in_array($n, $path->getNodes()))
                    continue;

                $p = clone($path);
                $p->addNode($n);

                if($this->end != $n)
                    $this->recursiveFind($n, $p);
                else
                    $this->paths[] = clone($p);
            }
        }*/


        if(!$all){
            $result = [];
            $step = $maxStep;
            foreach($this->paths as $path)
                if(count($path->getNodes()) < $step){
                    $result = [$path];
                    $step = count($path->getNodes());
                }elseif(count($path->getNodes()) == $step)
                    $result[] = $path;
            return $result;
        }else
            return $this->paths;
    }


    /**
     * @param $start
     * @param $path
     */
    protected function recursiveFind($start, $path)
    {
        if(empty($this->graph)){
            $nodes = $this->finder->findCloseNodes($start);
        }elseif(array_key_exists($start, $this->graph))
            $nodes = $this->graph[$start];
        else $nodes = [];

        foreach($nodes as $n){
            if(in_array($n, $path->getNodes())) //TODO check lt $maxStep
                continue;
            $p = clone($path);
            $p->addNode($n);

            if($this->end != $n)
                $this->recursiveFind($n, $p);
            else
                $this->paths[] = clone($p);
        }
    }

} 