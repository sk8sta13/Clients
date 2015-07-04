<?php

defined('BASEPATH') or die('No direct script access allowed');

class User extends CI_Controller
{

	public function __construct()
	{

		parent::__construct();

		$this->load->model('Usermodel', 'user');
		$this->load->helper('captcha');

		if (! is_null(get_cookie('clients-language'))) {
			$this->lang->load('app', get_cookie('clients-language'));
			$this->lang->load('form_validation', get_cookie('clients-language'));
		}

	}

	public function index()
	{

		if (($this->session->has_userdata('id')) && ($this->session->active == 2)) {

			$this->load->view('users/index', ['users' => $this->user->getAll()]);

		} else {

			$this->load->view('home/permission-denied');

		}

	}

	public function create()
	{

		$captcha = create_captcha(['img_path' => APPPATH . '../images/captcha/', 'img_url' => base_url() . 'images/captcha/']);
		$this->session->set_userdata('captchaWord', $captcha['word']);

		$this->load->view('users/create', $captcha);

	}

	public function edit($id)
	{

		$this->load->view('users/edit', ['user' => $this->user->getOne(['id' => $id])]);

	}

	public function active($id)
	{

		if (($this->session->has_userdata('id')) && ($this->session->active == 2)) {
			$data = (array) $this->user->getOne(['id' => $id]);
			$data['active'] = ($data['active']) ? 0 : 1;

			$this->user->update($data);

			redirect('/user', 'refresh');
		}

	}

	public function save()
	{

		$cap = '';

		if ($this->user->validate())  {
			$data = $this->input->post();
			if ($this->session->userdata('captchaWord') == $data['captcha']) {
				if (empty($data['id'])) {
					$this->user->insert($data);
				} else {
					$this->user->update($data);
				}

				redirect('/', 'refresh');
			} else {
				$cap = 'incorrect captcha';
			}
		}

		$cap = create_captcha(['img_path' => APPPATH . '../images/captcha/', 'img_url' => base_url() . 'images/captcha/']);
		$this->session->set_userdata('captchaWord', $cap['word']);

		$this->load->view('users/create', array_merge(['error' => true], $cap));

	}

	public function delete($id)
	{

		if (($this->session->has_userdata('id')) && ($this->session->active == 2)) {
			$this->user->delete($id);

			redirect('/user', 'refresh');
		}

	}

}
