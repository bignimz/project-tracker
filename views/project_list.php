<?php
$title = 'Projects list';

ob_start();
// require 'nav.php';
require '../utils/common.php';
?>

<div class="container">

    <p class="mb-4 text-bold">You have <?php echo  $projectCount;  ?> projects</p>
    <!-- If there's not yet data -->
    <?php if ($projectCount == 0) { ?>
    <div>
        <p>You have not yet added any project </p>
        <p><a href='../controllers/project.php'>Add project</a></p>
    </div>
    <?php } ?>

    <div class="d-flex flex-wrap justify-content-between align-items-center">
        <?php foreach ($projects as $project) : ?>
            <!-- Enabling to click and update a specific project id -->
        <div class="col-md-4 col-6 mx-auto" style="max-width: 250px">
            <div class="card shadow p-3 mb-3 mx-2">
                <?php echo escape($project["title"]) ?>
                <div class="d-flex justify-content-between align-items-center my-3">
                    <form method="post">
                        <input type="hidden" value="<?php echo $project["id"]; ?>" name="delete">
                        <input type="submit" class="fs-6" value="Delete">
                    </form>
                    <a href="../views/reports.php" class="btn btn-outline-success fs-6">View Report</a>
                </div>
            </div>
        </div>

        <?php endforeach; ?>
    </div>
</div>

<?php
$content = ob_get_clean();
include 'layout.php';
?>