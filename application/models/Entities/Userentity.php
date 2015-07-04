<?php

/**
 * @Entity
 * @Table(name="users")
 */

class Userentity
{

	/**
	 * @Id @Column(type="integer")
	 * @GeneratedValue(strategy="IDENTITY")
	 */
	public $id = 0;

	/** @Column(type="string", columnDefinition="VARCHAR(100) NOT NULL") */
	public $name = '';

	/** @Column(type="string", columnDefinition="VARCHAR(100) NOT NULL") */
	public $email = '';

	/** @Column(type="string", columnDefinition="VARCHAR(20) NOT NULL") */
	public $username = '';

	/** @Column(type="string", columnDefinition="VARCHAR(60) NOT NULL") */
	public $password = '';

	/** @Column(type="boolean", columnDefinition="TINYINT(1)") */
	public $active = 1;

 	/** @Column(type="datetime") */
	public $created_at = '';

	/** @Column(type="datetime") */
	public $updated_at = '';

	/**
	 * @OneToMany(targetEntity="Cliententity", mappedBy="user")
	 */
	public $clients;

}
/* End of file Userentity.php */
/* Location: ./application/model/Entities/Userentity.php */