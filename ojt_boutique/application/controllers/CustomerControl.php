<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CustomerControl extends CI_Controller {
    /* constructor */
    public function __construct()
	{
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->model('AdminModel');
    }

    /*load home page*/
	public function home()
	{
		$this->load->view('customer_home');
	}
    /*load cart page*/
	public function cart()
	{
		$this->load->view('customer_cart');
	}
    
    /*load orders page*/
	public function orders()
	{
		$this->load->view('customer_orders');
    }
    /*load product add page*/
	public function productAdd()
	{
		$this->load->view('boutique_product_add');
    }
    /*load boutique profile page*/
	public function customerProfile()
	{
		$data['result']=$this->AdminModel->customerProfile();
		$this->load->view('customer_profile',$data);
    }

    /*load boutique profile update*/
    public function boutiqueProfileUpdate()
	{
        $data = array(
			'u_id' => $this->input->post('bid'),
            'u_name' => $this->input->post('bname'),
            'u_address' => $this->input->post('baddress'),
            'mobile' => $this->input->post('mobile'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            );
        if($this->AdminModel->boutiqueProfileUpdate($data))
        {
            echo "no insert";
        }
        else
        {
            $this->load->view('boutique_profile',$data);
        }
	}
}

?>