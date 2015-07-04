<?php

defined('BASEPATH') or die('No direct script access allowed');

class Client extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();

        $this->load->model('Clientmodel', 'client');

        if (! is_null(get_cookie('clients-language'))) {
            $this->lang->load('app', get_cookie('clients-language'));
            $this->lang->load('form_validation', get_cookie('clients-language'));
        }

    }

    public function index()
    {

        if ($this->session->has_userdata('id')) {

            $this->load->view('client/index', ['clients' => $this->client->getAll()]);

        } else {

            $this->load->view('home/permission-denied');

        }

    }

    public function create()
    {

        if ($this->session->has_userdata('id')) {

            $this->load->view('client/create');

        } else {

            $this->load->view('home/permission-denied');

        }

    }

    public function edit($id)
    {

        if ($this->session->has_userdata('id')) {

            $this->load->view('client/edit', ['client' => $this->client->getOne(['id' => $id])]);

        } else {

            $this->load->view('home/permission-denied');

        }

    }

    public function save()
    {

        if ($this->session->has_userdata('id')) {

            if ($this->client->validate()) {
                $data = $this->input->post();

                if (empty($data['id'])) {
                    $this->client->insert($data);
                } else {
                    $this->client->update($data);
                }

                redirect('/clients', 'refresh');
            } else {

                $this->load->view('client/create', ['error' => true]);

            }

        } else {

            $this->load->view('home/permission-denied');

        }

    }

    public function delete($id)
    {

        if ($this->session->has_userdata('id')) {

            $this->client->delete($id);
            redirect('/clients', 'refresh');

        } else {

            $this->load->view('home/permission-denied');

        }

    }

    public function detail($id)
    {

        if ($this->session->has_userdata('id')) {

            $this->load->view('client/datail', ['client' => $this->client->getOne(['id' => $id])]);

        } else {

            $this->load->view('home/permission-denied');

        }

    }

    public function active($data, $id, $client)
    {

        if ($this->session->has_userdata('id')) {

            $id = $this->client->toggleItem($data, $id);
            redirect('/client/detail/' . $client, 'refresh');

        } else {

            $this->load->view('home/permission-denied');

        }

    }

    public function import()
    {

        if ($this->session->has_userdata('id')) {

            if ($this->input->method() == 'post') {

                if (($_FILES['filecsv']['error'] != 0) || ($_FILES['filecsv']['type'] != 'text/csv')) {

                    $this->load->view('home/settings', ['error' => true]);

                } else {

                    $this->client->importData(file_get_contents($_FILES['filecsv']['tmp_name']));

                    $this->session->set_flashdata('import', true);

                    redirect('/settings', 'refresh');

                }

            }

        } else {

            $this->load->view('home/permission-denied');

        }

    }

}
