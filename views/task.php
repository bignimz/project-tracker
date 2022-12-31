<?php
$title = 'Add Task';
if (!empty($_GET['id'])) {
    $title = "Update task";
}

ob_start();
// require 'nav.php';
?>

<div class="container">

    <!-- <h1><?php echo $title ?></h1> -->
    <?php
    if (isset($error_message)) {
        echo "<div class='alert alert-danger' role='alert'>$error_message</div>";
    }

    if (isset($confirm_message)) {
        echo "<div class='alert alert-success' role='alert'>$confirm_message</div>";
    }
    ?>

    <form method="post" class="card shadow-lg p-5 mx-auto" style="max-width: 500px">
        <p class="fs-6 text-center text-uppercase text-strong mb-3">Add New Task</p>
        <!-- <label for="project">
            <span>Project:</span>
            <strong><abbr title="required">*</abbr></strong>
        </label> -->
        <select class="form-control" name="project" id="project" required>
            <option value="">Select a project</option>
            <?php foreach ($projects as $project) { ?>
            <option value="<?php echo $project['id'] ?>"><?php echo $project['title'] ?></option>
            <?php } ?>
        </select>
        <!-- <label for="title">
            <span>Title:</span>
            <strong><abbr title="required">*</abbr></strong>
        </label> -->
        <input class="form-control" type="text" placeholder="New task" name="title" id="title" required>
        <!-- <label class="form-control" for="date">
            <span>Date:</span>
            <strong><abbr title="required">*</abbr></strong>
        </label> -->
        <input class="form-control" type="date" name="date" id="date" required>
        <label for="time" class="mb-2">
            <span>Time Taken in Mins:</span>
            <strong><abbr title="required">*</abbr></strong>
        </label>
        <input class="form-control" type="number" name="time" id="time" required>
        <?php if (!empty($id)) { ?>
            <input type="hidden" name="id" value="<?php echo $id ?>" />
        <?php } ?>
        <input class="form-control btn btn-success my-3" type="submit" name="submit" value="Add">
    </form>
</div>


<?php
$content = ob_get_clean();
include 'layout.php';
?>