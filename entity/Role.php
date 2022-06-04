<?php
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="roles")
 */

class Role
{
	/**
	 * @ORM\id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue
	 * @var int
	 */
	protected $id;

	/**
	 * @ORM\Column(type="string")
	 * @var string
	 */
	protected $role_name;

	/**
	 * @ORM\Column(type="string")
	 * @var string
	 */
	protected $permissions;

	/**
	 * @return int
	 */
	public function getId(): int
	{
		return $this->id;
	}

	/**
	 * @return string
	 */
	public function getRoleName(): string
	{
		return $this->role_name;
	}

	/**
	 * @param string $role_name
	 */
	public function setRoleName(string $role_name): void
	{
		$this->role_name = $role_name;
	}

	/**
	 * @return string
	 */
	public function getPermissions(): string
	{
		return $this->permissions;
	}

	/**
	 * @param string $permissions
	 */
	public function setPermissions(string $permissions): void
	{
		$this->permissions = $permissions;
	}
}