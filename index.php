<?php

$data = file_get_contents('php://input');

$request = json_decode($data);
//white listed repos
$white_list_repos = array('hestiacp/hestiacp-docs');
//white listed users
$white_list_users = array('jaapmarcus','ScIT-Raphael','Lupul');

if(!in_array($request -> repo -> slug,$white_list_repos)){
    if (!in_array($request -> build -> trigger, $white_list_users)){
        if(!in_array($request -> build -> author_login, $white_list_users)){
            header("HTTP/1.1 499");
        }
    }
}

header("HTTP/1.1 200");