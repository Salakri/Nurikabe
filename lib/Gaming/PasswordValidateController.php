<?php
/**
 * Created by PhpStorm.
 * User: dell-
 * Date: 2017/6/21
 * Time: 16:51
 */

namespace Gaming;


class PasswordValidateController
{

    private $redirect;

    public function getRedirect(){
        return $this->redirect;
    }
    /**
     * PasswordValidateController constructor.
     * @param Site $site The Site object
     * @param array $post $_POST
     */
    public function __construct(Site $site, array $post) {
        $root = $site->getRoot();
        $this->redirect = "$root/";

        if (isset($post['ok'])){
            //
            // 1. Ensure the validator is correct! Use it to get the user ID.
            //
            $validators = new Validators($site);
            $validator = strip_tags($post['validator']);
            $userid = $validators->get($validator);
            if($userid === null) {
                $this->redirect = "$root/password-validate.php?v=$validator&e=".
                    PasswordValidateView::Invalid_or_unavailable_validator;

                return;
            }

            //
            // 2. Ensure the email matches the user.
            //
            $users = new Users($site);
            $editUser = $users->get($userid);
            if($editUser === null) {
                // User does not exist!
                $this->redirect = "$root/password-validate.php?v=$validator&e=".
                    PasswordValidateView::Email_address_is_not_for_a_valid_user;

                return;
            }
            $email = trim(strip_tags($post['email']));
            if($email !== $editUser->getEmail()) {
                // Email entered is invalid
                $this->redirect = "$root/password-validate.php?v=$validator&e=".
                    PasswordValidateView::Email_address_does_not_match_validator;

                return;
            }

            //
            // 3. Ensure the passwords match each other
            //
            $password1 = trim(strip_tags($post['password']));
            $password2 = trim(strip_tags($post['password2']));
            if($password1 !== $password2) {
                // Passwords do not match
                $this->redirect = "$root/password-validate.php?v=$validator&e=".
                    PasswordValidateView::Passwords_did_not_match;

                return;
            }

            if(strlen($password1) < 8) {
                // Password too short
                $this->redirect = "$root/password-validate.php?v=$validator&e=".
                    PasswordValidateView::Password_too_short;

                return;
            }

            //
            // 4. Create a salted password and save it for the user.
            //
            $users->setPassword($userid, $password1);

            //
            // 5. Destroy the validator record so it can't be used again!
            //
            $validators->remove($userid);


        }
        else if(isset($post['cancel'])) {
            $this->redirect = "$root/index.php";
        }


    }


}