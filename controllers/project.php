<?php
require_once "../model/model.php";

$project_title = $category = '';

if (isset($_POST['submit'])) {
    $title = trim($_POST['title']);
    $category = $_POST['category'];

    if (empty($title) || empty($category)) {
        $error_message = "Title or category empty";
    } else {
        if (titleExists("projects", $title)) {
            $error_message = "I'm sorry, but looks like \"" . escape($title) . "\" already exists";
        } else {
            header('Refresh:4; url=project_list.php');
            add_project($title, $category);
            $confirm_message = escape($title) . ' added successfully';
        }
    }
}

require "../views/project.php";