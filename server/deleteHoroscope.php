<?php

try {
    // starta vår session. i den här filen har vi tillgång till en session som vi kan spara, ändra manipuler saker.
    session_start();

    //Check if request has been made
    if (isset($_SERVER["REQUEST_METHOD"])) {

        if ($_SERVER["REQUEST_METHOD"] === "DELETE") {
            //REQUESTMETHOD IS DELETE
            if (isset($_SESSION["horoscope"])) {
                unset($_SESSION["horoscope"]);
                echo json_encode(true);
            } elseif (isset($_SESSION["update"])) {
                unset($_SESSION["update"]);
                echo json_encode(true);
            }
        } else {

            echo json_encode(false);
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
