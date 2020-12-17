<?php

try {
    session_start();

    if (isset($_SERVER["REQUEST_METHOD"])) {

        if ($_SERVER["REQUEST_METHOD"] === "GET") {

            if (isset($_SESSION["horoscope"])) {
                $horoscope = $_SESSION["horoscope"];
                echo json_encode($horoscope);
            } else {
                echo json_encode(false);
            }
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
