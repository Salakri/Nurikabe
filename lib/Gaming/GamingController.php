<?php

namespace Gaming;

/**
 * Created by PhpStorm.
 * User: dell-
 * Date: 2017/6/9
 * Time: 12:47
 */
class GamingController
{
    private $reset = false;
    private $gaming;
    private $page="game.php";

    public function __construct(Gaming $game, $post){
        $this->gaming = $game;

        if(isset($post['solve'])) {
            $this->gaming->setsolve(true);
            $this->gaming->setback();
        }
        else {
            $this->gaming->setsolve(false);
        }


        if (isset($post['solveyes'])){
            $this->gaming->solvegame();
            $this->gaming->setsolve(false);
            $this->page = "solved.php";
        }

        if (isset($post['solveno'])){
            $this->gaming->setsolve(false);
        }

        if(isset($post['clear'])) {
            $this->gaming->setclear(true);
            $this->gaming->setback();
        }
        else {
            $this->gaming->setclear(false);
        }

        if (isset($post['clearyes'])){
            $this->gaming->setclear(false);
            $this->gaming->createarray();
        }

        if (isset($post['clearno'])){
            $this->gaming->setclear(false);
        }

        if(isset($post['newgame'])) {
            $this->gaming->createarray();
        }


        if(isset($post['cell'])) {
            $split = explode(',', strip_tags($post['cell']));
            $i = intval($split[0]);
            $j = intval($split[1]);
            $this->gaming->setcell($i, $j);
            if ($this->gaming->compare() == true){
                $this->page = "solved.php";
            }
        }

        if (isset($post['check'])){
            $this->gaming->check();
            $this->gaming->setcheko(true);

        }
        else {
            $this->gaming->setback();
            $this->gaming->setcheko(false);
        }


    }


    /**
     * Debug option to display the redirect page instead of redirecting to it.
     * @return string HTML
     */
    public function showRedirect() {
        return "<p><a href=\"$this->redirect\">$this->redirect</a>";
    }

    public function isReset(){

        return $this->reset;
    }

    public function getRedirect(){
        return $this->page;
    }


}