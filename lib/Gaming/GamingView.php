<?php
namespace Gaming;
/**
 * Created by PhpStorm.
 * User: dell-
 * Date: 2017/6/9
 * Time: 12:46
 */
class GamingView
{

    private $gaming;	// Gaming object
    /** Constructor
     * @param $gaming game object */
    public function __construct(Gaming $gaming) {
        $this->gaming = $gaming;
    }

    public function presentgame() {
        return $this->presenthead() .
            $this->presentbody() .
            $this->presentbutton() .
            $this->presentfoot();
    }


    /**
     * Create the HTML we present
     * @return string HTML to present
     */

    public function presenthead(){
        $htmlgame = <<<HTML
<header>
    <form method="post" action="game-post.php">
    <p class="imgcenter"><img src="nifty800.png" width="800" height="140" alt="header"></p>
    <nav>
        <p class = "buttonright"><a class="setcolor" href="index.php">NEW GAME</a>
            <a class="setcolor" href="instructions.php">INSTRUCTIONS</a></p>
    </nav>
    </form>
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


    public function presentbody()
    {

        $htmlgame = <<<HTML

<div class="articles">

    <form class="nongreen" method="post" action="game-post.php">
        <div class="centerboxgame">
HTML;
        $table = $this->gaming->gettable();
        $htmlgame .= '<table>';


        for ($i = 0; $i < $this->gaming->gettablesize(); $i++) {
            $htmlgame .= '<tr>';
            for ($j = 0; $j < $this->gaming->gettablesize(); $j++) {

                if ($table[$i][$j] == Cell::BLANK) {
                    $htmlgame .= '<td class="cell none"><button name="cell" value="' . $i . ',' . $j . '"><p class="changsize">&nbsp;</p></button></td>';
                } else if ($table[$i][$j] == Cell::ISLAND) {
                    $htmlgame .= '<td class="cell none"><button name="cell" value="' . $i . ',' . $j . '"><p class="changsize">&#9679;</p></button></td>';
                } else if ($table[$i][$j] == Cell::SEA) {
                    $htmlgame .= '<td class="cell2 none"><button class ="blue" name="cell" value="' . $i . ',' . $j . '"><p class="changsize">&nbsp;</p></button></td>';
                } else if ($table[$i][$j] == Cell::REDISLAND) {
                    $htmlgame .= '<td class="cell3 none"><button name="cell" value="' . $i . ',' . $j . '"><p class="changsize">&#9679;</p></button></td>';
                } else if ($table[$i][$j] == Cell::REDSEA) {
                    $htmlgame .= '<td class="cell3 none"><button name="cell" value="' . $i . ',' . $j . '"><p class="changsize">&nbsp;</p></button></td>';
                } else {
                    $htmlgame .= '<td class="cell none"><button name="cell" value="' . $i . ',' . $j . '"><p class="changsize">' . $table[$i][$j] . '</p></button></td>';
                }

            }
            $htmlgame .= '</tr>';
        }
        $htmlgame .= '</table>';
        return $htmlgame;

    }

    public function presentbutton()
    {
    if ($this->gaming->getsolve() == true){

        $htmlgame = <<<HTML
        <p class="centerbutton">
                <input type="submit" class = "pressname" name="solveyes" value="Yes">
                <input type="submit" class="pressname" name="solveno" value="No">             
        </p>
        <p class="message">Are you sure you want to solve?</p>

HTML;

    }
    else if ($this->gaming->getclear() == true){
        $htmlgame = <<<HTML
        <p class="centerbutton">
                <input type="submit" class = "pressname" name="clearyes" value="Yes">
                <input type="submit" class="pressname" name="clearno" value="No">             
        </p>
        <p class="message">Are you sure you want to clear?</p>

HTML;


    }

    else {

        $htmlgame = <<<HTML
            <p class="centerbutton">
                <input type="submit" class = "pressname" name="check" value="Check Solution">
                <input type="submit" class="pressname" name="solve" value="Solve">
                <input type="submit" class = "pressname"  name="clear" value="Clear">
            </p>
HTML;
        }

        if (isset($_SESSION['user'])){
            //$game = new Games($this->gaming);



            $htmlgame .= <<<HTML
        </div>
    </form>
         
        <form class="nongreen" method="post" action="post/save_load.php">
        <div class="centerboxgame">            
            <p class="centerbutton">
                <input type="submit" class = "pressname" name="save" value="Save Game">
                <input type="submit" class="pressname" name="load" value="Load Game">
            </p>
        </div>
    </form>
</div>             
        
            
HTML;
        }

        else{
            $htmlgame .= <<<HTML

        </div>
    </form>

</div>
HTML;

        }



        return $htmlgame;
    }



}