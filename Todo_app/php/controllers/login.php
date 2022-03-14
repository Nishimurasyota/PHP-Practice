<?php

namespace controller\login;

function get()
{
    require_once SOURCE_BASE . "views/login.php";
}

function login()
{



}

function post()
{

    $id = isset($_POST["id"]) ?? "" ;
    $pwd  = isset($_POST["pwd"]) ?? "";

    $result = login($id, $pwd);

}
