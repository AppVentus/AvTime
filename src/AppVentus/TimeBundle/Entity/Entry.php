<?php

namespace AppVentus\TimeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entry
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppVentus\TimeBundle\Repository\EntryRepository")
 */
class Entry
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
     * @ORM\Column(name="branch", type="string", length=255, nullable=true)
     */
    private $branch;

    /**
     * @var string
     *
     * @ORM\Column(name="language", type="string", length=255, nullable=true)
     */
    private $language;

    /**
     * @var string
     *
     * @ORM\Column(name="line", type="string", length=255, nullable=true)
     */
    private $line;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isWrite", type="boolean")
     */
    private $isWrite = 0;

    /**
     * @var string
     *
     * @ORM\Column(name="project", type="string", length=255, nullable=true)
     */
    private $project;

    /**
     * @var string
     *
     * @ORM\Column(name="file", type="string", length=255, nullable=true)
     */
    private $file;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="time", type="string", length=255, nullable=true)
     */
    private $time;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=true)
     */
    private $type = 'entry';


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
     * Set branch
     *
     * @param string $branch
     * @return Entry
     */
    public function setBranch($branch)
    {
        $this->branch = $branch;

        return $this;
    }

    /**
     * Get branch
     *
     * @return string
     */
    public function getBranch()
    {
        return $this->branch;
    }

    /**
     * Set language
     *
     * @param string $language
     * @return Entry
     */
    public function setLanguage($language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set line
     *
     * @param string $line
     * @return Entry
     */
    public function setLine($line)
    {
        $this->line = $line;

        return $this;
    }

    /**
     * Get line
     *
     * @return string
     */
    public function getLine()
    {
        return $this->line;
    }

    /**
     * Set isWrite
     *
     * @param boolean $isWrite
     * @return Entry
     */
    public function setIsWrite($isWrite)
    {
        $this->isWrite = $isWrite;

        return $this;
    }

    /**
     * Get isWrite
     *
     * @return boolean
     */
    public function getIsWrite()
    {
        return $this->isWrite;
    }

    /**
     * Set project
     *
     * @param string $project
     * @return Entry
     */
    public function setProject($project)
    {
        $this->project = $project;

        return $this;
    }

    /**
     * Get project
     *
     * @return string
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * Set file
     *
     * @param string $file
     * @return Entry
     */
    public function setFile($file)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Get file
     *
     * @return string
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Set time
     *
     * @param \DateTime $time
     * @return Entry
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get time
     *
     * @return \DateTime
     */
    public function getTime()
    {
        return $this->time;
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

    /**
     * Set type
     *
     * @param string $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }
}
