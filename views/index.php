<?php
$title = 'Project Tracker App';

ob_start();
// require 'nav.php';

$request = $_SERVER['REQUEST_URI'];

?>
<div class="welcome px-4 py-5 my-5 text-center">
    <h1>Welcome to the ProjTrackerApp</h1>

    <p>an app that helps you track time you spend on your favorite tasks</p>
    <div class="text-center mt-4 mb-5">
        <a href="#" class="btn btn-success prj-btn px-5">
            Get Started
        </a>
    </div>
</div>
<?php
$content = ob_get_clean();
include 'layout.php';
?>