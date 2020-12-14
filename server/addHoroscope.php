<?php

try {
    // starta vår session. i den här filen har vi tillgång till en session som vi kan spara, ändra manipuler saker.
    session_start();

    require('./horoscopes.php');

    //Check if request has been made
    if (isset($_SERVER["REQUEST_METHOD"])) {

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            //REQUESTMETHOD IS POST

            $month = $_SESSION["month"] = $_POST["month"];
            $day = $_SESSION["day"] = $_POST["day"];
            $horoscope = checkHoroscope($month, $day);

            //checks if name in body is set
            if (isset($_SESSION["horoscope"])) {
                //saves $_post name to the session
                echo json_encode(true);
                // man vill skicka tillbaka något och lämna sen 
            } else {
                $_SESSION["horoscope"] = $horoscope;
                // throw exeption if no name wads included in the body of the request
                throw new Exception("no name was found in request body", 500);
            }
        } else {
            // throw exeption if invalid request method
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
