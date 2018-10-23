<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Lesarticles
 *
 * @ORM\Table(name="lesarticles", indexes={@ORM\Index(name="fk_lesarticles_lesauteurs_idx", columns={"lesauteurs_idlesauteurs"})})
 * @ORM\Entity
 */
class Lesarticles
{
    /**
     * @var int
     *
     * @ORM\Column(name="idlesarticles", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idlesarticles;

    /**
     * @var string
     *
     * @ORM\Column(name="thetitle", type="string", length=250, nullable=false)
     */
    private $thetitle;

    /**
     * @var string
     *
     * @ORM\Column(name="thetext", type="text", length=65535, nullable=false)
     */
    private $thetext;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="thedate", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $thedate = 'CURRENT_TIMESTAMP';

    /**
     * @var \Lesauteurs
     *
     * @ORM\ManyToOne(targetEntity="Lesauteurs")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="lesauteurs_idlesauteurs", referencedColumnName="idlesauteurs")
     * })
     */
    private $lesauteurslesauteurs;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Thesections", mappedBy="lesarticleslesarticles")
     */
    private $thesectionsthesections;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->thesectionsthesections = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdlesarticles(): ?int
    {
        return $this->idlesarticles;
    }

    public function getThetitle(): ?string
    {
        return $this->thetitle;
    }

    public function setThetitle(string $thetitle): self
    {
        $this->thetitle = $thetitle;

        return $this;
    }

    public function getThetext(): ?string
    {
        return $this->thetext;
    }

    public function setThetext(string $thetext): self
    {
        $this->thetext = $thetext;

        return $this;
    }

    public function getThedate(): ?\DateTimeInterface
    {
        return $this->thedate;
    }

    public function setThedate(?\DateTimeInterface $thedate): self
    {
        $this->thedate = $thedate;

        return $this;
    }

    public function getLesauteurslesauteurs(): ?Lesauteurs
    {
        return $this->lesauteurslesauteurs;
    }

    public function setLesauteurslesauteurs(?Lesauteurs $lesauteurslesauteurs): self
    {
        $this->lesauteurslesauteurs = $lesauteurslesauteurs;

        return $this;
    }

    /**
     * @return Collection|Thesections[]
     */
    public function getThesectionsthesections(): Collection
    {
        return $this->thesectionsthesections;
    }

    public function addThesectionsthesection(Thesections $thesectionsthesection): self
    {
        if (!$this->thesectionsthesections->contains($thesectionsthesection)) {
            $this->thesectionsthesections[] = $thesectionsthesection;
            $thesectionsthesection->addLesarticleslesarticle($this);
        }

        return $this;
    }

    public function removeThesectionsthesection(Thesections $thesectionsthesection): self
    {
        if ($this->thesectionsthesections->contains($thesectionsthesection)) {
            $this->thesectionsthesections->removeElement($thesectionsthesection);
            $thesectionsthesection->removeLesarticleslesarticle($this);
        }

        return $this;
    }

}
