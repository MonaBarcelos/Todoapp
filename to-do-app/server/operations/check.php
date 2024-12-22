<?php
session_start();
require("../utils/go_back.php");
require_once('../models/errors.php');

$error = &$_SESSION['error'];
$tasks = &$_SESSION['tasks'];

$task_id = $_POST["id"];
$task = $tasks[$task_id];

if (!task_exists($task_id, $tasks)) {
    $error = ERRORS['not_found'];
    go_back();
}

$task['done'] = !$task['done'];
$tasks[$task_id] = $task;

go_back();

function task_exists($index, $tasks)
{
    return isset($tasks[$index]);
}
