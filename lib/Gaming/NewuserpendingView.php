<?php
/**
 * Created by PhpStorm.
 * User: dell-
 * Date: 2017/6/21
 * Time: 17:25
 */

namespace Gaming;


class NewuserpendingView
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
       
    </nav>

</header>
HTML;
        $name = $this->gaming->getname();
        $html .= <<<HTML
<div class="articles">

            <form  class="green" method="post" action="post/newuserpending.php">
                <div class="centerboxforpending">

                    <p class="setemail">An email message has been sent to</p> 
                    <p class="setpassword">your address. When it arrives, select the</p> 
                    <p class="setpassword">validate link in the email to validate your</p>
                    <p class="setpassword">account.</p>
                    <p class="centerbutton"><input type="submit" name="home" value="Home"></p>
  
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