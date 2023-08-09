<?php
    session_destroy();

    http_response_code(302);
    header("location: index.php");

?>