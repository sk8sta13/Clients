<?php

/**
 * @Entity
 * @Table(name="custom")
 */

class Customentity
{

    /**
     * @Id @Column(type="integer")
     * @GeneratedValue(strategy="IDENTITY")
     */
    public $id = 0;

    /** @Column(type="string", columnDefinition="VARCHAR(30)") */
    public $data = '';

    /** @Column(type="text") */
    public $value = '';

    /**
     * @ManyToOne(targetEntity="Cliententity", inversedBy="customfield")
     * @JoinColumn(name="client_id", referencedColumnName="id")
     */
    public $client;

}
/* End of file CustomFieldentity.php */
/* Location: ./application/model/Entities/CustomFieldentity.php */