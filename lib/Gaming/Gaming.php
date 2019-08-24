<?php
namespace Gaming;
/**
 * Created by PhpStorm.
 * User: dell-
 * Date: 2017/6/8
 * Time: 19:02
 */
class Gaming
{

    const MIN = 1;
    const MAX = 100;


    //

    private $name = "Charles"; // name of the game
    private $size  = 0; //size of the game
    //size: "3" for 3x3E "8" for 8x8E "10"for 10x10E "18" for 8x8M
    private $table;
    private $tablesize = null;
    private $invalidname = false;

    private $checko = false;
    private $solve = false;
    private $clear = false;

    public function __construct($seed = null) {
        if($seed === null) {
            $seed = time();
        }

        srand($seed);

    }

    public function setinvalidname(){
        $this->invalidname = true;
    }

    public function setinvalidnameback(){
        $this->invalidname = false;
    }

    public function getinvalidname(){
        return $this->invalidname;
    }

    public function setname($a)
    {
        $this->name = $a;
        $this->invalidname = false;

    }

    public function setsize($b){
        $this->size = $b;
        $this->createarray();
    }

    public function setcell($i, $j){
        $this->checko = false;
        if ($this->table[$i][$j] == Cell::BLANK){
            $this->table[$i][$j] =  Cell::SEA;
        }
        else if ($this->table[$i][$j] ==  Cell::SEA){
            $this->table[$i][$j] = Cell::ISLAND;
        }
        else if ($this->table[$i][$j] == Cell::ISLAND){
            $this->table[$i][$j] = Cell::BLANK;
        }
        else if ($this->table[$i][$j] == Cell::REDISLAND){
            $this->table[$i][$j] = Cell::BLANK;
        }
        else if ($this->table[$i][$j] == Cell::REDSEA){
            $this->table[$i][$j] = Cell::ISLAND;
        }

    }

    public function getname(){

        return $this->name;
    }

    public function getsize(){
        return $this->size;
    }

    public function gettablesize(){
        return $this->tablesize;
    }
    public function gettable(){
        return $this->table;
    }

    public function settable($t){
        $this->table = $t;
    }

    public function setback(){
        $this->checko = false;
        for ($i=0; $i<$this->tablesize;$i++){
            for ($j=0; $j<$this->tablesize;$j++){
                if ($this->table[$i][$j] == Cell::REDISLAND){
                    $this->table[$i][$j] = Cell::ISLAND;
                }
                else if ($this->table[$i][$j] == Cell::REDSEA){

                    $this->table[$i][$j] = Cell::SEA;
                }
            }
        }

    }

    public function check(){
        $this->checko = true;
        if ($this->size == '3x3 Ultra Easy'){
            $correct = Cell::table_3x3;
        }
        else if ($this->size == '8x8 Very Easy'){
            $correct = Cell::table_8x8;
        }

        else if ($this->size == '10x10 Easy'){
            $correct = Cell::table_10x10;
        }
        else if ($this->size == '8x8 Medium'){
            $correct = Cell::table_8x8_m;
        }

        for ($i=0; $i<$this->tablesize;$i++){
            for ($j=0; $j<$this->tablesize;$j++){
                if ($this->table[$i][$j] == Cell::ISLAND && $correct[$i][$j] != Cell::ISLAND){
                    $this->table[$i][$j] = Cell::REDISLAND;
                }
                else if ($this->table[$i][$j] == Cell::SEA && $correct[$i][$j] != Cell::SEA){
                    $this->table[$i][$j] = Cell::REDSEA;
                }
            }
        }

    }

    public function compare(){
        if ($this->size == '3x3 Ultra Easy'){
            $correct = Cell::table_3x3;
        }
        else if ($this->size == '8x8 Very Easy'){
            $correct = Cell::table_8x8;
        }

        else if ($this->size == '10x10 Easy'){
            $correct = Cell::table_10x10;
        }
        else if ($this->size == '8x8 Medium'){
            $correct = Cell::table_8x8_m;
        }

        for ($i=0; $i<$this->tablesize;$i++){
            for ($j=0; $j<$this->tablesize;$j++){
                if ($this->table[$i][$j] != $correct[$i][$j]){
                    return false;
                }
            }
        }
        return true;
    }

    public function getchecko(){
        return $this->checko;
    }
    public function setcheko($a){
        $this->checko = $a;
    }

    public function setclear($a){
        $this ->clear = $a;
    }
    public function getclear(){
        return $this->clear;
    }

    public function setsolve($a){
        $this ->solve = $a;
    }
    public function getsolve(){
        return $this->solve;
    }
    public function solvegame(){
        if ($this->size == '3x3 Ultra Easy'){
            $this->table = Cell::table_3x3;
        }
        else if ($this->size == '8x8 Very Easy'){
            $this->table = Cell::table_8x8;
        }

        else if ($this->size == '10x10 Easy'){
            $this->table = Cell::table_10x10;
        }
        else if ($this->size == '8x8 Medium'){
            $this->table = Cell::table_8x8_m;
        }

    }


