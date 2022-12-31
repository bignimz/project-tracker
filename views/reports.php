<?php
$title = 'Reports';
require_once "../model/model.php";
require '../utils/common.php';

$projects = get_all_projects();
$tasks = get_all_tasks();

ob_start();
// require 'nav.php';
?>

<div class="container">

    <h1><?php echo $title ?></h1>

    <div class="filter">
        <p>Filter by</p>
        <form method="get">
            <select class="py-1" name="filter" id="project" style="width: 200px;">
                <option value="">Select one</option>

                <optgroup label="Projects">
                    <?php foreach ($projects as $project) : ?>
                    <option value="<?php echo 'project:' . $project["id"] ?>"><?php echo escape($project["title"]) ?>
                    </option>

                    <?php endforeach; ?>

                </optgroup>
                <optgroup label="Category">
                    <?php
                    $categories = ["Personal", "Professional", "Business"];
                    foreach ($categories as $categorie) :
                    ?>

                    <option value="<?php echo 'category:' . $categorie ?>">
                        <?php echo escape($categorie); ?>
                    </option>
                    <?php endforeach; ?>
                </optgroup>
            </select>
            <input type="submit" value="Run">
        </form>
    </div>

    <table class="table table-striped table-bordered mt-4">
        <thead>
            <tr>
                <th>Task</th>
                <th>Date</th>
                <th>Duration</th>
            </tr>
        </thead>
        <?php
        $time_total = $project_id = $project_total = 0;

        foreach ($tasks as $task) :
            // Add a row for each project title
            if ($project_id != $task["project_id"]) {
                if ($project_id > 0) {

        ?>
        <tr>
            <th colspan=" 2" class="total">
                Subtotal
            </th>
            <th>
                <?php
                        echo  $project_total . " mn";
                        $project_total = 0;
                    }
                        ?>
            </th>
        </tr>
        <tr>
            <th colspan="3">
                <?php
                        echo $task['project'];
                        $project_id = $task["project_id"];
                    }
                        ?>
            </th>
        </tr>

        <tr>
            <td>
                <?php echo escape($task["title"]) ?>
            </td>
            <td>
                <?php echo $task["date_task"] ?>
            </td>
            <td>
                <?php echo  $task["time_task"] . " mn" ?>
            </td>
        </tr>
        <?php
                $time_total += $task["time_task"];
                $project_total += $task["time_task"];

            endforeach;
                ?>
        <tr>
            <th class="highlight total" colspan="2">
                Total Time Spent
            </th>
            <th class="highlight">

                <?php 
                if($time_total < 60) {
                    echo  $time_total . " mn";
                }else {
                    $res = number_format($time_total / 60, 2);
                    echo $res . "hour(s)";
                }
                
                ?>
            </th>
        </tr>
    </table>

</div>


<?php
$content = ob_get_clean();
include 'layout.php';
?>