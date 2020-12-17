<?php

try {

    session_start();

    require('./horoscopes.php');

    if (isset($_SERVER["REQUEST_METHOD"])) {

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $month = $_POST["month"];
            $day = $_POST["day"];
            $horoscope = checkHoroscope($month, $day);

            if (isset($_SESSION["horoscope"])) {
                $_SESSION["horoscope"] = $horoscope;
                echo json_encode(true);
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
