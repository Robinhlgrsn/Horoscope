<?php

try {
    // starta vår session. i den här filen har vi tillgång till en session som vi kan spara, ändra manipuler saker.
    session_start();

    $horoscope = $_SESSION["horoscope"];
    $update = $_SESSION["update"];
    //Check if request has been made
    if (isset($_SERVER["REQUEST_METHOD"])) {





        if ($_SERVER["REQUEST_METHOD"] === "GET") {
            //REQUESTMETHOD IS GET 
            $_SESSION["updatedHoroscope"];

            if (isset($_SESSION["horoscope"])) {
                echo json_encode($horoscope);
            } elseif (isset($_SESSION["update"])) {
                echo json_encode($update);
            } else {
                echo json_encode("skitkorv");
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
