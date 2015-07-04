<?php

namespace Demo\Bundle\ArticleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Article
 *
 * @ORM\Table(name="tbl_article")
 * @ORM\Entity(repositoryClass="Demo\Bundle\ArticleBundle\Entity\ArticleRepository")
 */
class Article
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=100)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;
    
    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string")
     */
    private $email;
    /**
     * @var string
     *
     * @ORM\Column(name="created_by", type="string", length=100)
     */
    private $createdBy;
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Artcile
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
     * Set email
     *
     * @param string $email
     * @return Artcile
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }
    
    /**
     * Set description
     *
     * @param string $description
     * @return Artcile
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->password;
    }
    
    /**
     * Set createdBy
     *
     * @param string $createdBy
     * @return Article
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get createdBy
     *
     * @return Article 
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }
}
