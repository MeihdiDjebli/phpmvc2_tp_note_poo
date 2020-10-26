<?php

require_once "Contributeur.php";

/**
 * Class Administrateur
 */
class Administrateur extends Contributeur
{
    /**
     * @var int
     */
    protected $niveauAcces;

    /**
     * Administrateur constructor.
     * @param string $identifiant
     * @param string $mdp
     * @param string $nomComplet
     * @param int $contribution
     * @param int $niveauAcces
     */
    public function __construct(
        string $identifiant,
        string $mdp,
        string $nomComplet,
        int $contribution,
        int $niveauAcces
    ) {
        parent::__construct($identifiant, $mdp, $nomComplet, $contribution);

        $this->niveauAcces = $niveauAcces;
    }

    /**
     * @return int
     */
    public function getNiveauAcces(): int
    {
        return $this->niveauAcces;
    }

    /**
     * @param int $niveauAcces
     */
    public function setNiveauAcces(int $niveauAcces): void
    {
        $this->niveauAcces = $niveauAcces;
    }

    /**
     * @return string
     */
    public static function getDiscr(): string
    {
        return "admin";
    }
}