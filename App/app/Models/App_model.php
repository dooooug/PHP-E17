<?php
class App_model extends Model{
  
private $mapper;
  
 public function __construct(){
   parent::__construct();
   $this->mapper=$this->getMapper('students');
 }
 
 public function getUser($params){
   return $this->mapper->load(array('id=?',$params['id']));
 }
 
 public function signin($params){
  return $this->mapper->load(array('login=? and password=?', $params['login'], $params['password']));
 }
}
?>