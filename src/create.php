<?php

require_once "Model/UtilisateurRepository.php";

$utilisateur = new Utilisateur('super', 'toto', 'Super Mario');
$admin = new Administrateur('gus', 'tata', 'Gus Gus', 0, 2);

UtilisateurRepository::create($utilisateur);
UtilisateurRepository::create($admin);