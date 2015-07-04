<?php

/**
 * @Entity
 * @Table(name="documents")
 */

class Documententity
{

    /**
     * @Id @Column(type="integer")
     * @GeneratedValue(strategy="IDENTITY")
     */
    public $id = 0;

    /** @Column(type="string", columnDefinition="VARCHAR(30)") */
    public $label = '';

    /** @Column(type="string", columnDefinition="VARCHAR(30) NOT NULL") */
    public $number = '';

    /** @Column(type="boolean", columnDefinition="TINYINT(1)") */
    public $active = 1;

    /**
     * @ManyToOne(targetEntity="Cliententity", inversedBy="documents")
     * @JoinColumn(name="client_id", referencedColumnName="id")
     */
    public $client;

}
/* End of file Documententity.php */
/* Location: ./application/model/Entities/Documententity.php */