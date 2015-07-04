<?php

/**
 * @Entity
 * @Table(name="emails")
 */

class Emailentity
{

    /**
     * @Id @Column(type="integer")
     * @GeneratedValue(strategy="IDENTITY")
     */
    public $id = 0;

    /** @Column(type="string", columnDefinition="VARCHAR(30)") */
    public $label = '';

    /** @Column(type="string", columnDefinition="VARCHAR(100) NOT NULL") */
    public $address = '';

    /** @Column(type="boolean", columnDefinition="TINYINT(1)") */
    public $active = 1;

    /**
     * @ManyToOne(targetEntity="Cliententity", inversedBy="emails")
     * @JoinColumn(name="client_id", referencedColumnName="id")
     */
    public $client;

}
/* End of file Emailentity.php */
/* Location: ./application/model/Entities/Emailentity.php */