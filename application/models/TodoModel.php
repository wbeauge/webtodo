<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


Class ToDoModel extends CI_Model{
    
    function __construct() {
        parent::__construct();
    }
    
    function count(){
        $nombre_Tache = 0;
        $Taches = $this->TodoModel->get_all();
        foreach ($Taches as $tache) {
            $nombre_Tache = $nombre_Tache + 1;
        }
        return $nombre_Tache;
    }
    function count_Fait($completed){
        $nombre_Tache = 0;
        $Taches = $this->TodoModel->get_all();
        foreach ($Taches as $tache) {
            if($tache['completed']==1 && $completed == 1){
                $nombre_Tache = $nombre_Tache + 1;                
            }            
            else {
                if($tache['completed']==0 && $completed == 0) 
                {
                    $nombre_Tache = $nombre_Tache + 1;   
                }
            }
        }
        return $nombre_Tache;
    }
            
    function get_By_Id($id){
        return $this->db->get_where('Todo',array('id'=>$id))->row_array();
    }
    
    function get_all(){
        $this->db->order_by('ordre');
        return $this->db->get('Todo')->result_array();
    }
    
    function add($params){
        $this->db->insert('Todo',$params);
        return $this->db->insert_id();
    }
    
    function update($id,$params){
        $this->db->where('id',$id);
        $this->db->update('Todo',$params);
    }
    
    function delete ($id){
        $this->db->delete('Todo',array('id'=>$id));
    }
    
}

