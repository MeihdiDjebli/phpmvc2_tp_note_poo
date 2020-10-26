<?php

require_once "Utilisateur.php";

/**
 * Class Contributeur
 */
class Contributeur extends Utilisateur
{
    /**
     * @var int
     */
    protected $contribution;

    /**
     * Contributeur constructor.
     * @param string $identifiant
     * @param string $mdp
     * @param string $nomComplet
     * @param int $contribution
     */
    public function __construct(string $identifiant, string $mdp, string $nomComplet, int $contribution)
    {
        parent::__construct($identifiant, $mdp, $nomComplet);

        $this->contribution = $contribution < 0 ? 0 : $contribution;
    }

    /**
     * @return int
     */
    public function getContribution(): int
    {
        return $this->contribution;
    }

    /**
     * @param int $contribution
     */
    public function setContribution(int $contribution): void
    {
        $this->contribution = $contribution;
    }

    /**
     * @return string
     */
    public static function getDiscr(): string
    {
        return "contributeur";
    }
}