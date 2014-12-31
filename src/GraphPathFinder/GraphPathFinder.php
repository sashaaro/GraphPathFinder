<?php

namespace GraphPathFinder;

/**
 * Class GraphPathFinder
 * @package GraphPathFinder
 *
 * @author Alexandr Arofikin <sashaaro@gmail.com>
 */
class GraphPathFinder
{
    /**
     * @var int
     */
    protected $start;

    /**
     * @var int
     */
    protected $end;


    /**
     * @var NodeFinderInterface|null
     */
    protected $finder;

    /**
     * @var GraphPath[]
     */
    public $paths = [];

    /**
     * @var int
     */
    protected $maxStep;


    public function __construct($start, $end, NodeFinderInterface $finder = null, $checkIntegrity = true)
    {
        $this->start = $start;
        $this->end = $end;
        $this->finder = $finder;
    }

    public function find($all = false, $maxStep = 100)
    {
        if(!is_int($maxStep) || $maxStep < 1)
            throw new \Exception("maxStep invalid..is not integer or less than 1");

        $this->paths = [];
        $this->maxStep = $maxStep;

        $startPath = new GraphPath();
        $startPath->addNode($this->start);

        if($this->end != $this->start)
            $this->recursiveFind($this->start, $startPath);
        else
            $this->paths[] = clone($startPath);

        if(!$all){
            $result = [];
            $step = $maxStep;
            foreach($this->paths as $path)
                if(count($path->getNodes()) < $step){
                    $result = $path;
                    $step = count($path->getNodes());
                }elseif(count($path->getNodes()) == $step)
                    $result = $path;
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
        $nodes = $this->finder->findNodes($start);

        foreach($nodes as $n){
            if(in_array($n, $path->getNodes()) || count($path->getNodes()) -1 >= $this->maxStep)
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
