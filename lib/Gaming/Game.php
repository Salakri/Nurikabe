<?php
/**
 * Created by PhpStorm.
 * User: dell-
 * Date: 2017/6/22
 * Time: 17:55
 */

namespace Gaming;


class Game
{

    private $id;
    private $userid;
    private $gamesize;
    private $game;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * @param mixed $userid
     */
    public function setUserid($userid)
    {
        $this->userid = $userid;
    }

    /**
     * @return mixed
     */
    public function getGamesize()
    {
        return $this->gamesize;
    }

    /**
     * @param mixed $gamesize
     */
    public function setGamesize($gamesize)
    {
        $this->gamesize = $gamesize;
    }

    /**
     * @return mixed
     */
    public function getGame()
    {
        return $this->game;
    }

    /**
     * @param mixed $game
     */
    public function setGame($game)
    {
        $this->game = $game;
    }


    public function __construct($row) {
        $this->id = $row['id'];
        $this->userid = $row['userid'];
        $this->gamesize = $row['gamesize'];
        $this->game = $row['game'];
    }

}