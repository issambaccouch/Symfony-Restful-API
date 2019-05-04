<?php

namespace ApiBundle\Entity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * Competitions
 *
 * @ORM\Table(name="competitions", indexes={@ORM\Index(name="fk_competitions_admins1_idx", columns={"id_admin"})})
 * @ORM\Entity
 */
class Competitions
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_cmpt", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCmpt;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbviewrs", type="integer", nullable=true)
     *
     */
    private $nbviewrs;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_admin", type="integer", nullable=true)
     */
    private $idAdmin;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", nullable=true)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=true)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_create", type="datetime", nullable=true)
     */
    private $dateCreate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_start", type="date", nullable=true)
     */
    private $dateStart;

    /**
     * @var \DateTime
     * @ORM\Column(name="date_fin", type="date", nullable=true)
     * @Assert\Date()
     * @Assert\Expression(
     *     "this.getDateStart() < this.getDateFin()",
     *     message="la date de fin doit etre aprés la date de debut"
     * )
     */
    private $dateFin;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=45, nullable=true)
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=150, nullable=true)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="code_post", type="string", length=12, nullable=true)
     */
    private $codePost;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbr_part", type="integer", nullable=true)
     */
    private $nbrPart;

    /**
     * @var string
     *
     * @ORM\Column(name="prize", type="text", length=65535, nullable=true)
     */
    private $prize;

    /**
     * @var string
     *
     * @ORM\Column(name="media", type="string", length=255, nullable=true)
     */
    private $media;



    /**
     * Get idCmpt
     *
     * @return integer
     */
    public function getIdCmpt()
    {
        return $this->idCmpt;
    }

    /**
     * Set idAdmin
     *
     * @param integer $idAdmin
     *
     * @return Competitions
     */
    public function setIdAdmin($idAdmin)
    {
        $this->idAdmin = $idAdmin;

        return $this;
    }

    /**
     * Get idAdmin
     *
     * @return integer
     */
    public function getIdAdmin()
    {
        return $this->idAdmin;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Competitions
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }



    /**
     * Set description
     *
     * @param string $description
     *
     * @return Competitions
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set dateCreate
     *
     * @param \DateTime $dateCreate
     *
     * @return Competitions
     */
    public function setDateCreate($dateCreate)
    {
        $this->dateCreate = $dateCreate;

        return $this;
    }

    /**
     * Get dateCreate
     *
     * @return \DateTime
     */
    public function getDateCreate()
    {
        return $this->dateCreate;
    }

    /**
     * Set dateStart
     *
     * @param \DateTime $dateStart
     *
     * @return Competitions
     */
    public function setDateStart($dateStart)
    {
        $this->dateStart = $dateStart;

        return $this;
    }

    /**
     * Get dateStart
     *
     * @return \DateTime
     */
    public function getDateStart()
    {
        return $this->dateStart;
    }

    /**
     * Set dateFin
     *
     * @param \DateTime $dateFin
     *
     * @return Competitions
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * Get dateFin
     *
     * @return \DateTime
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return Competitions
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Competitions
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set codePost
     *
     * @param string $codePost
     *
     * @return Competitions
     */
    public function setCodePost($codePost)
    {
        $this->codePost = $codePost;

        return $this;
    }

    /**
     * Get codePost
     *
     * @return string
     */
    public function getCodePost()
    {
        return $this->codePost;
    }

    /**
     * Set nbrPart
     *
     * @param integer $nbrPart
     *
     * @return Competitions
     */
    public function setNbrPart($nbrPart)
    {
        $this->nbrPart = $nbrPart;

        return $this;
    }

    /**
     * Get nbrPart
     *
     * @return integer
     */
    public function getNbrPart()
    {
        return $this->nbrPart;
    }

    /**
     * Set prize
     *
     * @param string $prize
     *
     * @return Competitions
     */
    public function setPrize($prize)
    {
        $this->prize = $prize;

        return $this;
    }

    /**
     * Get prize
     *
     * @return string
     */
    public function getPrize()
    {
        return $this->prize;
    }

    /**
     * Set url
     *
     * @param string $media
     *
     * @return Competitions
     */
    public function setMedia($media)
    {
        $this->media = $media;

        return $this;
    }

    /**
     * Get media
     *
     * @return string
     */
    public function getMedia()
    {
        return $this->media;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Competitions
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    public function __construct()
    {
        try {
            $this->dateCreate = new \DateTime();
        } catch (\Exception $e) {
        }
    }


    /**
     * Set nbrPart
     *
     * @param int $nbPart
     *
     * @return Competitions
     */
    public function decNbrPart($nbrPart)
    {
        $this->nbrPart = $nbrPart - 1;

        return $this;
    }

    /**
     * Set nbrPart
     *
     * @param int $nbPart
     *
     * @return Competitions
     */
    public function incNbrPart($nbrPart)
    {
        $this->nbrPart = $nbrPart + 1;

        return $this;
    }

    /**
     * Set nbviewrs
     *
     * @param integer $nbviewrs
     *
     * @return Competitions
     */
    public function setNbviewrs($nbviewrs)
    {
        $this->nbviewrs = $nbviewrs;

        return $this;
    }

    /**
     * Get nbviewrs
     *
     * @return integer
     */
    public function getNbviewrs()
    {
        return $this->nbviewrs;
    }

    /**
     * Add nbviewrs
     *
     * @return Competitions
     */
    public function addView()
    {
        $this->nbviewrs = $this->nbviewrs + 1;

        return $this;
    }


}

