<?php




function checkHoroscope($month, $day)
{
    if ($month == 3 && $day >= 21 || $month == 4 && $day <= 19) {
        return "Väduren";
    } else if ($month == 4 && $day >= 20 || $month == 5 && $day <= 20) {
        return "Oxen";
    } else if ($month == 5 && $day >= 21 || $month == 6 && $day <= 21) {
        return "Tvillingarna";
    } else if ($month == 6 && $day >= 22 || $month == 7 && $day <= 22) {
        return "Kräftan";
    } else if ($month == 7 && $day >= 23 || $month == 8 && $day <= 22) {
        return "Lejonet";
    } else if ($month == 7 && $day >= 23 || $month == 8 && $day <= 22) {
        return "Lejonet";
    } else if ($month == 8 && $day >= 23 || $month == 9 && $day <= 22) {
        return "Jungfrun";
    } else if ($month == 9 && $day >= 23 || $month == 10 && $day <= 22) {
        return "Vågen";
    } else if ($month == 10 && $day >= 23 || $month == 11 && $day <= 21) {
        return "Skorpionen";
    } else if ($month == 11 && $day >= 22 || $month == 12 && $day <= 21) {
        return "Skytten";
    } else if ($month == 12 && $day >= 22 || $month == 1 && $day <= 19) {
        return "Stenbocken";
    } else if ($month == 1 && $day >= 20 || $month == 2 && $day <= 18) {
        return "Vattumannen";
    } else if ($month == 2 && $day >= 19 || $month == 3 && $day <= 20) {
        return "Vattumannen";
    }
}



/*  Väduren: 21 mars – 19 april 03/21 - 04/21
Oxen: 20 april – 20 maj  04/20 - 05/20
Tvillingarna: 21 maj – 21 juni  05/21 - 06/21
Kräftan: 22 juni – 22 juli  06/28 -07/22
Lejonet: 23 juli – 22 augusti  07/23 - 08/22
Jungfrun: 23 augusti – 22 september  08/23 - 09/22
Vågen: 23 september – 22 oktober   09/23 - 10/22
Skorpionen: 23 oktober – 21 november  10/23 - 11/21
Skytten: 22 november – 21 december   11/22 - 12/21
Stenbocken: 22 december – 19 januari  12/22 - 01/19 
Vattumannen: 20 januari – 18 februari  01/20 - 02/18
Fiskarna: 19 februari – 20 mars  02/19 - 03/20 */
