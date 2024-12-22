<?php
session_start();
require_once('./server/utils/helpers.php');

if (isset($_GET['fill'])) fill();
if (isset($_GET['flush'])) erase();
if (isset($_GET['error'])) error();

if (!isset($_SESSION["tasks"])) $_SESSION["tasks"] = [];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>To-Do List</title>
  <link rel="stylesheet" type="text/css" href="./assets/style.css">
  <link rel="icon" type="image/png" sizes="32x32" href="./assets/imgs/icon.png">
  <script>
    function check(event) {
      const task = event.target;

      task.classList.toggle("checked");
    }

    function edit(id, task) {
      const inputId = document.querySelector("input[name='id']");
      const input = document.getElementById('input-box');
      const addButton = document.getElementById('add');

      inputId.value = id;
      input.attributes.placeholder.value = `Editing: ${task}`;
      input.value = task;
      input.focus();

      addButton.innerText = "Edit";
      addButton.attributes.formaction.value = './server/operations/edit.php'
    }
  </script>
</head>

<body>
  <div class="container">
    <div class="todo-app">
      <?php if (isset($_SESSION['error'])): ?>
        <div class="error-card">
          <div class="error-icon">!</div>
          <div class="error-message">
            <strong>Error:</strong> <?= $_SESSION['error'] ?>
          </div>
        </div>
        <?php unset($_SESSION['error']); ?>
      <?php endif; ?>

      <h2>ToDo List <img src="./assets/imgs/icon.png"></h2>

      <form method="post" class="row">
        <input type="text" name="task" id="input-box" placeholder="Add your text">
        <input type="hidden" name="id">
        <button id="add" type="submit" formaction="./server/operations/add.php">Add</button>
      </form>

      <ul id="list-container">
        <?php foreach ($_SESSION["tasks"] as $index => $task): ?>
          <?php $check = $task['done'] ? 'checked' : '' ?>

          <form method="post">
            <li class=<?= $check ?>>
              <button type="submit" formaction="./server/operations/check.php">
                <img onclick="check(event)" class=<?= $check ?>>
              </button>

              <p><?= $task['description']; ?></p><input type="hidden" name="id" value="<?= $index ?>">

              <button type="button" onclick="edit(<?= $index ?>,'<?= $task['description'] ?>')">
                <span>&#x270E</span>
              </button>

              <button type="submit" formaction="./server/operations/delete.php">
                <span>&#x00D7</span>
              </button>
            </li>
          </form>
        <?php endforeach; ?>
        <!-- 
              <li class="checked">Task 1</li>
              <li>Task 2</li>
              <li>Task 3</li> 
              -->
      </ul>
    </div>
  </div>
</body>

</html>