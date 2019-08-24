<?php
/**
 * Created by PhpStorm.
 * User: dell-
 * Date: 2017/6/21
 * Time: 16:18
 */

namespace Gaming;


class PasswordValidateView
{

    const Invalid_or_unavailable_validator = -1;
    const Email_address_is_not_for_a_valid_user = -2;
    const Email_address_does_not_match_validator =-3;
    const Passwords_did_not_match =-4;
    const Password_too_short = -5;

    private $validator;
    private $get;
    private $site;
    private $gaming;	// Gaming object
    /** Constructor
     * @param $gaming game object */
    public function __construct(Site $site, array $get) {
        $this->validator = strip_tags($get['v']);
        $this->get = $get;
        $this->site = $site;
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

            <form  class="green" method="post" action="post/password-validate-post.php">
            <input type="hidden" name="validator" value="$this->validator">
                <div class="centerbox">

                    <p class="setemail"><label for="email">Email</label></p>
                    <p class="setmarginstart"><input type="text" id="email" name="email" placeholder="Email"></p>
                    <p class="setpassword"><label for="email">Password:</label></p>
                    <p class="setmarginstart"><input type="password" id="password" name="password" placeholder="Password"></p>
                     <p class="setpassword"><label for="email">Password (again):</label></p>
                    <p class="setmarginstart"><input type="password" id="password2" name="password2" placeholder="Password"></p>

HTML;
        if(isset($this->get['e'])) {
            $error = strip_tags($this->get['e']);

            if ($error == self::Invalid_or_unavailable_validator) {
                $html .= <<<HTML
<p class="msg">Invalid or unavailable validator</p>      
HTML;
            } else if ($error == self::Email_address_is_not_for_a_valid_user) {
                $html .= <<<HTML
<p class="msg">Email address is not for a valid user</p>      
HTML;

            } else if ($error == self::Email_address_does_not_match_validator) {
                $html .= <<<HTML
<p class="msg">Email address does not match validator</p>      
HTML;

            } else if ($error == self::Passwords_did_not_match) {
                $html .= <<<HTML
<p class="msg">Passwords did not match</p>      
HTML;

            } else if ($error == self::Password_too_short) {
                $html .= <<<HTML
<p class="msg">Password too short</p>      
HTML;

            }
        }
        $html .= <<<HTML

                   
                    <p class="setmarginstart"><input type="submit" name="ok" id = "ok" value="Create Account"></p>
                    <p class="setmarginstart"><input type="submit" name="cancel" id = "cancel" value="Cancel"></p>
  
  
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