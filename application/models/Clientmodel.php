<?php

include_once 'Entities' . DIRECTORY_SEPARATOR . 'Addressentity.php';
include_once 'Entities' . DIRECTORY_SEPARATOR . 'Cliententity.php';
include_once 'Entities' . DIRECTORY_SEPARATOR . 'Customentity.php';
include_once 'Entities' . DIRECTORY_SEPARATOR . 'Documententity.php';
include_once 'Entities' . DIRECTORY_SEPARATOR . 'Emailentity.php';
include_once 'Entities' . DIRECTORY_SEPARATOR . 'Phoneentity.php';
include_once 'Entities' . DIRECTORY_SEPARATOR . 'Userentity.php';

class Clientmodel extends CI_Model
{

    public $em;
    public $entity;

    public function __construct()
    {

        parent::__construct();

        $this->entity = new Cliententity();
        $this->em = $this->doctrine->em;

    }

    public function validate()
    {

        $rules = [
            ['field' => 'name', 'label' => ucfirst($this->lang->line('name')), 'rules' => 'trim|required'],
            ['field' => 'sex', 'label' => ucfirst($this->lang->line('sex')), 'rules' => 'trim|required']
        ];
        $this->form_validation->set_rules($rules);
        return $this->form_validation->run();

    }

    public function getAll()
    {

        return $this->em->getRepository('Cliententity')->findAll();

    }

    public function getOne($id)
    {

        return $this->em->find('Cliententity', $id);

    }

    public function getBy(Array $data)
    {

        if (array_key_exists('password', $data)) {
            $data['password'] = md5($data['password']);
        }
        return $this->em->getRepository('Cliententity')->findBy($data);

    }

    public function getDataService($user, $type = 'json')
    {

        $queryBuilder = $this
            ->em
            ->createQueryBuilder()
            ->select('cl, e, p, a, d, c')
            ->from('Cliententity', 'cl')
            ->where('cl.user = :user')
            ->setParameter('user', $user)
            ->leftJoin('cl.emails', 'e')
            ->leftjoin('cl.phones', 'p')
            ->leftJoin('cl.addresses', 'a')
            ->leftjoin('cl.documents', 'd')
            ->leftjoin('cl.custom', 'c');
        $query = $queryBuilder->getQuery();
        $results = $query->getArrayResult();
        $results = $query->execute(array(), \Doctrine\ORM\Query::HYDRATE_ARRAY);

        if ($type == 'json') {
            return json_encode($results);
        } else {
            $this->load->library('XMLParser');
            $return = XMLParser::encode($results);
            return $return->asXML();
        }

    }

    public function insert(Array $data)
    {

        $d = new DateTime('now');
        $this->persist(array_merge($data, ['created_at' => $d, 'updated_at' => $d]));

    }

    public function update(Array $data)
    {

        $this->entity = $this->getOne($data['id']);

        $this->deleteRelationship();

        $this->persist(array_merge($data, ['updated_at' => new DateTime('now')]));

    }

    public function delete($id)
    {

        $this->entity = $this->getOne($id);

        $this->deleteRelationship();

        $this->em->remove($this->entity);
        $this->em->flush();

    }

    public function toggleItem($item, $id)
    {

        switch ($item) {
            case 'phone':
                $repo = $this->em->getRepository('Phoneentity');
                break;
            case 'address':
                $repo = $this->em->getRepository('Addressentity');
                break;
            case 'email':
                $repo = $this->em->getRepository('Emailentity');
                break;
            case 'document':
                $repo = $this->em->getRepository('Documententity');
                break;
            case 'custom':
                $repo = $this->em->getRepository('Customentity');
                break;
        }

        $e = $repo->findOneBy(['id' => $id]);
        $e->active = ($e->active) ? 0 : 1;
        $this->em->persist($e);
        $this->em->flush();

    }