    //size: "3" for 3x3E "8" for 8x8E "10"for 10x10E "18" for 8x8M
    public function createarray(){
        if ($this->size == '3x3 Ultra Easy'){
            $this->tablesize = 3;
            $this->table = [
                [1, Cell::BLANK, 1],
                [Cell::BLANK, Cell::BLANK, Cell::BLANK],
                [2, Cell::BLANK, Cell::BLANK]
            ];

        }
        else if ($this->size == '8x8 Very Easy'){
            $this->tablesize = 8;
            $this->table =[
                [Cell::BLANK, Cell::BLANK, 2, Cell::BLANK, Cell::BLANK, Cell::BLANK, Cell::BLANK, Cell::BLANK],
                [Cell::BLANK, 1, Cell::BLANK, Cell::BLANK, Cell::BLANK, 4, Cell::BLANK, Cell::BLANK],
                [Cell::BLANK, Cell::BLANK, Cell::BLANK, Cell::BLANK, 2, Cell::BLANK, Cell::BLANK, Cell::BLANK],
                [Cell::BLANK, 2, Cell::BLANK, Cell::BLANK, Cell::BLANK, Cell::BLANK, Cell::BLANK, Cell::BLANK],
                [4, Cell::BLANK, Cell::BLANK, Cell::BLANK, Cell::BLANK, 2, Cell::BLANK, Cell::BLANK],
                [Cell::BLANK, Cell::BLANK, Cell::BLANK, Cell::BLANK, Cell::BLANK, Cell::BLANK, Cell::BLANK, Cell::BLANK],
                [Cell::BLANK, Cell::BLANK, Cell::BLANK, 3, Cell::BLANK, Cell::BLANK, Cell::BLANK, 3],
                [Cell::BLANK, Cell::BLANK, Cell::BLANK, Cell::BLANK, Cell::BLANK, 3, Cell::BLANK, Cell::BLANK]

            ];
        }


        else if ($this->size == '10x10 Easy'){
            $this->tablesize = 10;
            $this->table =[
                [4, Cell::BLANK, Cell::BLANK, Cell::BLANK, Cell::BLANK, Cell::BLANK, Cell::BLANK, Cell::BLANK, Cell::BLANK, 1],
                [Cell::BLANK, Cell::BLANK, Cell::BLANK, Cell::BLANK, Cell::BLANK, Cell::BLANK, Cell::BLANK, Cell::BLANK, Cell::BLANK, 1],
                [Cell::BLANK, Cell::BLANK, Cell::BLANK, Cell::BLANK, Cell::BLANK, Cell::BLANK, 3, Cell::BLANK, 3, Cell::BLANK],
                [Cell::BLANK, 2, Cell::BLANK, 3, Cell::BLANK, Cell::BLANK, Cell::BLANK, Cell::BLANK, Cell::BLANK, Cell::BLANK],
                [1, Cell::BLANK, Cell::BLANK, Cell::BLANK, 4, Cell::BLANK, Cell::BLANK, 3, Cell::BLANK, Cell::BLANK],
                [Cell::BLANK, Cell::BLANK, 2, Cell::BLANK, Cell::BLANK, Cell::BLANK, Cell::BLANK, Cell::BLANK, Cell::BLANK, 5],
                [Cell::BLANK, Cell::BLANK, Cell::BLANK, Cell::BLANK, Cell::BLANK, Cell::BLANK, Cell::BLANK, Cell::BLANK, Cell::BLANK, Cell::BLANK],
                [Cell::BLANK, Cell::BLANK, Cell::BLANK, 1, Cell::BLANK, Cell::BLANK, Cell::BLANK, Cell::BLANK, Cell::BLANK, Cell::BLANK],
                [Cell::BLANK, Cell::BLANK, 4, Cell::BLANK, Cell::BLANK, 3, Cell::BLANK, Cell::BLANK, Cell::BLANK, Cell::BLANK],
                [Cell::BLANK, Cell::BLANK, Cell::BLANK, Cell::BLANK, 2, Cell::BLANK, Cell::BLANK, Cell::BLANK, Cell::BLANK, Cell::BLANK]
            ];


        }
        else if ($this->size == '8x8 Medium'){
            $this->tablesize = 8;
            $this->table =[
                [Cell::BLANK, Cell::BLANK, Cell::BLANK, Cell::BLANK, Cell::BLANK, Cell::BLANK, Cell::BLANK, Cell::BLANK],
                [2, Cell::BLANK, Cell::BLANK, Cell::BLANK, Cell::BLANK, Cell::BLANK, Cell::BLANK, Cell::BLANK],
                [Cell::BLANK, 4, Cell::BLANK, Cell::BLANK, Cell::BLANK, Cell::BLANK, Cell::BLANK, Cell::BLANK],
                [Cell::BLANK, Cell::BLANK, Cell::BLANK, Cell::BLANK, 2, Cell::BLANK, Cell::BLANK, 6],
                [Cell::BLANK, Cell::BLANK, Cell::BLANK, 2, Cell::BLANK, Cell::BLANK, Cell::BLANK, Cell::BLANK],
                [Cell::BLANK, 2, Cell::BLANK, Cell::BLANK, Cell::BLANK, Cell::BLANK, Cell::BLANK, Cell::BLANK],
                [5, Cell::BLANK, Cell::BLANK, Cell::BLANK, 4, Cell::BLANK, Cell::BLANK, Cell::BLANK],
                [Cell::BLANK, Cell::BLANK, Cell::BLANK, Cell::BLANK, Cell::BLANK, Cell::BLANK, Cell::BLANK, Cell::BLANK]
            ];



        }
    }


}