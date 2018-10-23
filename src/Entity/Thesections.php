<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Thesections
 *
 * @ORM\Table(name="thesections")
 * @ORM\Entity
 */
class Thesections
{
    /**
     * @var int
     *
     * @ORM\Column(name="idthesections", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idthesections;

    /**
     * @var string
     *
     * @ORM\Column(name="letitre", type="string", length=120, nullable=false)
     */
    private $letitre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="thedesc", type="string", length=500, nullable=true)
     */
    private $thedesc;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Lesarticles", inversedBy="thesectionsthesections")
     * @ORM\JoinTable(name="thesections_has_lesarticles",
     *   joinColumns={
     *     @ORM\JoinColumn(name="thesections_idthesections", referencedColumnName="idthesections")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="lesarticles_idlesarticles", referencedColumnName="idlesarticles")
     *   }
     * )
     */
    private $lesarticleslesarticles;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->lesarticleslesarticles = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdthesections(): ?int
    {
        return $this->idthesections;
    }

    public function getLetitre(): ?string
    {
        return $this->letitre;
    }

    public function setLetitre(string $letitre): self
    {
        $this->letitre = $letitre;

        return $this;
    }

    public function getThedesc(): ?string
    {
        return $this->thedesc;
    }

    public function setThedesc(?string $thedesc): self
    {
        $this->thedesc = $thedesc;

        return $this;
    }

    /**
     * @return Collection|Lesarticles[]
     */
    public function getLesarticleslesarticles(): Collection
    {
        return $this->lesarticleslesarticles;
    }

    public function addLesarticleslesarticle(Lesarticles $lesarticleslesarticle): self
    {
        if (!$this->lesarticleslesarticles->contains($lesarticleslesarticle)) {
            $this->lesarticleslesarticles[] = $lesarticleslesarticle;
        }

        return $this;
    }

    public function removeLesarticleslesarticle(Lesarticles $lesarticleslesarticle): self
    {
        if ($this->lesarticleslesarticles->contains($lesarticleslesarticle)) {
            $this->lesarticleslesarticles->removeElement($lesarticleslesarticle);
        }

        return $this;
    }

}
