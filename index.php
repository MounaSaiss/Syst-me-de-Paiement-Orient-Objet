<?php
require_once './config/database.php';


$database = new Database();


function menuPrencipale(): int
{
    echo "
    1. Créer un client\n
    2. Créer une commande\n
    3. Payer une commande\n
    4. Afficher les commandes\n
    0. Quitter\n
    ------------------------------
    ";

    echo "Votre choix :";

    fscanf(STDIN, "%d", $menuChoice);

    return (int)$menuChoice;
}


echo "====================================\n\nSYSTEME DE PAIEMENT - MENU\n\n====================================\n";

$isExit = false;

do {
    switch (menuPrencipale()) {
    case 1:
        echo "Créer un client";
        break;
    case 2:
        echo "Créer une commande";
        break;
    case 3:
        echo "Payer une commande";
        break;
    case 4:
        echo "Afficher les commandes";
        break;
    case 0:
        echo "Quitter";
        $isExit = true;
        break;
    default:
        echo "choix invalide";
}
} while(!$isExit);
