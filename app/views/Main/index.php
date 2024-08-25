<h1> "Hello, Main\index.php" </h1>

<?php
if (!empty($names)) {
    foreach ($names as $name) {
        echo $name->id . ' => ' . $name->name . '<br>';
    }
}