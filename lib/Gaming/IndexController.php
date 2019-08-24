<?php
/**
 * Created by PhpStorm.
 * User: dell-
 * Date: 2017/6/10
 * Time: 14:47
 */

namespace Gaming;


class IndexController
{

    private $reset = false;

    private $gaming;
    private $page="game.php";

    public function __construct(Gaming $game, $post)
    {
        $this->gaming = $game;
        $this->gaming->setinvalidnameback();

        if (isset($post['selectb'])) {
            $this->gaming->setsize($post['selectb']);
        }

        if (isset($post['name'])) {

            if ($post['name'] != "") {
                $this->gaming->setname(strip_tags($post['name']));
                $_SESSION['name'] = strip_tags($post['name']);

            } else {
                $this->gaming->setinvalidname();
                $this->page = 'index.php';

            }
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