<?php
/**
 * Created by PhpStorm.
 * User: dell-
 * Date: 2017/6/22
 * Time: 15:50
 */

namespace Gaming;


class NewuserpendingController
{
    public function __construct(Site $site, array $post)
    {

        $root = $site->getRoot();
        $this->redirect = "$root/newuserpending.php";

        if (isset($post['home'])) {
            $this->redirect = "$root/index.php";
            return;
        }
    }

    public function getRedirect()
    {
        return $this->redirect;
    }


    private $redirect;    ///< Page we will redirect the user to.

}