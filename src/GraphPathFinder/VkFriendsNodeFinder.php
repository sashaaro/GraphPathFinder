<?php
/**
 * Created by PhpStorm.
 * User: Sasha
 * Date: 02.08.14
 * Time: 0:19
 */

namespace GraphPathFinder;


class VkFriendsNodeFinder implements NodeFinderInterface
{
    /**
     * @param string|int $node
     * @return array
     */
    public function findNodes($node)
    {
        $nodes = json_decode(file_get_contents('https://api.vk.com/method/friends.get?user_id='.$node));
        return $nodes->response;
    }

} 
