<?php
session_start();
require("../utils/go_back.php");

$error = &$_SESSION['error'];
$tasks = $_SESSION['tasks'];

$task_id = $_POST["id"];

if (!task_exists($task_id, $tasks)) {
    $error = ERRORS['not_found'];
    go_back();
}

remove_task($task_id, $tasks);

go_back();

function task_exists($index, $tasks)
{
    return isset($tasks[$index]);
}

function remove_task($index, &$tasks)
{
    unset($tasks[$index]);
}
