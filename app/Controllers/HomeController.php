<?php

namespace App\Controllers;

use CodeIgniter\Shield\Models\UserModel;
use Config\App;

class HomeController extends BaseController
{
    public function __construct()
    {
        $this->productsModel = new \App\Models\ProductsModel();
        $this->user_model = new UserModel();
    }
    public function home(): string
    {
        $this->data['products'] = $this->productsModel->orderBy('id DESC')->limit(10)->findall();
        return view('includes/header') .
            view('home', $this->data) .
            view('includes/footer');
    }
    public function listing(): string
    {
        $this->data['products'] = $this->productsModel->findall();
        return view('includes/header') .
            view('products', $this->data) .
            view('includes/footer');
    }
    public function user_profile(): string
    {
        $postdata = $this->request->getPost();
        if (!empty($postdata)) {
            $user = $this->user_model->findById(auth()->user()->id);
            $user->fill([
                'password' => $postdata['password'],
            ]);
            $this->user_model->save($user);
        }
        return view('includes/header') .
            view('profile') .
            view('includes/footer');
    }
}
