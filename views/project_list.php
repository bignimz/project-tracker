<?php
$title = 'Projects list';

ob_start();
require 'nav.php';
require '../controllers/common.php';
?>

<div class="container">

    <h1><?php echo $title . " (" . $projectCount . ")"  ?></h1>
    <!-- If there's not yet data -->
    <?php if ($projectCount == 0) { ?>
    <div>
        <p>You have not yet added any project </p>
        <p><a href='../controllers/project.php'>Add project</a></p>
    </div>
    <?php } ?>

    <ul>
        <?php foreach ($projects as $project) : ?>
            <!-- Enabling to click and update a specific project id -->
        <li>
            <?php echo escape($project["title"]) ?>
            <form method="post">
                <input type="hidden" value="<?php echo $project["id"]; ?>" name="delete">
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