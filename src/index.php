<?php

require_once "Model/UtilisateurRepository.php";

try {
    $utilisateurs = UtilisateurRepository::findAll();
} catch (Exception $exception) {
    echo $exception->getMessage();
    $utilisateurs = [];
}


?>

<table>
    <thead>
    <tr>
        <td>Identifiant</td><td>Nom Complet</td><td>Nbr contributions</td><td>Niveau d'accès</td>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($utilisateurs as $utilisateur) { ?>
        <tr>
            <td><?=$utilisateur->getIdentifiant()?></td>
            <td><?=$utilisateur->getNomComplet()?></td>
            <td>
                <?php if ($utilisateur instanceof Contributeur) {
                    echo $utilisateur->getContribution();
                } ?>
            </td>
            <td>
                <?php if ($utilisateur instanceof Administrateur) {
                    echo $utilisateur->getNiveauAcces();
                } ?>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>
