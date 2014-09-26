<?php

namespace AppVentus\TimeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entry
 *
 * @ORM\Table()
 * @ORM\Entity()
 */
class User
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
     * @ORM\Column(name="username", type="string", length=255, nullable=false)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="api_key", type="string", length=255, nullable=false)
     */
    private $apiKey;

    /**
     * @var \stdClass
     *
     * @ORM\OneToMany(targetEntity="AppVentus\TimeBundle\Entity\Entry", mappedBy="user", cascade={"persist"})
     */
    private $entries;

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return $this
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get apiKey
     *
     * @return string
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * Set apiKey
     *
     * @param string $apiKey
     *
     * @return $this
     */
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;

        return $this;
    }

    /**
     * Get entries
     *
     * @return string
     */
    public function getEntries()
    {
        return $this->entries;
    }

    /**
     * Set entries
     *
     * @param string $entries
     *
     * @return $this
     */
    public function setEntries($entries)
    {
        $this->entries = $entries;

        return $this;
    }
}
