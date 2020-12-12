<?php

try {
    // starta vår session. i den här filen har vi tillgång till en session som vi kan spara, ändra manipuler saker.
    session_start();

    require('./horoscopes.php');

    $month = unserialize($_SESSION["month"]);
    $day = unserialize($_SESSION["day"]);

    //Check if request has been made
    if (isset($_SERVER["REQUEST_METHOD"])) {




        if ($_SERVER["REQUEST_METHOD"] === "GET") {
            //REQUESTMETHOD IS GET 

            echo json_encode(checkHoroscope($month, $day));

            /*        if (isset($_SESSION["month"])) {
                echo json_encode(unserialize($month));
            } else {
                //no name found in our session
                echo json_encode("no horoscope is saved...");
            } */
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
