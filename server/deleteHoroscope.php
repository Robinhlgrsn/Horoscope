<?php

try {
    session_start();

    if (isset($_SERVER["REQUEST_METHOD"])) {

        if ($_SERVER["REQUEST_METHOD"] === "DELETE") {
            if (isset($_SESSION["horoscope"])) {
                session_destroy();
                echo json_encode(true);
                exit;
            } else {
                echo json_encode(false);
                exit;
            }
        } else {

            throw new Exception("not a valid request-method", 405);
        }
    }
} catch (Exception $error) {

    echo json_encode(
        array(
            "message" => $error->getMessage(),
            "status" => $error->getCode()
        )
    );
}
