<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 5/19/2016
 * Time: 06:50 PM
 */
namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
/**
 * StaticContent
 *
 * @ORM\Table(name="news_table")
 * @ORM\Entity(repositoryClass="ApiBundle\Entity\Repository\NewsRepository")
 */
class News
{
    public $types = [
        'news' => 'новость',
        'articles' => 'статья',
        'promo' => 'акция',
        'different' => 'разное',
        'head_promo' => 'промо сверху',
    ];
    public $states = [
        'NON' => 'не опубликованная',
        'Published' => 'опубликованная'
    ];
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
    /**
     * @var string - json array of paths to cover images
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;
    /**
     * @var string - json array of paths to cover images
     *
     * @ORM\Column(name="share_title", type="string", length=255, nullable=true)
     */
    private $shareTitle;
    /**
     * @var string - json array of paths to images
     *
     * @ORM\Column(name="image", type="text", nullable=true)
     */
    private $image;
    /**
     * @var string - status
     *
     * avaliable statuses: NON , Published
     *
     * @ORM\Column(name="status", type="string", columnDefinition="enum('NON', 'Published')" ,nullable=false)
     */
    private $status = "NON";

    /**
     * @var string - type
     *
     * avaliable types: news , articles, promo, different
     *
     * @ORM\Column(name="type", type="string", columnDefinition="enum('news', 'articles', 'promo','head_promo', 'different')" ,nullable=false)
     */
    private $type = "news";

    /**
     * @var string - preview text
     *
     * @ORM\Column(name="preview", type="text", nullable=true)
     */
    private $preview;
    /**
     * @var string - text
     *
     * @ORM\Column(name="text", type="text", nullable=true)
     */
    private $text;
    /**
     * @var \DateTime $createdAt
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="created_at",type="datetime")
     */
    private $createdAt;
    /**
     * @var \DateTime $createdAt
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(name="updated_at",type="datetime")
     */
    private $updatedAt;

    /**
     * @Gedmo\Slug(fields={"title"},unique=true,separator="-")
     * @ORM\Column(name="slug", length=255, unique=true)
     */
    private $slug;
    /**
     * @var string - preview text
     *
     * @ORM\Column(name="specials_background", type="text", nullable=true)
     */
    private $specialsBackground;

    public function __toString()
    {
        return $this->title ? $this->title : 'new';
    }

    public function getSlug()
    {
        return $this->slug;
    }


    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

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
     *
     * @return News
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
     * Set preview
     *
     * @param string $preview
     *
     * @return News
     */
    public function setPreview($preview)
    {
        $this->preview = $preview;

        return $this;
    }

    /**
     * Get preview
     *
     * @return string
     */
    public function getPreview()
    {
        return $this->preview;
    }
    /**
     * Set status
     *
     * @param string $status
     *
     * @return News
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }
    /**
     * Set type
     *
     * @param string $type
     *
     * @return News
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
    /**
     * Set text
     *
     * @param string $text
     *
     * @return News
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set createdAt
     *
     * @param string $createdAt
     *
     * @return News
     */
    public function setCreatedAt($createdAt)
    {

        $this->createdAt= \DateTime::createFromFormat('d-m-Y', $createdAt);
        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        if (is_null($this->createdAt))
            return $this->createdAt;
        return $this->createdAt->format( "d-m-Y" );
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return News
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return News
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set specialsBackground
     *
     * @param string $specialsBackground
     *
     * @return News
     */
    public function setSpecialsBackground($specialsBackground)
    {
        $this->specialsBackground = $specialsBackground;

        return $this;
    }

    /**
     * Get specialsBackground
     *
     * @return string
     */
    public function getSpecialsBackground()
    {
        return $this->specialsBackground;
    }

    /**
     * Set shareTitle
     *
     * @param string $shareTitle
     *
     * @return News
     */
    public function setShareTitle($shareTitle)
    {
        $this->shareTitle = $shareTitle;

        return $this;
    }

    /**
     * Get shareTitle
     *
     * @return string
     */
    public function getShareTitle()
    {
        return $this->shareTitle;
    }
}
