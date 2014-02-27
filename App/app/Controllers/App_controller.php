<?php
class App_controller extends Controller{

  public function __construct(){
    parent::__construct();
    $this->tpl=array('sync'=>'main.html');
  }
  
  public function home($f3){
    
  }
  
  public function signin($f3){
    switch($f3->get('VERB')){
      case 'GET': 
        $this->tpl['sync']='signin.html';
      break;
      case 'POST': 
        $auth = $this->model->signin(array('login'=>$f3->get('POST.login'), 'password'=>$f3->get('POST.password')));
        if(!$auth){
          $f3->set('error', 'Oups, vous avez du vous fourvoyer dans vos logins. Ré-essayez, peut être que ça marchera cette foi.');
          $this->tpl['sync']='signin.html';
        }
        else {
          $user = array(
            'id'=>$auth->id,
            'firstname'=>$auth->firstname,
            'lastname'=>$auth->lastname,
            'promo'=>$auth->promo,
            'group'=>$auth->group,
            'subgroup'=>$auth->subgroup
          );
          $f3->set('SESSION', $user);
          $f3->reroute('/');
        }
      break;
    }
  }
  
  public function signout($f3){
    session_destroy();
    $f3->reroute('/signin');
  }  
  
  public function profile($f3){
    switch($f3->get('VERB')){
      case 'GET':
        $this->tpl['sync']='profile.html';
      break;
      case 'POST':
        $this->tpl['sync']='profile.html';
        echo "OKLOL";
      break;
    }
  }
}
?>