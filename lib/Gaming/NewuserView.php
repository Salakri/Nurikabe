<?php
/**
 * Created by PhpStorm.
 * User: dell-
 * Date: 2017/6/21
 * Time: 16:18
 */

namespace Gaming;


class NewuserView
{

    private $gaming;	// Gaming object
    /** Constructor
     * @param $gaming game object */
    public function __construct(Gaming $gaming) {
        $this->gaming = $gaming;
    }

    public function present() {



        $html = <<<HTML
<header>
    <p class="imgcenter"><img src="nifty800.png" width="800" height="140" alt="header"></p>
    <nav>
        <p class = "buttonright"><a class="setcolor" href="instructions.php">INSTRUCTIONS</a>
    </nav>
    <h1>Welcome to Xingyun Zhao's Nifty Nurikabe!</h1>
</header>
HTML;
        $name = $this->gaming->getname();
        $html .= <<<HTML
<div class="articles">

            <form  class="green" method="post" action="post/newuser-post.php">
                <p class="setemail">If you create an account on Nifty Nurikabe, you can save and load games as you play.</p>
                <div class="centerbox">

                    <p class="setmargincolor"><label for="name">Name</label></p>
                    <p ><input type="text" id="name" name="name" placeholder="Name"></p>
                    
                     <p class="setmargincolor"><label for="name">Email</label></p>
                    <p class="setmarginstart"><input type="text" id="email" name="email" placeholder="Email"></p>
                    
                    

                    
                    <p class = "setmarginstart"><input type="submit" name="createaccount" value="Create Account"></p>
                    <p class = "setmarginstart"><input type="submit" name="cancel" value="Cancel"></p>
  
HTML;


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