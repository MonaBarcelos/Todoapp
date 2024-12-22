<?php
session_start();
require("../utils/go_back.php");
require("../utils/task_validation.php");

$error = &$_SESSION['error'];
$tasks = &$_SESSION['tasks'];

$task = $_POST["task"];

if (empty($task)) {
    empty_task($error);
}

$tasks[] = [
    'description' => $task,
    'done' => false
];

if(has_dupes($tasks)) {
    duplicated_task($tasks, $error);
}
go_back();
