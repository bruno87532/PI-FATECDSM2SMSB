<?php
class Login{
    public function login($id, $nome){
        $_SESSION['login'] = true;
        $_SESSION['login_id'] = $id;
        $_SESSION['login_nome'] = $nome;
    }
    public function logout(){
        if(isset($_SESSION['login']) && $_SESSION['login'] == true){
            unset($_SESSION['login']);
            unset($_SESSION['login_id']);
            unset($_SESSION['login_nome']);
        }
    }
    public function verifyLogin(){
        if(!isset($_SESSION['login'])){                                  
            return false;
        }
        return true;
    }
}
?>