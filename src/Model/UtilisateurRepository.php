<?php

require_once "Utilisateur.php";
require_once "Contributeur.php";
require_once "Administrateur.php";

/**
 * Class UtilisateurRepository
 */
class UtilisateurRepository
{
    /**
     * Récupérer tous les utilisateurs ou seulement ceux qui possède le discr indiqué en paramètre ($discr)
     *
     * @param string|null $discr
     * @return array|Utilisateur[]|Contributeur[]|Administrateur[]
     */
    public static function findAll(?string $discr = null): array
    {
        $mysqli = self::connect();

        $sql = "SELECT * FROM utilisateur";

        if ($discr !== null) {
            $sql .= " WHERE discr = '$discr'";
            // $sql = $sql . " WHERE discr= '$discr"; <-- PAREIL
        }

        $result = $mysqli->query($sql);

        if ($result === false) {
            throw new \Exception("Requête impossible !");
        }

        $utilisateurs = [];

        while ($row = $result->fetch_assoc()) {
            $utilisateurs[] = self::transform($row);
        }

        return $utilisateurs;
    }

    /**
     * Récupérer un utilisateur par son identifiant
     *
     * @param string $identifiant
     * @return null|Utilisateur|Contributeur|Administrateur
     */
    public static function find(string $identifiant): ?Utilisateur
    {
        $mysqli = self::connect();

        $sql = "SELECT * FROM utilisateur WHERE identifiant = '$identifiant'";

        $result = $mysqli->query($sql);

        if ($result === false) {
            throw new \Exception("Requête impossible !");
        }

        $row = $result->fetch_assoc();

        return $row === null ? null : self::transform($row);
    }

    /**
     * @return mysqli
     * @throws Exception
     */
    private static function connect(): mysqli
    {
        $mysqli = new mysqli("db", "root", "root", "utilisateur");

        if ($mysqli->connect_errno) {
            throw new \Exception("Connexion impossible !");
        }

        return $mysqli;
    }

    /**
     * @param array $row
     * @return Utilisateur
     */
    private static function transform(array $row): Utilisateur
    {
        $discr = $row["discr"];

        switch ($discr) {
            case Utilisateur::getDiscr():
                return new Utilisateur($row["identifiant"], $row["mdp"], $row["nom_complet"]);
            case Contributeur::getDiscr():
                return new Contributeur($row["identifiant"], $row["mdp"], $row["nom_complet"], $row["contributions"]);
            case Administrateur::getDiscr():
                return new Administrateur(
                    $row["identifiant"],
                    $row["mdp"],
                    $row["nom_complet"],
                    $row["contributions"],
                    $row["niveau_acces"]
                );
        }
    }

    /**
     * Créer un utilisateur en base de données
     *
     * @param Utilisateur|Contributeur|Administrateur $utilisateur
     * @return bool (true si création OK sinon false)
     */
    public static function create(Utilisateur $utilisateur): bool
    {
        $identifiant = $utilisateur->getIdentifiant();
        $utilisateurExiste = self::find($identifiant);

        if ($utilisateurExiste instanceof Utilisateur) { // L'utilisateur existe déjà !
            return false;
        }

        $sql = "INSERT INTO utilisateur VALUES ('%s', '%s', '%s', '%s', %d, %d)";

        $mysqli = self::connect();
        $result = $mysqli->query(sprintf(
            $sql,
            $identifiant,
            $utilisateur::getDiscr(),
            $utilisateur->getNomComplet(),
            $utilisateur->getMdp(),
            $utilisateur instanceof Contributeur ? $utilisateur->getContribution() : 'NULL',
            $utilisateur instanceof Administrateur ? $utilisateur->getNiveauAcces() : 'NULL'
        ));

        return $result !== false;
    }
}