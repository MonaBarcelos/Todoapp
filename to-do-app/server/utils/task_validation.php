<?php 
require_once('go_back.php');
require_once('../models/errors.php');

function empty_task(&$error){
    $error = ERRORS['empty'];
    go_back();

}

function duplicated_task(&$tasks, &$error){
    $error = ERRORS['duplicated'];
    $tasks = array_unique($tasks, SORT_REGULAR);

    go_back();
}
function has_dupes($array){
    $copy = array_unique($array, SORT_REGULAR);

    return count($array) !== count($copy);
}
?>