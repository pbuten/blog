<?php


namespace entity;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="profile")
 */
class Profile
{
	/**
	 * @ORM\id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue
	 * @var int
	 */
	protected $id;

	/**
	 * @ORM\Column(type="integer")
	 * @var int
	 */
	protected $user_id;

	/**
	 * @ORM\Column(type="string")
	 * @var string
	 */
	protected $photo;

	/**
	 * @return string
	 */
	public function getPhoto(): string
	{
		return $this->photo;
	}

	/**
	 * @param string $photo
	 */
	public function setPhoto(string $photo): void
	{
		$this->photo = $photo;
	}

	/**
	 * @return int
	 */
	public function getUserId(): int
	{
		return $this->user_id;
	}

	/**
	 * @param int $user_id
	 */
	public function setUserId(int $user_id): void
	{
		$this->user_id = $user_id;
	}
}