<?php

namespace VacanciBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;


/**
 * @ORM\Entity
 * @ORM\Table(name="vacanci")
 * @Vich\Uploadable
 */
class Vacanci 
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $vac;

    /**
     * @ORM\Column(type="string")
     */
    private $mobilePhone;

    /**
     * @ORM\Column(type="string")
     */
    private $email;

    /**
     * @ORM\Column(type="string")
     */
    private $avatar;

    /**
     *  @Vich\UploadableField(mapping="documents_images", fileNameProperty="avatar")
     */
    private $imageFile;

    /**
     * @var \DateTime
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     * @Gedmo\Timestampable(on="update")
     */
    protected $updatedAt;

    /**
     * @var \DateTime
     * @ORM\Column(name="date", type="datetime", nullable=true)
     */
    private $date;

    /**
     * @var string
     * @ORM\Column(name="question", type="string", nullable=true)
     * 
     */
    private $question;

    /**
     * @var string
     * @ORM\Column(name="shcool", type="string", nullable=true)
     * 
     */
    private $shcool;
    
    /**
     * @var string
     * @ORM\Column(name="jobs", type="string", nullable=true)
     * 
     */
    private $jobs;   
     
    /**
     * @var string
     * @ORM\Column(name="socion", type="string", nullable=true)
     * 
     */
    private $socion;  

    /**
     * @var string
     * @ORM\Column(name="portfolio", type="string", nullable=true)
     * 
     */
    private $portfolio;


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Vacanci
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getVac()
    {
        return $this->vac;
    }

    /**
     * @param string $vac
     * @return Vacanci
     */
    public function setVac($vac)
    {
        $this->vac = $vac;
        return $this;
    }

    /**
     * @return string
     */
    public function getMobilePhone()
    {
        return $this->mobilePhone;
    }

    /**
     * @param string $mobilePhone
     * @return Vacanci
     */
    public function setMobilePhone($mobilePhone)
    {
        $this->mobilePhone = $mobilePhone;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Vacanci
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * @param mixed $avatar
     * @return Vacanci
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;
        return $this;
    }

    /**
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
     */
    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        if ($image) {
            $this->updatedAt = new \DateTime('now');
        }

        // return $this;
    }

    /**
     * @return File
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     * @return Vacanci
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }


    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Vacanci
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set question
     *
     * @param string $question
     * @return Vacanci
     */
    public function setQuestion($question)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return string 
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Set shcool
     *
     * @param string $shcool
     * @return Vacanci
     */
    public function setShcool($shcool)
    {
        $this->shcool = $shcool;

        return $this;
    }

    /**
     * Get shcool
     *
     * @return string 
     */
    public function getShcool()
    {
        return $this->shcool;
    }

    /**
     * Set jobs
     *
     * @param string $jobs
     * @return Vacanci
     */
    public function setJobs($jobs)
    {
        $this->jobs = $jobs;

        return $this;
    }

    /**
     * Get jobs
     *
     * @return string 
     */
    public function getJobs()
    {
        return $this->jobs;
    }

    /**
     * Set socion
     *
     * @param string $socion
     * @return Vacanci
     */
    public function setSocion($socion)
    {
        $this->socion = $socion;

        return $this;
    }

    /**
     * Get socion
     *
     * @return string 
     */
    public function getSocion()
    {
        return $this->socion;
    }

    /**
     * Set portfolio
     *
     * @param string $portfolio
     * @return Vacanci
     */
    public function setPortfolio($portfolio)
    {
        $this->portfolio = $portfolio;

        return $this;
    }

    /**
     * Get portfolio
     *
     * @return string 
     */
    public function getPortfolio()
    {
        return $this->portfolio;
    }
}
