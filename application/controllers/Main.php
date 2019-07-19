<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('employee_model', 'em');
	}

	public function index()
	{
		$data['cates'] = $this->em->fetchDatas('category');
		$data['prods'] = $this->em->fetchCates();
		$this->load->view('layout/header');
		$this->load->view('employee/index', $data);
		$this->load->view('layout/footer');
	}

	public function putData()
	{
		if (!empty($_POST)) {

			$hobbs = implode(',', $this->input->post('checks'));
			$data = array(
				'fullname' => $this->input->post('fullname'),
				'genders' => $this->input->post('genders'),
				'emailadd' => $this->input->post('emailadd'),
				'homeadd' => $this->input->post('homeadd'),
				'contacts' => $this->input->post('contacts'),
				'checks' => $hobbs,
				'image' => $_FILES['image']['name'],
				'created_at' => date('Y-m-d H:i:s', time())
			);

			$config['upload_path']          = 'uploads/';
	        $config['allowed_types']        = 'gif|jpg|png|jpeg';
	        $config['max_size']             = '55000';
	        // $config['max_width']            = '1024';
	        // $config['max_height']           = '768';
	        
	        $this->load->library('upload', $config);
	        $this->upload->initialize($config);
	        
	        if ( ! $this->upload->do_upload('image') ) {
	            echo '<h3 align="center" style="color: red"><b> Upload Failed </b></h3>';
	        } else {
	            $form_data = $this->em->putDatas('employee', $data);
	            $this->session->set_flashdata('msg', 'Succefully Registered');
	            redirect(base_url());
	                           
	        }

			// if (count($data) != 0) {
			// 	$result = $this->em->putDatas($data);
			// } else {
			// 	redirect(base_url());	
			// }

		}
		
	}

	public function putCat()
	{
		// echo "<pre>"; print_r($_POST); echo "</pre>"; die();
		if (!empty($_POST)) {
			$data = array(
				'category_name' => $this->input->post('catname'),
				'status' => '0',
				'created_at' => date('Y-m-d H:i:s', time())
			);

			if (!empty($data)) {
				$form_data = $this->em->putDatas('category',$data);
				$this->session->set_flashdata('msg_cat_pass', 'Succefully Category Added');
				redirect(base_url());
			} else {
				echo "<h3> Something went wrong !!! </h3>";
			}
		} else {
			$this->session->set_flashdata('msg_cat_fail', 'Fill the all fields !!!');
			redirect(base_url());
		}

	}

	public function putProd()
	{
		// echo "<pre>"; print_r($_POST); echo "</pre>"; die();
		if (!empty($this->input->post('categorys') && !empty($this->input->post('prodname'))))
		{

			$data = array(
				'cat_id' => $this->input->post('categorys'),
				'prod_name' => $this->input->post('prodname'),
				'prod_desc' => $this->input->post('description'),
				'prod_quentity' => $this->input->post('quentity'),
				'status' => '0',
				'created_at' => date('Y-m-d H:i:s', time())
			);

			if (!empty($data)) {
				$form_data = $this->em->putDatas('product',$data);
				$this->session->set_flashdata('msg_prod_pass', 'Succefully Product Added');
				redirect(base_url());
			} else {
				echo "<h3> Something went wrong !!! </h3>";
			}

		} else {
			$this->session->set_flashdata('msg_prod_fail', 'Fill the all fields !!!');
			redirect(base_url());
		}
	}




}

