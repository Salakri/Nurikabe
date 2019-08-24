<?php
/**
 * Created by PhpStorm.
 * User: dell-
 * Date: 2017/6/10
 * Time: 14:47
 */

namespace Gaming;


class IndexView
{


    private $gaming;	// Gaming object
    private $name;
    /** Constructor
     * @param $gaming game object */
    public function __construct(Gaming $gaming) {
        $this->gaming = $gaming;
    }

    public function getname(){

        return $this->name;
    }

    public function present() {
        $name = "Charles";
        if (isset($_SESSION['name'])) {
            $name = $_SESSION['name'];
        }



        $html = <<<HTML
<header>
    <p class="imgcenter"><img src="nifty800.png" width="800" height="140" alt="header"></p>
    <nav>
HTML;
        if (isset($_SESSION['user'])) {
            $user = $_SESSION['user'];
            $name = $user->getName();

            $html .= <<<HTML
            <p class = "buttonright"><a class="setcolor" href="instructions.php">INSTRUCTIONS</a>
            <a class="setcolor" href="post/logout.php">LOG OUT</a>
      

HTML;
            $html .= <<<HTML
        </nav>
    <h1>Welcome to Xingyun Zhao's Nifty Nurikabe!</h1>
</header>
<div class="articles">

            <form  class="green" method="post" action="index-post.php">
                <div class="centerbox">

                    <p class="setmargincolor"><label for="name">Name</label></p>
                    <p class="setmargin"><input type="text" id="name" name="name" value=$name readonly></p>

                    <p class="setmargin">

                        <select name="selectb" id="selectb">

                            <option>3x3 Ultra Easy</option>
                            <option>8x8 Very Easy</option>
                            <option>10x10 Easy</option>
                            <option>8x8 Medium</option>
                        </select>

                    </p>
                    <p class="setmarginstart"><input type="submit" name="press" value="Start Game"></p>
  
HTML;

        }
        else {
            $html .= <<<HTML
              <p class = "buttonright"><a class="setcolor" href="instructions.php">INSTRUCTIONS</a>
              <a class="setcolor" href="login.php">LOG IN</a>
              <a class="setcolor" href="newuser.php">NEW USER</a>
HTML;
            $html .= <<<HTML
        </nav>
    <h1>Welcome to Xingyun Zhao's Nifty Nurikabe!</h1>
</header>
<div class="articles">

            <form  class="green" method="post" action="index-post.php">
                <div class="centerbox">

                    <p class="setmargincolor"><label for="name">Name</label></p>
                    <p class="setmargin"><input type="text" id="name" name="name" value=$name></p>

                    <p class="setmargin">

                        <select name="selectb" id="selectb">

                            <option>3x3 Ultra Easy</option>
                            <option>8x8 Very Easy</option>
                            <option>10x10 Easy</option>
                            <option>8x8 Medium</option>
                        </select>

                    </p>
                    <p class="setmarginstart"><input type="submit" name="press" value="Start Game"></p>
  
HTML;

        }



        $checkname = $this->gaming->getinvalidname();

        if (!isset($_SESSION['user'])){
            if($checkname == true) {
                //
                // An invalid name
                //
                $html .= <<<HTML
<p class="message">You must enter a name!</p>
HTML;
            }


        }

        $html .= <<<HTML
                    
                    
                    
                </div>
            </form>

</div>
HTML;



        $html .= <<<HTML

<footer>
    <p class="imgcenter"><img src="nifty1-800.png" width="800" height="93" alt="footer"></p>
</footer>
<!-- lots of HTML -->
HTML;
        return $html;
    }


}