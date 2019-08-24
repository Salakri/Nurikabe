<?php
/**
 * Created by PhpStorm.
 * User: dell-
 * Date: 2017/6/22
 * Time: 15:41
 */

namespace Gaming;


class Email
{
    public function mail($to, $subject, $message, $headers) {
        mail($to, $subject, $message, $headers);
    }

}