<?php

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 * @Table(name="clients")
 */

class Cliententity
{

    /**
     * @Id @Column(type="integer")
     * @GeneratedValue(strategy="IDENTITY")
     */
    public $id = 0;

    /** @Column(type="string", columnDefinition="VARCHAR(80)") */
    public $name = '';

    /** @Column(type="date") */
    public $birthday = '';

    /** @Column(type="string", columnDefinition="Enum('male', 'Female')") */
    public $sex = '';

    /** @Column(type="datetime") */
    public $created_at = '';

    /** @Column(type="datetime") */
    public $updated_at = '';

    /**
     * @ManyToOne(targetEntity="Userentity")
     * @JoinColumn(name="user_id", referencedColumnName="id")
     */
    public $user;

    /** @OneToMany(targetEntity="Phoneentity", mappedBy="client") */
    public $phones;

    /** @OneToMany(targetEntity="Emailentity", mappedBy="client") */
    public $emails;

    /** @OneToMany(targetEntity="Documententity", mappedBy="client") */
    public $documents;

    /** @OneToMany(targetEntity="Addressentity", mappedBy="client") */
    public $addresses;

    /** @OneToMany(targetEntity="Customentity", mappedBy="client") */
    public $custom;

    public function __construct()
    {

        $this->phones = new ArrayCollection();
        $this->emails = new ArrayCollection();
        $this->documents = new ArrayCollection();
        $this->addresses = new ArrayCollection();
        $this->custom = new ArrayCollection();

    }

}
/* End of file Cliententity.php */
/* Location: ./application/model/Entities/Cliententity.php */