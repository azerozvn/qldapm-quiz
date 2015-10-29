<?php
/**
 * Created by PhpStorm.
 * User: manh
 * Date: 10/28/15
 * Time: 11:40 PM
 */
function load_view($viewName, $data)
{

    include "view/header.php";
    include "view/".$viewName.".php";
    include "view/footer.php";
}
