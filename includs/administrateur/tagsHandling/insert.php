<?php
require_once '../../../classes/conn.php';
require_once '../../../classes/tags.php';

$tag = new Tag($conn);

if (isset($_POST['tags']) && is_array($_POST['tags'])) {
    $tags = $_POST['tags'];

    foreach ($tags as $tagName) {
        if (!empty($tagName)) {
            $tag->setName($tagName);
            $tag->insert();
        }
    }
} else {
    echo "Invalid or missing tags.";
}
