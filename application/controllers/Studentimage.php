<?php
class Studentimage extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function  index()
    {
        $this->load->library('form_validation');
        $this->load->library('upload');
        $this->load->view('studentdata');
    }
    public function addstudentimage()
    {
        
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('studentname', 'Studentname', 'required');
        $this->form_validation->set_rules('studentage', 'Studentage', 'required');
        $this->form_validation->set_rules('studentgender', 'Studentgender', 'required');
        $this->form_validation->set_rules('studentaddress', 'Studentaddress', 'required');
        $this->form_validation->set_rules('studentrollno', 'Studentrollno', 'required');
    
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('studentdata');
        }

        $this->load->model("Studentmodel");
        $this->load->library('upload');

        $data["name"] = trim(htmlentities($this->input->post('studentname')));
        $data["age"] = trim(htmlentities($this->input->post('studentage')));
        $data["gender"] = trim(htmlentities($this->input->post('studentgender')));
        $data["address"] = trim(htmlentities($this->input->post('studentaddress')));
        $data["rollno"] = trim(htmlentities($this->input->post('studentrollno')));

        $this->load->library('upload');
	    $this->upload->initialize($this->set_upload_options());
        $this->upload->do_upload();
        $data["image"] = $_FILES['userfile']['name'];
        $insertdata = $this->Studentmodel->addstudentdata($data);
    }

    private function set_upload_options()
    {   
        //  upload an image options
        $config = array();
        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'gif|jpg|png|pdf';
        $config['max_size']      = '1000';
        $config['overwrite']     = FALSE;
        return $config;
    }
    
    public function viewstudentdata()
    {
        $this->load->library('pagination');
        $this->load->helper(array('form', 'url'));
        $this->load->model('Studentmodel');

        //pagination design
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tag_close']  = '<span aria-hidden="true"></span></span></li>';
        // $config['next_tag_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tag_close']  = '</span></li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tag_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tag_close']  = '</span></li>';
        //pagination design ends
        
        
        $config['total_rows'] = $this->Studentmodel->getstudentrows();
        $config['base_url'] = base_url()."index.php/Studentimage/viewstudentdata";
        $config['per_page'] = 2;
        $config["uri_segment"] = 3;
        $config['use_page_numbers'] = TRUE;
       

        $this->pagination->initialize($config);
        //$query = $this->Studentmodel->getstudentdata(5,$this->uri->segment(2));
        //  echo $this->uri->segment(1);
        // $data['studentdata'] = null;
        $page = ($this->uri->segment(3)) ? ($this->uri->segment(3)) : 0;
        $studentresult = $this->Studentmodel->getstudentdata($config['per_page'],$page);
        if($studentresult){
        $data['studentdata'] =  $studentresult;
        $data["links"] = $this->pagination->create_links();
       }
       $this->load->view('viewstudentdata', $data);
    }

	public function deletestudentdata()
	 {
        $this->load->model('Studentmodel');
        $deleteid = trim(htmlentities($this->input->get('id')));
        $deletearray = array("id"=>$deleteid);
        $deleteresult = $this->Studentmodel->deletestudentdata($deletearray);
        if($deleteresult)
        {
        $this->viewstudentdata();
        }
        else
        {
            echo "delete was un successfull";
        }

     }
     
	public function editstudentdata()
        {
        $this->load->helper(array('form', 'url'));
        $this->load->model('Studentmodel');
        $editid = trim(htmlentities($this->input->get('id')));
        $editarray = array("id"=>$editid);
        $editresult["studenteditdata"] = $this->Studentmodel->editstudentdata($editarray);
        
        if($editresult)
        {
        //$this->load->view('editstudentdata',$editresult);
        }

        }

     public function updatestudentdata()
        {
        $this->load->model('Studentmodel');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('studentname', 'Studentname', 'required');
        $this->form_validation->set_rules('studentage', 'Studentage', 'required');
        //$this->form_validation->set_rules('studentgender', 'Studentgender', 'required');
        $this->form_validation->set_rules('studentaddress', 'Studentaddress', 'required');
        $this->form_validation->set_rules('studentrollno', 'Studentrollno', 'required');

        if ($this->form_validation->run() == FALSE)
        {
                $this->load->view('studentregistration');
        }
        else
        {  
        $updateerror = array();
        $updatedata = array();
        //validating name
        if(is_numeric(trim(htmlentities($this->input->post('studentname')))))
        {
                $updateerror["studentname"] = "only Characters allowed";
        }
        else
        {
            $updatedata['name'] = trim(htmlentities($this->input->post('studentname')));
                
        }
        //validating name ends
        //validating age
        if(is_numeric(trim(htmlentities($this->input->post('studentage')))))
        {
            $updatedata['age'] = trim(htmlentities($this->input->post('studentage')));
            
        }
        else
        {
            $updateerror["studentage"] = "Please enter a valid  age";
        }
        //validating age ends
        //validating rollno
        if(is_numeric(trim(htmlentities($this->input->post('studentrollno')))))
        {
            $updatedata['rollno'] = trim(htmlentities($this->input->post('studentrollno')));
            
        }
        else
        {
            $updateerror["studentrollno"] = "Please enter a valid Rollno";
        }
        //validating rollno ends

        //validating gender
        if(trim(htmlentities($this->input->post('studentgender'))))
        {
            $updatedata['gender'] = trim(htmlentities($this->input->post('studentgender')));
            
        }
        
        // //validating gender ends
        // validating address
        if(trim(htmlentities($this->input->post('studentaddress'))))
        {
            $updatedata['address'] = trim(htmlentities($this->input->post('studentaddress')));
            
        }
        // validating address ends
        if(count($updateerror)>0)
        {
            $this->load->view('editstudentdata',$updateerror);
            
        }
        else
        {
            $updateid = trim(htmlentities($this->input->post('updateid')));
            
            $addstudent = $this->Studentmodel->updatestudentdata($updateid,$updatedata);
            if($addstudent)
            {
                $this->viewstudentdata();
            }
        }
                
      }//else ends
    }//function ends

}
?>