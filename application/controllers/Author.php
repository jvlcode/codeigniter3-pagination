<?php 

class Author extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
		$this->load->model('author_model');
		$this->load->library('pagination');
	}

	public function index(){
		$config['base_url'] = base_url('author');
		$config['total_rows'] = $this->author_model->getCount();
		$config['per_page'] = 10;
		$config['uri_segment'] = 2;
		$this->pagination->initialize($config);
		if($this->uri->segment(2)!=null){
			$page = $this->uri->segment(2);
		}else{
			$page=0;
		}
		$data['links'] = $this->pagination->create_links();
		$data['authors'] = $this->author_model->getAuthors($config['per_page'],$page);
		$this->load->view('authors_view',$data);
	}
}
