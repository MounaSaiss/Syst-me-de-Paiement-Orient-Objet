<?php
require_once './config/database.php';
require_once './Repository/ClientRepository.php';
require_once './Repository/CommandeRepository.php';
require_once './Entity/Client.php';
require_once './Entity/Commande.php';


$database = new Database();
$clientReposetory = new ClientRepository($database);
$commandeRepository = new CommandeRepository($database);

// Cleint functions
function formClient()
{
    global $clientReposetory;
    echo "Entrer le nom de client :";
    fscanf(STDIN, "%s", $nom);

    echo "Entrer le e-mail de client :";
    fscanf(STDIN, "%s", $email);

    $client = new Client(null, (string) $nom, (string) $email);
    if ($clientReposetory->ajouter($client)) {
        echo "success";
    } else {
        echo "error";
    }
}

// commende function 
function formCommende()
{
    global $clientReposetory;
    global $commandeRepository;

    foreach ($clientReposetory->all() as $client) {
        echo "id:" . $client->get_id() . "\n";
        echo "nom:" . $client->get_name() . "\n";
        echo "email:" . $client->get_email() . "\n";
    }

    echo "Veuillez Saisir l'id de client  :";
    fscanf(STDIN, "%d", $idClient);

    $client = null;

    foreach ($clientReposetory->all() as $c) {
        if ($c->get_id() === $idClient) {
            $client = $c;
            break;
        }
    }

    if (!$client) {
        echo "not found client";
        return;
    }

    echo "Veuillez Saisir le montant de Client ";
    fscanf(STDIN, "%d", $montant);

    $commend = new Commande(null, $montant, 'EN_ATTENTE', $client);

    if ($commandeRepository->ajouter($commend)) {
        echo 'success command';
    } else {
        echo "error command";
    }
}


// Menu principale
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
            formClient();
            break;
        case 2:
            formCommende();
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
} while (!$isExit);
