<?php

$title = 'Add Project';

if (!empty($_GET['id'])) {
    $title = "Update project";
}

ob_start();
// require "nav.php";

?>

<div class="container">

    <!-- <h1><?php echo $title ?></h1> -->

    <?php
    // Print error message if any or confirmation message
    if (isset($error_message)) {
        echo "<p class='message_error'>$error_message</p>";
    }

    if (isset($confirm_message)) {
        echo "<p class='message_ok'>$confirm_message</p>";
    }
    ?>

    <form method="post" class="mx-auto p-5 card shadow-lg" style="max-width: 500px">
        <p class="fs-6 text-center text-uppercase text-strong">Add New Project</p>
        <!-- <label for="title">
            <span>Title:</span>
            <strong><abbr title="required">*</abbr></strong>
        </label> -->
        <input class="form-control my-2" type="text" placeholder="New project Title" name="title" id="title" value="<?php echo $project_title; ?>">
        <!-- <label for="category">
            <span>Category:</span>
            <strong><abbr title="required">*</abbr></strong>
        </label> -->

        <select class="form-control my-2" name="category" id="category" required>
            <option value="">Select a category</option>
            <option 
                value="Professional" 
                
                <?php 
                    if ($category == "Professional") {
                        echo ' selected';
                    }
                ?>
            >
                Professional
            </option>
            <option 
                value="Personal" 
                <?php
                    if ($category == "Personal") {
                        echo ' selected';
                    }
                ?>
            >
                Personal
            </option>
            <option 
                value="Charity" 
                <?php
                    if ($category == "Charity") {
                        echo ' selected';
                    }
                    ?>
            >
                Charity
            </option>
        </select>

        <?php if (!empty($id)) { ?>

        <input type="hidden" name="id" value="<?php echo $id ?>" />

        <?php } ?>
        <input class="btn btn-success my-3" type="submit" name="submit" value="<?php echo (isset($id) and (!empty($id))) ? "Update" : "Add";  ?>">
    </form>
</div>

<?php
$content = ob_get_clean();
include 'layout.php';
?>