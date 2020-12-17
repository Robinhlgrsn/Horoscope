<?php

try {
    // starta vår session. i den här filen har vi tillgång till en session som vi kan spara, ändra manipuler saker.
    session_start();

    require('./horoscopes.php');



    //Check if request has been made
    if (isset($_SERVER["REQUEST_METHOD"])) {

        if ($_SERVER["REQUEST_METHOD"] === "POST") { //if request method is post

            $month = $_POST["month"];
            $day = $_POST["day"];
            $horoscope = checkHoroscope($month, $day);


            //checks if horoscope is saved in session
            if (isset($_SESSION["horoscope"])) {
                $_SESSION["horoscope"] = $horoscope;
                echo json_encode(true);
            } else { // if not saved, save horoscope
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
