<?php

namespace App\Entity;

use App\Repository\CommentRepository;
use DateTime;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\Mapping\Annotation\Timestampable;

/**
 * @ORM\Entity(repositoryClass=CommentRepository::class)
 * @ORM\Table(name="comments")
 * @ORM\HasLifecycleCallbacks
 */
class Comment
{
    public function __construct()
    {
        $this->comments = new ArrayCollection();
    }

    /**
     *Primary key.
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * User nick
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     * @Assert\Type(type="string")
     * @Assert\NotBlank
     * @Assert\Length(
     *     min="3",
     *     max="255",
     * )
     */
    private string $userNick;

    /**
     * User email
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\Type(type="string")
     * @Assert\NotBlank
     * @Assert\Length(
     *     min="3",
     *     max="255",
     * )
     */
    private string $userEmail;

    /**
     * Comment content
     * @var string
     *
     * @ORM\Column(type="string", length=1020)
     *
     * @Assert\Type(type="string")
     * @Assert\NotBlank
     * @Assert\Length(
     *     min="3",
     *     max="1020",
     * )
     */
    private string $commentContent;

    /**
     * Created at.
     * @var DateTimeInterface
     *
     * @ORM\Column(type="datetime")
     *
     * @Gedmo\Timestampable(on="create")
     *
     * @Assert\Type(type="\DateTimeInterface")
     */
    private DateTimeInterface $createdAt;


    public function __toString(): string
    {
        return (string) $this->getUserNick().' '.$this->getUserEmail();
    }

    /**
     * Getter for Id.
     *
     * @return int|null Result
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Getter for User nick.
     *
     * @return string|null Result
     */
    public function getUserNick(): ?string
    {
        return $this->userNick;
    }

    /**
     * Setter for User nick.
     *
     * @param string $userNick User nick
     *
     * @return Comment
     */
    public function setUserNick(string $userNick): self
    {
        $this->userNick = $userNick;

        return $this;
    }

    /**
     * Getter for User email.
     *
     * @return string|null Result
     */
    public function getUserEmail(): ?string
    {
        return $this->userEmail;
    }

    /**
     * Setter for User email.
     *
     * @param string $userEmail User email
     *
     * @return Comment
     */
    public function setUserEmail(string $userEmail): self
    {
        $this->userEmail = $userEmail;

        return $this;
    }

    /**
     * Getter for Comment content.
     *
     * @return string|null Result
     */
    public function getCommentContent(): ?string
    {
        return $this->commentContent;
    }

    /**
     * Setter for Comment content.
     *
     * @param string $commentContent Comment content
     *
     * @return Comment
     */
    public function setCommentContent(string $commentContent): self
    {
        $this->commentContent = $commentContent;

        return $this;
    }

    /**
     * Getter for CreatedAt.
     *
     *@return DateTimeInterface|null Created at
     */
    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    /**
     * Setter for Comment content.
     *
     * @param DateTimeInterface $createdAt CreatedAt
     *
     * @return Comment
     */
    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

}
