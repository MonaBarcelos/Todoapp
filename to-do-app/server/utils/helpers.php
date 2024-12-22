<?php
function fill()
{
  $_SESSION['tasks'] = [
    ['description' => 'Buy milk', 'done' => false],
    ['description' => 'Go to the gym', 'done' => false],
    ['description' => 'Read a book', 'done' => true],
    ['description' => 'Do homework', 'done' => true],
    ['description' => 'Cook dinner', 'done' => false],
    ['description' => 'a', 'done' => false],
    ['description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla magna lectus, mollis vel blandit vel, pretium in eros. Suspendisse venenatis erat in ipsum sodales eleifend. Sed pharetra bibendum maximus. In feugiat, sapien nec sagittis egestas, nunc sapien mollis ligula, ac iaculis orci leo sed diam. Suspendisse condimentum enim arcu, eget iaculis enim cursus at. Nulla facilisi. Vivamus viverra justo at ipsum commodo porta. Aliquam erat volutpat.', 'done' => false],
  ];
}

function erase()
{
  $_SESSION['tasks'] = [];
}

function error()
{
  $_SESSION['error'] = $_GET['error'];
}
