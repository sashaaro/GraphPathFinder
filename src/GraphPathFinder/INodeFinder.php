<?php
/**
 * Created by PhpStorm.
 * User: Sasha
 * Date: 29.07.14
 * Time: 8:41
 */

namespace GraphPathFinder;


interface INodeFinder
{
    public function findCloseNodes($node);
} 