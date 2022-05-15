<?php

namespace App\Controllers;
use App\Models\UsersModel;
use App\Libraries\Hash;

class Auth extends BaseController
{   
    public function __construct(){
        
        helper(['url','Form']) ; 
    }
    // chamar a tela de logi
    public function index(){
        return view('auth/login');
    }

    // chamar a tela de registar usuário
    public function register(){
        return view('auth/register');
    }

    //criar usuario 
    public function save(){
        // vamos validar o request
        $validation = $this->validate([
            'name'=> [
                'rules'=>'required',
                'errors' =>[
                    'required' => 'O campo nome è obrigatorio'
                ]
            ],
            'email' => [
                'rules'=>'required|valid_email|is_unique[users.email]',
                'errors' =>[
                    'required' => 'O campo email è obrigatorio',
                    'valid_email' => 'Email invalido',
                    'is_unique'  => 'Email já exite cadastrado'
                ]
            ],
            'password' =>[
                'rules'=>'required|min_length[5]|max_length[12]',
                'errors' =>[
                    'required' => 'O campo senha è obrigatorio',
                    'min_length' => 'No minimo 5 caracter',
                    'max_length'  => 'No máximo 12 caracter'
                ]
            ],
            'confirm_password' =>[
               'rules'=>'required|min_length[5]|max_length[12]|matches[password]',
               'errors' =>[
                'required' => 'O campo confirmar senha  è obrigatorio',
                'min_length' => 'No minimo 5 caracter',
                'max_length'  => 'No máximo 12 caracter',
                'matches' => 'Diferente da senha'
                ]
            ],
            
    
        ]);

        if(!$validation){
            return view('auth/register', ['validation' =>$this->validator]);
        }else{
             //salvar o usuario
             $name = $this->request->getPost('name');
             $email = $this->request->getPost('email');
             $password = Hash::make($this->request->getPost('password'),PASSWORD_DEFAULT);
        
             $values = [
                 'name' =>$name,
                 'email' => $email,
                 'password' => $password,
             ];
             $usersModel = new UsersModel();
             
             $query = $usersModel->insert($values);

             if(!$query){
                return redirect()->back()->with('fail','Não é possivél criar o usuario');
             }else{
                return redirect()->to('auth/register')->with('success','Cadastrado com successo ');
             }
        }
    }

    //
    public function check() {
        // validar
        $validation = $this->validate([
            'email' => [
                'rules' => 'required|valid_email|is_not_unique[users.email]',
                'errors' => [
                    'required' => 'O campo do email e obrigatório',
                    'valid_email' => 'Email invalido',
                    'is_not_unique' => 'Email não cadastrado'
                ]
            ],
            'password'=> [
                'rules'=>'required|min_length[5]|max_length[12]',
                'errors' => [
                    'required' => 'O campo do senha e obrigatório',
                    'min_length' => 'O minimo de caracter é 5',
                    'max_length' => 'O máximo de caracter é 12'
                ]
            ]       
        ]);

        if(!$validation){
            return view('auth/login', ['validation' => $this->validator]);
        }else{
            // logim
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $usersModel = new UsersModel();
            $user_info =  $usersModel->where('email', $email)->first();
           
            $check_password = Hash::check($password, $user_info['password']);
         

            if(!$check_password){
                session()->setFlashdata('fail','Senha ou email errado');
                return redirect()->to('/auth')->withInput();
            }else{
                $user_id = $user_info['id'];
                session()->set('loggeUser', $user_id);
                return redirect()->to('/dashBoard');
            }

        }
    }

    // deslogar
    public function logout(){
        
        if(session()->has('loggeUser')){
            session()->remove('loggeUser');
            return redirect()->to('/auth?access=out')->with('fail','Você deslogou');

        }
    }

}
