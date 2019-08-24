<?php
/**
 * Created by PhpStorm.
 * User: dell-
 * Date: 2017/6/10
 * Time: 20:42
 */

namespace Gaming;


class SolvedView
{
    private $gaming;	// Gaming object
    /** Constructor
     * @param $gaming game object */
    public function __construct(Gaming $gaming) {
        $this->gaming = $gaming;
    }

    public function presentsolved() {
        return $this->presenthead() .
            $this->presentbody() .
            $this->presentfoot();
    }

    public function presenthead(){
        $htmlgame = <<<HTML
<header>
    <p class="imgcenter"><img src="nifty800.png" width="800" height="140" alt="header"></p>
    <nav>
        <p class = "buttonright"><a class="setcolor" href="index.php">NEW GAME</a>
            <a class="setcolor" href="instructions.php">INSTRUCTIONS</a></p>
    </nav>
HTML;

        $htmlgame .= "<h1>Greetings, ". $this->gaming->getname() .", and welcome to Nifty Nurikabe!</h1>";



        $htmlgame .= <<<HTML
</header>     
HTML;
        return $htmlgame;

    }

    public function presentfoot(){
        $htmlgame = <<<HTML
<footer>
    <p class="imgcenter"><img src="nifty1-800.png" width="800" height="93" alt="footer"></p>
</footer>

HTML;
        return $htmlgame;
    }

    public function presentbody(){
        $htmlgame = <<<HTML
    
        <div class="articles">

    
        <div class="centerboxgame">
HTML;
        $tablesize = $this->gaming->gettablesize();
        $correct = [[]];
        if ($tablesize == '3x3 Ultra Easy'){
            $correct = Cell::table_3x3;
        }
        else if ($tablesize == '8x8 Very Easy'){
            $correct = Cell::table_8x8;
        }

        else if ($tablesize == '10x10 Easy'){
            $correct = Cell::table_10x10;
        }
        else if ($tablesize == '8x8 Medium'){
            $correct = Cell::table_8x8_m;
        }
        $table = $correct;

        $htmlgame .= '<table>';


        for ($i = 0; $i < $this->gaming->gettablesize(); $i++) {
            $htmlgame .= '<tr>';
            for ($j = 0; $j < $this->gaming->gettablesize(); $j++) {

                if ($table[$i][$j] == Cell::BLANK) {
                    $htmlgame .= '<td class="cell none"><button name="cell"><p class="changsize">&nbsp;</p></button></td>';
                } else if ($table[$i][$j] == Cell::ISLAND) {
                    $htmlgame .= '<td class="cell none"><button name="cell"><p class="changsize">&#9679;</p></button></td>';
                } else if ($table[$i][$j] == Cell::SEA) {
                    $htmlgame .= '<td class="cell2 none"><button class ="blue" name="cell" ><p class="changsize">&nbsp;</p></button></td>';
                } else {
                    $htmlgame .= '<td class="cell none"><button name="cell"><p class="changsize">' . $table[$i][$j] . '</p></button></td>';
                }


            }
            $htmlgame .= '</tr>';
        }
        $htmlgame .= '</table>';

        $htmlgame .= <<<HTML

            <p class="winnertxt">You're a winner!</p>

        </div>
   

</div>
HTML;
        return $htmlgame;

    }



}