<?php
/**
 * Created by PhpStorm.
 * User: dell-
 * Date: 2017/6/22
 * Time: 14:42
 */

namespace Gaming;


class UserController
{
    /**
     * UsersController constructor.
     * @param Site $site Site object
     * @param User $user Current user
     * @param array $post $_POST
     */
    public function __construct(Site $site, array $post)
    {

        $root = $site->getRoot();
        $this->redirect = "$root/newuserpending.php";

        if(isset($post['cancel'])) {
            $this->redirect = "$root/index.php";
            return;
        }

        //
        // Determine if this is new user or editing an
        // existing user. We determine that by looking for
        // a hidden form element named "id". If there, it
        // gives the ID for the user we are editing. Otherwise,
        // we have no user, so I'll use an ID of 0 to indicate
        // that we are adding a new user.
        //

        if(isset($post['id'])) {
            $id = strip_tags($post['id']);
        } else {
            $id = 0;
        }

        //
        // Get all of the stuff from the from
        //
        $email = strip_tags($post['email']);
        $name = strip_tags($post['name']);


        $row = array('id' => $id,
            'email' => $email,
            'name' => $name,

        );
        $editUser = new User($row);

        $users = new Users($site);
        if($id == 0) {
            // This is a new user
            $mailer = new Email();
            $users->add($editUser, $mailer);
        }
        else{
            $users->update($editUser);
        }

    }

    /**
     * Get any redirect link
     * @return mixed Redirect link
     */
    public function getRedirect()
    {
        return $this->redirect;
    }


    private $redirect;    ///< Page we will redirect the user to.

}