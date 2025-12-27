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
        echo "\n" . "Client Crée avec succes " . "\n";
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

    echo "Veuillez Saisir le montant de Client :";
    fscanf(STDIN, "%d", $montant);

    $commend = new Commande(null, $montant, 'EN_ATTENTE', $client);

    if ($commandeRepository->ajouter($commend)) {
        echo 'La Commende Crée Avec Succées ' . "\n";
    } else {
        echo "La Création de commende est échouer" . "\n";
    }
}

function afficheCommende()
{
    global $clientReposetory;
    global $commandeRepository;

    foreach ($commandeRepository->all() as $Commande) {
        echo "-----------------------------\n";
        echo "📦 COMMANDE N° " . $Commande->get_id() . "\n";
        echo "-----------------------------\n";
        echo "ID       : " . $Commande->get_id() . "\n";
        echo "Montant  : " . $Commande->get_montant() . " DH\n";
        echo "Statut   : " . $Commande->get_statu() . "\n";
        // echo "client_id: " . $Commande->get_cleint(): Client . "\n";
        echo "-----------------------------\n";
    }
}

function payerCommande()
{
    global $commandeRepository;
    echo "Veuillez Saisir l'id de commende que vous-pouvez payer  :";
    fscanf(STDIN, "%d", $idCommende);

    $Commande = null;

    foreach ($commandeRepository->all() as $cm) {
        if ($cm->get_id() === $idCommende) {
            $Commande = $cm;
            break;
        }
    }
    if (!$Commande) {
        echo "Commande n'existe Pas" . "\n";
        return;
    }

    echo "\n=================================\n";
    echo "        CHOISIR UN PAIEMENT       \n";
    echo "=================================\n";
    echo "  1 → Carte Bancaire\n";
    echo "  2 → PayPal\n";
    echo "  3 → Virement Bancaire\n";
    echo "---------------------------------\n";
    echo "Votre choix : ";
    fscanf(STDIN, "%d", $idpayement);
}



// Menu principale
function menuPrencipale(): int
{
    echo "+--------------------------------+" . "\n";
    echo "| 1. Créer un client             |" . "\n";
    echo "| 2. Créer une commande          |" . "\n";
    echo "| 3. Affiche Liste Commende      |" . "\n";
    echo "| 4. Payer une commande          |" . "\n";
    echo "| 0. Quitter                     |" . "\n";
    echo "+--------------------------------+" . "\n";
    echo "Votre choix : ";

    fscanf(STDIN, "%d", $menuChoice);

    return (int)$menuChoice;
}


echo "+----------------------------+" . "\n";
echo "|   SYSTEME DE PAIEMENT      |" . "\n";


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
            afficheCommende();
            break;
        case 4:
            payerCommande();
            break;
        case 0:
            echo "Quitter";
            $isExit = true;
            break;
        default:
            echo "choix invalide";
    }
} while (!$isExit);
