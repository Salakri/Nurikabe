<?php
/**
 * Created by PhpStorm.
 * User: dell-
 * Date: 2017/6/23
 * Time: 5:24
 */

namespace Gaming;


class SaveandloadController
{

    private $redirect;
    private $gaming;
    private $size;
    public function getRedirect()
    {
        return $this->redirect;
    }

    public function array_to_string($arr){
        $str = "";
        $str .= "[";
        $no_comma = $this->size - 1;
        for ($x = 0; $x < $this->size; $x++){
            $str .= "[";
            for ($y = 0; $y < $this->size; $y++){
                $str .= $arr[$x][$y];
                if ($y != $no_comma){
                    $str .= ",";
                }

            }
            $str .= "]";
            if ($x != $no_comma){
                $str .= ",";
            }

        }
        $str .= "]";
        return $str;
    }


    public function string_to_array($str){

        $str = substr($str, 1, -1);
        $r = array();
        $c = "";
        for($i=0; $i<strlen($str); $i++){
            if ($str[$i] == "["){
                $c = "";
            }
            else if ($str[$i] == "]"){
                array_push($r, $c);
                $c =  "";

            }

            else if ($str[$i] == "," && $str[$i-1] != "]"){
                array_push($r, $c);
                $c =  "";
            }
            else {
                $c .= $str[$i];
            }

        }
        $append_a = array();
        $table = array();
        $counter = 0;
        $table_each_c = $this->size;
        foreach ($r as &$value){
            $counter += 1;
            array_push($append_a, $value);
            if ($counter == $table_each_c){

                array_push($table, $append_a);
                $append_a = [];

                $counter = 0;
            }

        }
        return $table;
    }


    public function __construct(Gaming $game, Site $site, array $session, array $post)
    {

        $this->gaming = $game;
        $this->size = $this->gaming->gettablesize();
        $root = $site->getRoot();
        $this->redirect = "$root/game.php";
        if(isset($post['save'])){
            $user = $session[User::SESSION_NAME];
            $arr['id'] = 0;
            $arr['userid'] = $user->getId();
            $arr['gamesize'] = $this->gaming->getsize();

            $table  = $this->gaming->gettable();
            $str_table = self::array_to_string($table);
            $arr['game'] = $str_table;


            $new_game = new Game($arr);
            $games = new Games($site);

            /*echo "<pre>";
            print_r($str_table);
            echo "</pre>";*/


            $check = $games->getGame($new_game);


            if ($check != null){

                $new_game->setId($check->getId());
                $games->update($new_game);
                echo "update";

            }
            else {
                echo "add new";
                echo "<pre>";
            print_r($new_game);
            echo "</pre>";
                $games->insert($new_game);
            }

        }
        else if (isset($post['load'])){
            $user = $session[User::SESSION_NAME];
            $arr['id'] = 0;
            $arr['userid'] = $user->getId();
            $arr['gamesize'] = $this->gaming->getsize();

            $table  = $this->gaming->gettable();
            $str_table = self::array_to_string($table);
            $arr['game'] = $str_table;


            $new_game = new Game($arr);
            $games = new Games($site);

            /*echo "<pre>";
            print_r($str_table);
            echo "</pre>";*/

            $check = $games->getGame($new_game);

            if ($check != null){
                $load_str = $check->getGame();
                $load_table = self::string_to_array($load_str);
              echo "not null load";
            /*  echo "<pre>";
              print_r($load_table);

              echo "</pre>";
                echo "<pre>";

                print_r($load_str);
                echo "</pre>";*/
                $this->gaming->settable($load_table);

            }
            else {
                $this->gaming->createarray();
                $this->gaming->settable($this->gaming->gettable());

              echo "null!";
            }




        }
    }

}