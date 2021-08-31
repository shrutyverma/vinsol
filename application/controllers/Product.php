<?php
class Product extends CI_Controller {
	public function __construct()
	{
		Parent::__construct();
		$this->load->model('Product_m', 'pm');
		$this->load->library('form_validation', '','fv');
		
	}
	public function index()
	{

		$this->load->view('product');
	}


	public function add_product()
	{
		$result = $this->db->where('Publish_date',date('Y-m-d',strtotime($this->input->post('publish_date'))))->get('deals')->result();
		if(count($result ) == 0){
			$image_url = $this->do_upload();
			
			$data=array();
			$data = [
				'Title'=>$this->input->post('title'),
				'Description'=>$this->input->post('description'),
				'Price'=>$this->input->post('price'),
				'Publish_date'=>date('Y-m-d',strtotime($this->input->post('publish_date'))),
				'Discounted_price'=>$this->input->post('dprice'),
				'Quantity'=>$this->input->post('quantity'),
				'Image'=>$image_url,
			];
			$this->pm->add_product_data($data);
			$response=['status'=>true, 'response'=>'Deal Added successfully :)'];
		
			//echo json_encode($response);
			$this->load->view('product_status',$response);
		
		}else{
			$response=['status'=>true, 'response'=>'Other Deal already exist on this date'];
			$this->load->view('product_status',$response);
			//echo json_encode($response);
		
		}
	}
	
	public function do_upload(){
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['overwrite'] = FALSE;
		$config['encrypt_name'] = TRUE;
		
		
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('image')) {
			echo 'Image not able to Upload';
			exit;
		} else {

			$upload_data =  array('upload_data' => $this->upload->data());
			
			return $image_url = base_url().'uploads/'.$upload_data['upload_data']['file_name'];
			
		}
	}
	public function buy_now()
	{
		$details = $this->pm->deals_details();
		
		$user_id = $this->input->get('userid');
		
		echo $response = $this->pm->buy_now($user_id,$details);
		exit;
			
	}
	



}
