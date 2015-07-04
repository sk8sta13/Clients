<?php

/**
 * @Entity
 * @Table(name="address")
 */

class Addressentity
{

    /**
     * @Id @Column(type="integer")
     * @GeneratedValue(strategy="IDENTITY")
     */
    public $id = 0;

    /** @Column(type="string", columnDefinition="VARCHAR(30)") */
    public $label = '';

    /** @Column(type="string", columnDefinition="VARCHAR(100) NOT NULL") */
    public $patio = '';

    /** @Column(type="string", columnDefinition="VARCHAR(10) NOT NULL") */
    public $number = '';

    /** @Column(type="string", columnDefinition="VARCHAR(30) NOT NULL") */
    public $neighborhood = '';

    /** @Column(type="string", columnDefinition="VARCHAR(30) NOT NULL") */
    public $city = '';

    /** @Column(type="string", columnDefinition="VARCHAR(30) NOT NULL") */
    public $state = '';

    /** @Column(type="string", columnDefinition="VARCHAR(30) NOT NULL") */
    public $country = '';

    /** @Column(type="string", columnDefinition="VARCHAR(15) NOT NULL") */
    public $cep = '';

    /** @Column(type="boolean", columnDefinition="TINYINT(1)") */
    public $active = 1;

    /**
     * @ManyToOne(targetEntity="Cliententity", inversedBy="addresses")
     * @JoinColumn(name="client_id", referencedColumnName="id")
     */
    public $client;

}
/* End of file Addressentity.php */
/* Location: ./application/model/Entities/Addressentity.php */