    public function importData($csv)
    {

        $client = [];
        $lines = explode('\n', $csv);
        for($i = 0; $i <= (count($lines) - 1); $i++) {
            $d = explode(',', $lines[$i]);
            $client['name'] = str_replace('"', '', $d[0]);
            $client['birthday'] = str_replace('"', '', $d[1]);
            $client['sex'] = str_replace(['"', 'M', 'm', 'F', 'f'], ['', 'male', 'male', 'Female', 'Female'], $d[2]);

            $emails = explode(';', str_replace('"', '', $d[3]));
            for($c = 0; $c <= (count($emails) - 1); $c++) {
                $e = explode(':', $emails[$c]);
                $client['email']['label'][$c] = $e[0];
                $client['email']['address'][$c] = $e[1];
            }

            $phones = explode(';', str_replace('"', '', $d[4]));
            for($c = 0; $c <= (count($phones) - 1); $c++) {
                $p = explode(':', $phones[$c]);
                $client['phone']['label'][$c] = $p[0];
                $client['phone']['number'][$c] = $p[1];
            }

            $documents = explode(';', str_replace('"', '', $d[5]));
            for($c = 0; $c <= (count($documents) - 1); $c++) {
                $o = explode(':', $documents[$c]);
                $client['document']['label'][$c] = $o[0];
                $client['document']['number'][$c] = $o[1];
            }

            $custom = explode(';', str_replace('"', '', $d[6]));
            for($c = 0; $c <= (count($custom) - 1); $c++) {
                $u = explode(':', $custom[$c]);
                $client['custom']['data'][$c] = $u[0];
                $client['custom']['value'][$c] = $u[1];
            }

            $addresses = explode(';', str_replace('"', '', $d[7]));
            for($c = 0; $c <= (count($addresses) - 1); $c++) {
                $a = explode(':', $addresses[$c]);
                $client['address']['label'][$c] = $a[0];
                $dat = explode('/', $a[1]);
                $client['address']['patio'][$c] = $dat[0];
                $client['address']['number'][$c] = $dat[1];
                $client['address']['neighborhood'][$c] = $dat[2];
                $client['address']['city'][$c] = $dat[3];
                $client['address']['country'][$c] = $dat[4];
                $client['address']['state'][$c] = $dat[5];
                $client['address']['cep'][$c] = $dat[6];
            }
        }
        $this->insert($client);

    }

    private function deleteRelationship()
    {

        foreach ($this->entity->emails as $email) {
            $this->em->remove($email);
            $this->em->flush();
        }

        foreach ($this->entity->phones as $phone) {
            $this->em->remove($phone);
            $this->em->flush();
        }

        foreach ($this->entity->addresses as $address) {
            $this->em->remove($address);
            $this->em->flush();
        }

        foreach ($this->entity->documents as $document) {
            $this->em->remove($document);
            $this->em->flush();
        }

        foreach ($this->entity->custom as $custom) {
            $this->em->remove($custom);
            $this->em->flush();
        }

    }

    private function persist(Array $data)
    {

        $this->entity->name = $data['name'];
        $this->entity->birthday = new DateTime(implode('-', array_reverse(explode('/', $data['birthday']))));
        $this->entity->sex = $data['sex'];
        $this->entity->user = $this->em->getRepository('Userentity')->find($this->session->id);

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

        for ($i = 0; $i <= (count($data['email']['address']) - 1); $i++) {
            $email = new Emailentity();
            $email->client = $this->entity;
            $email->label = $data['email']['label'][$i];
            $email->address = $data['email']['address'][$i];
            $this->em->persist($email);
        }

        for ($i = 0; $i <= (count($data['phone']['number']) - 1); $i++) {
            $phone = new Phoneentity();
            $phone->client = $this->entity;
            $phone->label = $data['phone']['label'][$i];
            $phone->number = $data['phone']['number'][$i];
            $this->em->persist($phone);
        }

        for ($i = 0; $i <= (count($data['document']['number']) - 1); $i++) {
            $document = new Documententity();
            $document->client = $this->entity;
            $document->label = $data['document']['label'][$i];
            $document->number = $data['document']['number'][$i];
            $this->em->persist($document);
        }

        for ($i = 0; $i <= (count($data['address']['patio']) - 1); $i++) {
            $address = new Addressentity();
            $address->client = $this->entity;
            $address->label = $data['address']['label'][$i];
            $address->patio = $data['address']['patio'][$i];
            $address->number = $data['address']['number'][$i];
            $address->neighborhood = $data['address']['neighborhood'][$i];
            $address->city = $data['address']['city'][$i];
            $address->state = $data['address']['state'][$i];
            $address->country = $data['address']['country'][$i];
            $address->cep = $data['address']['cep'][$i];
            $this->em->persist($address);
        }

        for ($i = 0; $i <= (count($data['custom']['value']) - 1); $i++) {
            $custom = new Customentity();
            $custom->client = $this->entity;
            $custom->data = $data['custom']['data'][$i];
            $custom->value = $data['custom']['value'][$i];
            $this->em->persist($custom);
        }

        $this->em->flush();

    }

}
