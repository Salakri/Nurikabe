<?php
/**
 * Created by PhpStorm.
 * User: dell-
 * Date: 2017/6/10
 * Time: 21:21
 */

namespace Gaming;


class InstructionView
{

    private $gaming;	// Gaming object
    /** Constructor
     * @param $gaming game object */
    public function __construct(Gaming $gaming) {
        $this->gaming = $gaming;
    }

    public function presentinstruc() {
        return $this->presenthead() .
            $this->presentbody() .
            $this->presentfoot();
    }

    public function presenthead(){
        if ($this->gaming->gettablesize() == null){
            $htmlgame = <<<HTML
<header>
    
    <p class="imgcenter"><img src="nifty800.png" width="800" height="140" alt="header"></p>
    <nav>
        <p class = "buttonright"><a class="setcolor" href="index.php">NEW GAME</a>
            </p>
    </nav>
    <h1>Nifty Nurikabe Instructions</h1>
</header>
            
HTML;
        }
        else {

            $htmlgame = <<<HTML
<header>
    <p class="imgcenter"><img src="nifty800.png" width="800" height="140" alt="header"></p>
    <nav>
        <p class = "buttonright"><a class="setcolor" href="index.php">NEW GAME</a>
            <a class="setcolor" href="game.php" name="return">RETRUN TO GAME</a></p>
    </nav>
    <h1>Nifty Nurikabe Instructions</h1>
</header>
HTML;
        }
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
    <div class="instrucbox">

            <p class="imgcenter"><img src="example1.png" width="411" height="411" alt="example"></p>
            <p class="instrcthick">Rules</p>

            <p class="txt">The game of Nurikabe is played on a rectangular grid of cells. Some cells contain numbers. When the game begins, all cells, other than the numbered cells, are empty, which is indicated by a cell filled with white. Game play consists of setting each cell to either an island or the sea.</p>
            <p class="txt">Islands are indicated by either cells with a number in them or cells with a dot. Every island has exactly one numbered cell that indicates how many cells there are in that island. Cells in an island are all connected horizontally or vertically.</p>
            <p class="txt">The sea is colored blue. A cell that is set to be part of the sea is filled with blue. There are two rules about the:</p>
            <div class = "txt">
                <ol>
                    <li>The sea is contiguous, meaning every sea cells is adjacent horizontally or vertically to another sea cell.</li>
                    <li>No "pools" are allowed. A pool is a 2 by 2 area of sea.</li>
                </ol>
            </div>
            <p class="txt">Nurikabe solutions are unique. There is only one possible solution to any given game.</p>
            <p class="instrcthick">How to Play</p>

            <p class="txt">Game play proceeds by clicking on cells. Each click toggles a cell from empty to sea to island. For example, if an empty cell is clicked on, it becomes sea. If sea is clicked on, it becomes an island. If an island cell is clicked on, it becomes empty. Cells with numbers in them are automatically island cells and are not clickable at all.</p>
            <p class="instrcthick">Links</p>
            <div class="txtdot">
                <ul>
                    <li><a class ="setins" href="https://en.wikipedia.org/wiki/Nurikabe">Wikipedia page on Nurikabe</a></li>
                    <li><a class ="setins" href="http://dl.acm.org/citation.cfm?id=2362108">Computational Complexity of Nurikabe</a></li>
                </ul>
            </div>

    </div>


</div>

HTML;
        return $htmlgame;

    }

}