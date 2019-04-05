<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/** @property TodoModel $TodoModel Description
 * 
 */

class ToDo extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->model('TodoModel');
        $this->load->helper('url','form');
        $this->load->library('form_validation');
    }
    
    public function index(){
        //$titre = "Mes tâches à effectuer !!!";
        $all_todos = $this->TodoModel->get_all();
        $data = array();
        $data['title']="au boulot !";
        $data['todos']=$all_todos;
        //$data['occurence']= $this->TodoModel->getById(1);
        $data['count'] = $this->TodoModel->count();
        $data['countfait'] = $this->TodoModel->count_Fait(0);
        $this->load->view('TodoIndex', $data);
    }
    
    public function fait($id){
        //Prepare les données pour update
        $params = array('completed'=>1);
        $this->TodoModel->update($id, $params);
        redirect('ToDo/index');
    }
    
    public function pas_Fait($id){
        //Prepare les données pour update
        $params = array('completed'=>0);
        $this->TodoModel->update($id, $params);
        redirect('ToDo/index');
    }

    public function supprimer($id){
        $this->TodoModel->delete($id);
        redirect('ToDo/index');
    }
    
    public function add(){
        $this->form_validation->set_rules('ordre', 'ordre', 'required|numeric');
        $this->form_validation->set_rules('task','tache','required');
        
        if($this->form_validation->run()==true){
            $task= $this->input->post('task');
            $ordre= $this->input->post('ordre');
            $params = array(
                'ordre'=>$ordre,
                'task'=>$task,
                'completed'=>0
            );
            $this->TodoModel->add($params);
            redirect(base_url('ToDo/index'));
        }
        $this->load->view('TodoAdd');        
    }
    
    
    
    public function modifier($id){
        $this->form_validation->set_rules('ordre', 'ordre', 'required|numeric');
        $this->form_validation->set_rules('task','tache','required');
        
        if($this->form_validation->run()==true){
            $task= $this->input->post('task');
            $ordre= $this->input->post('ordre');
            $params = array(
                'ordre'=>$ordre,
                'task'=>$task,
                'completed'=>0
            );
            $this->TodoModel->update($id,$params);
            redirect(base_url('ToDo/index'));
        }
        $this->load->view('TodoEdit');        
    }
    
}