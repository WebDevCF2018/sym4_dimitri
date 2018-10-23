<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lesauteurs
 *
 * @ORM\Table(name="lesauteurs", uniqueConstraints={@ORM\UniqueConstraint(name="lenom_UNIQUE", columns={"lauteur"})})
 * @ORM\Entity
 */
class Lesauteurs
{
    /**
     * @var int
     *
     * @ORM\Column(name="idlesauteurs", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idlesauteurs;

    /**
     * @var string
     *
     * @ORM\Column(name="lauteur", type="string", length=100, nullable=false)
     */
    private $lauteur;

    /**
     * @var string
     *
     * @ORM\Column(name="lepwd", type="string", length=100, nullable=false)
     */
    private $lepwd;

    /**
     * @var string|null
     *
     * @ORM\Column(name="lenomcomplet", type="string", length=150, nullable=true)
     */
    private $lenomcomplet;

    public function getIdlesauteurs(): ?int
    {
        return $this->idlesauteurs;
    }

    public function getLauteur(): ?string
    {
        return $this->lauteur;
    }

    public function setLauteur(string $lauteur): self
    {
        $this->lauteur = $lauteur;

        return $this;
    }

    public function getLepwd(): ?string
    {
        return $this->lepwd;
    }

    public function setLepwd(string $lepwd): self
    {
        $this->lepwd = $lepwd;

        return $this;
    }

    public function getLenomcomplet(): ?string
    {
        return $this->lenomcomplet;
    }

    public function setLenomcomplet(?string $lenomcomplet): self
    {
        $this->lenomcomplet = $lenomcomplet;

        return $this;
    }


}
