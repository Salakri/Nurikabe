<?php
/**
 * Function to localize our site
 * @param $site The Site object
 */
return function(Gaming\Site $site) {

    // Set the time zone
    date_default_timezone_set('America/Detroit');
    $site->setEmail('zhaoxi17@cse.msu.edu');
    $site->setRoot('/~zhaoxi17/project2');
    $site->dbConfigure('mysql:host=mysql-user.cse.msu.edu;dbname=zhaoxi17',
        'zhaoxi17',       // Database user
        '347216701',     // Database password
        'testpj_');            // Table prefix

};