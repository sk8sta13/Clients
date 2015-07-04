<?php

include_once 'Entities' . DIRECTORY_SEPARATOR . 'Userentity.php';
include_once 'Entities' . DIRECTORY_SEPARATOR . 'Cliententity.php';
include_once 'Entities' . DIRECTORY_SEPARATOR . 'Addressentity.php';
include_once 'Entities' . DIRECTORY_SEPARATOR . 'Customentity.php';
include_once 'Entities' . DIRECTORY_SEPARATOR . 'Documententity.php';
include_once 'Entities' . DIRECTORY_SEPARATOR . 'Emailentity.php';
include_once 'Entities' . DIRECTORY_SEPARATOR . 'Phoneentity.php';

class Usermodel extends CI_Model
{

    public $em;
    public $entity;

    public function __construct()
    {

        parent::__construct();

        $this->entity = new Userentity();
        $this->em = $this->doctrine->em;

    }

    public function validate()
    {

        $rules = [
            ['field' => 'name', 'label' => ucfirst($this->lang->line('name')), 'rules' => 'trim|required'],
            ['field' => 'email', 'label' => ucfirst($this->lang->line('e-mail')), 'rules' => 'trim|required|valid_email'],
            ['field' => 'username', 'label' => ucfirst($this->lang->line('username')), 'rules' => 'trim|required|min_length[5]'],
            ['field' => 'password', 'label' => ucfirst($this->lang->line('password')), 'rules' => 'trim|required|min_length[5]|md5']
        ];
        $this->form_validation->set_rules($rules);
        return $this->form_validation->run();

    }

    public function getAll()
    {

        return $this->em->getRepository('Userentity')->findAll();

    }

    public function getOne($id)
    {

        return $this->em->find('Userentity', $id);

    }

    public function getBy(Array $data)
    {

        if (array_key_exists('password', $data)) {
            $data['password'] = md5($data['password']);
        }
        return $this->em->getRepository('Userentity')->findBy($data);

    }

    public function insert(Array $data)
    {

        $d = new DateTime('now');
        $this->persist(array_merge($data, ['created_at' => $d, 'updated_at' => $d]));

    }

    public function update(Array $data)
    {

        $this->entity = $this->getOne($data['id']);
        $this->persist(array_merge($data, ['updated_at' => new DateTime('now')]));

    }

    public function delete($id)
    {

        $this->entity = $this->em->getPartialReference('Userentity', $id);

        $this->em->remove($this->entity);
        $this->em->flush();

    }

    private function persist(Array $data)
    {

        $this->entity->name = $data['name'];
        $this->entity->email = $data['email'];
        $this->entity->username = $data['username'];
        $this->entity->password = $data['password'];

        if (array_key_exists('active', $data)) {
            $this->entity->active = $data['active'];
        }

        if (array_key_exists('created_at', $data)) {
            $this->entity->created_at = $data['created_at'];
        }

        if (array_key_exists('updated_at', $data)) {
            $this->entity->updated_at = $data['updated_at'];
        }

        $this->em->persist($this->entity);
        $this->em->flush();

    }

}