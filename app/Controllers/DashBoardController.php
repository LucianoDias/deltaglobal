<?php

namespace App\Controllers;

use App\Models\UsersModel;

class DashBoardController extends BaseController
{
    public function index()
    {
        $usersModel = new  UsersModel();
        $loggedUserId = session()->get('loggeUser');
        $userInfo = $usersModel->find( $loggedUserId);
       
        $data = [
            'title' => 'DashBoard',
            'userInfo' => $userInfo
        ];
        if(session()->has('loggeUser')){
            return view('dashboard/index',$data);
        }else{
            return view('auth/login');
        }
        
    }
}
