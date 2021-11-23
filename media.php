<?php
    include_once "dbh.inc.php"

    $sql = "SELECT mediaType FROM uploadData WHERE filePath = $path";

    