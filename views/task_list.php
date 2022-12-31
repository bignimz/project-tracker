<?php
$title = 'Tasks list';

ob_start();
// require "nav.php";
require "../utils/common.php";
?>

<div class="container">

    <p class="mb-4"><?php echo $taskCount;  ?> Tasks found!</p>
    <!-- If there's not yet data -->
    <?php if ($taskCount == 0) { ?>
    <div>
        <p>You have not yet added any project </p>
        <p><a href='../controllers/task.php'>Add task</a></p>
    </div>
    <?php } ?>

    <ul>
        <?php foreach ($tasks as $task) : ?>
            <li>
                <?php echo escape($task["title"]) ?>
                <form method="post">
                    <input type="hidden" value="<?php echo $task["id"]; ?>" name="delete">
                    <input type="submit" value="Delete">
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
</div>


<?php
$content = ob_get_clean();
include 'layout.php';
?>