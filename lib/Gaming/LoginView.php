<?php
/**
 * Created by PhpStorm.
 * User: dell-
 * Date: 2017/6/21
 * Time: 16:17
 */

namespace Gaming;


class LoginView
{
    private $gaming;	// Gaming object
    /** Constructor
     * @param $gaming game object */
    private $get;
    public function __construct($se, $get) {
        $this->get = isset($get['e']);
    }

    public function present() {



        $html = <<<HTML
<header>
    <p class="imgcenter"><img src="nifty800.png" width="800" height="140" alt="header"></p>
    <nav>
       
    </nav>

</header>
HTML;

        $html .= <<<HTML
<div class="articles">

            <form  class="green" method="post" action="post/login-post.php">
                <div class="centerbox">

                    <p class="setemail"><label for="email">Email</label></p>
                    <p class="setmarginstart"><input type="text" id="email" name="email" placeholder="Email"></p>
                    <p class="setpassword"><label for="email">Password:</label></p>
                    <p class="setmarginstart"><input type="password" id="password" name="password" placeholder="Password"></p>

                   
                    <p class="setmarginstart"><input type="submit" name="login" value="Login"></p>
                    <p class="setmarginstart"><input type="submit" name="cancel" value="Cancel"></p>
  
HTML;

        if ($this->get){
            $html .=<<<HTML
            <p class="messagelogin">Invalid login credentials</p>
HTML;


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