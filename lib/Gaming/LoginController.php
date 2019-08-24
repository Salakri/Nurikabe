<?php
/**
 * Created by PhpStorm.
 * User: dell-
 * Date: 2017/6/21
 * Time: 16:36
 */

namespace Gaming;


class LoginController
{
    private $redirect;	///< Page we will redirect the user to.
    private $error = false;
    /**
     * LoginController constructor.
     * @param Site $site The Site object
     * @param array $session $_SESSION
     * @param array $post $_POST
     */
    public function __construct(Site $site, array &$session, array $post) {
        // Create a Users object to access the table
        $root = $site->getRoot();


        if (isset($post['login'])){

            $users = new Users($site);

            $email = strip_tags($post['email']);
            $password = strip_tags($post['password']);
            $user = $users->login($email, $password);
            $session[User::SESSION_NAME] = $user;


            if($user === null) {
                // Login failed
                $this->redirect = "$root/login.php?e";

            } else {
                $this->redirect = "$root/index.php";

            }



        }

        else {
            $this->redirect = "$root/index.php?e";
        }

    }

    public function getRedirect(){
        return $this->redirect;
    }


}