<?php

/**
 * Class Utilisateur
 */
class Utilisateur
{
    /**
     * @var string
     */
    protected $identifiant;

    /**
     * @var string
     */
    protected $mdp;

    /**
     * @var string
     */
    protected $nomComplet;

    /**
     * Utilisateur constructor.
     * @param string $identifiant
     * @param string $mdp
     * @param string $nomComplet
     */
    public function __construct(string $identifiant, string $mdp, string $nomComplet)
    {
        $this->identifiant = $identifiant;
        $this->mdp = $mdp;
        $this->nomComplet = $nomComplet;
    }

    /**
     * @return string
     */
    public function getIdentifiant(): string
    {
        return $this->identifiant;
    }

    /**
     * @param string $identifiant
     */
    public function setIdentifiant(string $identifiant): void
    {
        $this->identifiant = $identifiant;
    }

    /**
     * @return string
     */
    public function getMdp(): string
    {
        return $this->mdp;
    }

    /**
     * @param string $mdp
     */
    public function setMdp(string $mdp): void
    {
        $this->mdp = $mdp;
    }

    /**
     * @return string
     */
    public function getNomComplet(): string
    {
        return $this->nomComplet;
    }

    /**
     * @param string $nomComplet
     */
    public function setNomComplet(string $nomComplet): void
    {
        $this->nomComplet = $nomComplet;
    }

    /**
     * @return string
     */
    public static function getDiscr(): string
    {
        return "simple";
    }
}