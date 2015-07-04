<?php

/**
 * @Entity
 * @Table(name="phones")
 */

class Phoneentity
{

    /**
     * @Id @Column(type="integer")
     * @GeneratedValue(strategy="IDENTITY")
     */
    public $id = 0;

    /** @Column(type="string", columnDefinition="VARCHAR(30)") */
    public $label = '';

    /** @Column(type="string", columnDefinition="VARCHAR(25) NOT NULL") */
    public $number = '';

    /** @Column(type="boolean", columnDefinition="TINYINT(1)") */
    public $active = 1;

    /**
     * @ManyToOne(targetEntity="Cliententity", inversedBy="phones")
     * @JoinColumn(name="client_id", referencedColumnName="id")
     */
    public $client;

}
/* End of file Phoneentity.php */
/* Location: ./application/model/Entities/Phoneentity.php */