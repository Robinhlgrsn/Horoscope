<?php

try {
    // starta vår session. i den här filen har vi tillgång till en session som vi kan spara, ändra manipuler saker.
    session_start();

    $horoscope = $_SESSION["horoscope"];

    //Check if request has been made
    if (isset($_SERVER["REQUEST_METHOD"])) {




        if ($_SERVER["REQUEST_METHOD"] === "GET") {
            //REQUESTMETHOD IS GET 

            if (isset($_SESSION["horoscope"])) {
                echo json_encode($horoscope);
            } else {
                echo json_encode("inget horoscope sparat");
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
