<?php

namespace OroCRM\Bundle\MagentoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Oro\Bundle\DataAuditBundle\Metadata\Annotation as Oro;
use Oro\Bundle\EntityConfigBundle\Metadata\Annotation\Config;

use OroCRM\Bundle\MagentoBundle\Model\ExtendWebsite;

/**
 * Class Website
 *
 * @package OroCRM\Bundle\OroCRMMagentoBundle\Entity
 * @Oro\Loggable
 * @ORM\Entity
 * @ORM\Table(
 *  name="orocrm_magento_website",
 *  uniqueConstraints={@ORM\UniqueConstraint(name="unq_site_idx", columns={"website_code", "origin_id", "channel_id"})},
 *  indexes={
 *       @ORM\Index(name="orocrm_magento_website_name_idx",columns={"website_name"})
 *  }
 * )
 * @Config(
 *      defaultValues={
 *          "note"={
 *              "immutable"=true
 *          },
 *          "activity"={
 *              "immutable"=true
 *          },
 *          "attachment"={
 *              "immutable"=true
 *          }
 *      }
 * )
 */
class Website extends ExtendWebsite implements OriginAwareInterface, IntegrationAwareInterface
{
    use IntegrationEntityTrait, OriginTrait;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="website_code", type="string", length=32, nullable=false)
     * @Oro\Versioned
     */
    protected $code;

    /**
     * @var string
     *
     * @ORM\Column(name="website_name", type="string", length=255, nullable=false)
     * @Oro\Versioned
     */
    protected $name;

    /**
     * @var int
     *
     * @ORM\Column(name="sort_order", type="integer", nullable=true)
     */
    protected $sortOrder;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_default", type="boolean", nullable=true)
     */
    protected $default = false;

    /**
     * Default product group id.
     *
     * @var int
     *
     * @ORM\Column(name="default_group_id", type="integer", nullable=true)
     */
    protected $defaultGroupId;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Website
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param string $code
     *
     * @return Website
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $name
     *
     * @return Website
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getSortOrder()
    {
        return $this->sortOrder;
    }

    /**
     * @param int $sortOrder
     * @return Website
     */
    public function setSortOrder($sortOrder)
    {
        $this->sortOrder = $sortOrder;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDefault()
    {
        return $this->default;
    }

    /**
     * @param mixed $default
     * @return Website
     */
    public function setDefault($default)
    {
        $this->default = $default;

        return $this;
    }

    /**
     * @return int
     */
    public function getDefaultGroupId()
    {
        return $this->defaultGroupId;
    }

    /**
     * @param int $defaultGroupId
     * @return Website
     */
    public function setDefaultGroupId($defaultGroupId)
    {
        $this->defaultGroupId = $defaultGroupId;

        return $this;
    }
}
