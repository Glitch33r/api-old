<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;
use FOS\UserBundle\Model\User as BaseUser;
use Symfony\Component\Security\Core\User\EquatableInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * User
 *
 * @ORM\Table(name="fos_user_table", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_957A647992FC23A8", columns={"username_canonical"}), @ORM\UniqueConstraint(name="UNIQ_957A6479A0D96FBF", columns={"email_canonical"})})
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Entity(repositoryClass="ApiBundle\Entity\Repository\UserRepository")
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="FosGroup", inversedBy="user")
     * @ORM\JoinTable(name="fos_user_user_group",
     *   joinColumns={
     *     @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="group_id", referencedColumnName="id")
     *   }
     * )
     */
    private $group;
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="CustomCover", mappedBy="creator")
     */
    private $customCovers;
    /**
     * @var \Orders
     *
     * @ORM\OneToMany(targetEntity="Order", mappedBy="user",cascade={"persist","remove"}, orphanRemoval=true)
     *
     */
    private $orders;
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * covers, which where selected as liked
     *
     * @ORM\ManyToMany(targetEntity="Cover", mappedBy="users")
     */
    private $likes;
    /**
     * @var \Orders
     *
     * orders,under handling of admin
     *
     * @ORM\OneToMany(targetEntity="Order", mappedBy="manager")
     *
     */
    private $inProgress;

    /**
     * @ORM\Column(name="telephone", type="string", length=255, nullable=true)
     */
    private $telephone;

    /**
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;
    /**
     * @ORM\Column(name="facebook_id", type="string", length=255, nullable=true)
     */
    protected $facebook_id;
    /**
     * @ORM\Column(name="facebook_access_token", type="string", length=255, nullable=true)
     */
    protected $facebook_access_token;
    /**
     * @ORM\Column(name="google_id", type="string", length=255, nullable=true)
     */
    protected $google_id;
    /**
     * @ORM\Column(name="google_access_token", type="string", length=255, nullable=true)
     */
    protected $google_access_token;
    /**
     * @ORM\Column(name="vk_id", type="string", length=255, nullable=true)
     */
    protected $vk_id;
    /**
     * @ORM\Column(name="vk_access_token", type="string", length=255, nullable=true)
     */
    protected $vk_access_token;
    /**
     * @var avatar
     *
     * @ORM\Column(name="avatar", type="text", nullable=true)
     *
     */
    protected $avatar;
    /**
     * is using for store vendor name while registration process
     *
     * @var null
     */
    protected $vendor = null;
    /**
     * @var \Recall
     *
     * user`s recalls
     *
     * @ORM\OneToMany(targetEntity="Recall", mappedBy="user")
     *
     */
    protected $recalls;

    private $oldPassword;
    private $newPassword;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_of_last_purchase", type="datetime", nullable=true)
     */
    private $dateOfLastPurchase;

    /**
     * @var integer
     *
     * @ORM\Column(name="bonus_account_balance", type="integer", nullable=false)
     */
    private $bonusAccountBalance = 0;

    public function __construct()
    {
        parent::__construct();
        $this->roles = array('ROLE_USER');
    }

    /**
     * @return int
     */
    public function getBonusAccountBalance()
    {
        return $this->bonusAccountBalance;
    }

    /**
     * @param int $bonusAccountBalance
     */
    public function setBonusAccountBalance($bonusAccountBalance)
    {
        $this->bonusAccountBalance = $bonusAccountBalance;
    }

    /**
     * @return \DateTime
     */
    public function getDateOfLastPurchase()
    {
        return $this->dateOfLastPurchase;
    }

    /**
     * @param \DateTime $dateOfLastPurchase
     */
    public function setDateOfLastPurchase($dateOfLastPurchase)
    {
        $this->dateOfLastPurchase = $dateOfLastPurchase;
    }

    /**
     * @param $role
     * @return bool
     */
    public function isGranted($role)
    {
        return in_array($role, $this->getRoles());
    }
    /**
     * Get group
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGroup()
    {
        return $this->group;
    }


    /**
     * Add order
     *
     * @param \ApiBundle\Entity\Order $order
     *
     * @return User
     */
    public function addOrder(\ApiBundle\Entity\Order $order)
    {
        $this->orders[] = $order;

        return $this;
    }

    /**
     * Remove order
     *
     * @param \ApiBundle\Entity\Order $order
     */
    public function removeOrder(\ApiBundle\Entity\Order $order)
    {
        $this->orders->removeElement($order);
    }

    /**
     * Get orders
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOrders()
    {
        return $this->orders;
    }

    /**
     * Add inProgress
     *
     * @param \ApiBundle\Entity\Order $inProgress
     *
     * @return User
     */
    public function addInProgress(\ApiBundle\Entity\Order $inProgress)
    {
        $this->inProgress[] = $inProgress;

        return $this;
    }

    /**
     * Remove inProgress
     *
     * @param \ApiBundle\Entity\Order $inProgress
     */
    public function removeInProgress(\ApiBundle\Entity\Order $inProgress)
    {
        $this->inProgress->removeElement($inProgress);
    }

    /**
     * Get inProgress
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getInProgress()
    {
        return $this->inProgress;
    }

    /**
     * Add customCover
     *
     * @param \ApiBundle\Entity\CustomCover $customCover
     *
     * @return User
     */
    public function addCustomCover(\ApiBundle\Entity\CustomCover $customCover)
    {
        $this->customCovers[] = $customCover;

        return $this;
    }

    /**
     * Remove customCover
     *
     * @param \ApiBundle\Entity\CustomCover $customCover
     */
    public function removeCustomCover(\ApiBundle\Entity\CustomCover $customCover)
    {
        $this->customCovers->removeElement($customCover);
    }

    /**
     * Get customCovers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCustomCovers()
    {
        return $this->customCovers;
    }

    /**
     * Add like
     *
     * @param \ApiBundle\Entity\Cover $like
     *
     * @return User
     */
    public function addLike(\ApiBundle\Entity\Cover $like)
    {
        $this->likes[] = $like;

        return $this;
    }

    /**
     * Remove like
     *
     * @param \ApiBundle\Entity\Cover $like
     */
    public function removeLike(\ApiBundle\Entity\Cover $like)
    {
        $this->likes->removeElement($like);
    }

    /**
     * Get likes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLikes()
    {
        return $this->likes;
    }

    /**
     * Set facebookId
     *
     * @param string $facebookId
     *
     * @return User
     */
    public function setFacebookId($facebookId)
    {
        $this->facebook_id = $facebookId;

        return $this;
    }

    /**
     * Get facebookId
     *
     * @return string
     */
    public function getFacebookId()
    {
        return $this->facebook_id;
    }

    /**
     * Set facebookAccessToken
     *
     * @param string $facebookAccessToken
     *
     * @return User
     */
    public function setFacebookAccessToken($facebookAccessToken)
    {
        $this->facebook_access_token = $facebookAccessToken;

        return $this;
    }

    /**
     * Get facebookAccessToken
     *
     * @return string
     */
    public function getFacebookAccessToken()
    {
        return $this->facebook_access_token;
    }

    /**
     * Set googleId
     *
     * @param string $googleId
     *
     * @return User
     */
    public function setGoogleId($googleId)
    {
        $this->google_id = $googleId;

        return $this;
    }

    /**
     * Get googleId
     *
     * @return string
     */
    public function getGoogleId()
    {
        return $this->google_id;
    }

    /**
     * Set googleAccessToken
     *
     * @param string $googleAccessToken
     *
     * @return User
     */
    public function setGoogleAccessToken($googleAccessToken)
    {
        $this->google_access_token = $googleAccessToken;

        return $this;
    }

    /**
     * Get googleAccessToken
     *
     * @return string
     */
    public function getGoogleAccessToken()
    {
        return $this->google_access_token;
    }

    /**
     * Set vkId
     *
     * @param string $vkId
     *
     * @return User
     */
    public function setVkId($vkId)
    {
        $this->vk_id = $vkId;

        return $this;
    }

    /**
     * Get vkId
     *
     * @return string
     */
    public function getVkId()
    {
        return $this->vk_id;
    }
    /**
     * Set vkId
     *
     * @param string $vkId
     *
     * @return User
     */
    public function setVkontakteId($vkId)
    {
        $this->vk_id = $vkId;

        return $this;
    }

    /**
     * Get vkId
     *
     * @return string
     */
    public function getVkontakteId()
    {
        return $this->vk_id;
    }

    /**
     * Set vkAccessToken
     *
     * @param string $vkAccessToken
     *
     * @return User
     */
    public function setVkAccessToken($vkAccessToken)
    {
        $this->vk_access_token = $vkAccessToken;

        return $this;
    }

    /**
     * Get vkAccessToken
     *
     * @return string
     */
    public function getVkAccessToken()
    {
        return $this->vk_access_token;
    }
    /**
     * Set vkAccessToken
     *
     * @param string $vkAccessToken
     *
     * @return User
     */
    public function setVkontakteAccessToken($vkAccessToken)
    {
        $this->vk_access_token = $vkAccessToken;

        return $this;
    }

    /**
     * Get vkAccessToken
     *
     * @return string
     */
    public function getVkontakteAccessToken()
    {
        return $this->vk_access_token;
    }
    public function setVendor($vendor)
    {
        $this->vendor = $vendor;
        return $this;
    }
    public function getVendor(){
        return $this->vendor;
    }

    public function setOldPassword($oldPassword)
    {
        $this->oldPassword = $oldPassword;

        return $this;
    }

    public function getOldPassword()
    {
        return $this->oldPassword;
    }

    public function setNewPassword($newPassword)
    {
        $this->newPassword = $newPassword;

        return $this;
    }

    public function getNewPassword()
    {
        return $this->newPassword;
    }
    /**
     * Serializes the user.
     *
     * The serialized data have to contain the fields used during check for
     * changes and the id.
     *
     * @return string
     */
    public function serialize()
    {
        return serialize(array(
            $this->password,
            $this->salt,
            $this->usernameCanonical,
            $this->username,
            $this->enabled,
            $this->id,
            $this->email,
            $this->emailCanonical,
            $this->avatar,
            $this->vendor
        ));
    }

    /**
     * Unserializes the user.
     *
     * @param string $serialized
     */
    public function unserialize($serialized)
    {
        $data = unserialize($serialized);
        // add a few extra elements in the array to ensure that we have enough keys when unserializing
        // older data which does not include all properties.
        $data = array_merge($data, array_fill(0, 2, null));

        list(
            $this->password,
            $this->salt,
            $this->usernameCanonical,
            $this->username,
            $this->enabled,
            $this->id,
            $this->email,
            $this->emailCanonical,
            $this->avatar,
            $this->vendor
            ) = $data;
    }

    /**
     * Set avatar
     *
     * @param string $avatar
     *
     * @return User
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * Get avatar
     *
     * @return string
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Add recall
     *
     * @param \ApiBundle\Entity\Recall $recall
     *
     * @return User
     */
    public function addRecall(\ApiBundle\Entity\Recall $recall)
    {
        $this->recalls[] = $recall;

        return $this;
    }

    /**
     * Remove recall
     *
     * @param \ApiBundle\Entity\Recall $recall
     */
    public function removeRecall(\ApiBundle\Entity\Recall $recall)
    {
        $this->recalls->removeElement($recall);
    }

    /**
     * Get recalls
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRecalls()
    {
        return $this->recalls;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     *
     * @return User
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    
        return $this;
    }

    /**
     * Get telephone
     *
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * Set name
     *
     * @param string $name
     *
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    public function isEqualTo(UserInterface $user)
    {
        if ($this->password !== $user->getPassword()) {
            return false;
        }

        if ($this->salt !== $user->getSalt()) {
            return false;
        }

        if ($this->username !== $user->getUsername()) {
            return false;
        }

        return true;
    }
}
