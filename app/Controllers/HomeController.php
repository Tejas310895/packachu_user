<?php

namespace App\Controllers;

use CodeIgniter\Shield\Models\UserModel;
use Config\App;

class HomeController extends BaseController
{
    public function __construct()
    {
        $this->productsModel = new \App\Models\ProductsModel();
        $this->customersModel = new \App\Models\CustomerModel();
        $this->ordersModel = new \App\Models\OrdersModal();
        $this->user_model = new UserModel();
    }
    public function home(): string
    {
        $this->data['products'] = $this->productsModel->orderBy('id DESC')->limit(10)->findall();
        return view('includes/header') .
            view('home', $this->data) .
            view('includes/footer');
    }
    public function listing()
    {
        $postdata = $this->request->getPost();
        if (!empty($postdata)) {
            $postdata['type'] = $this->ordersModel::TYPE_WHOLESALE;
            $postdata['status'] = $this->ordersModel::STATUS_OPEN;
            $postdata['created_by'] = auth()->user()->id;
            if ($this->ordersModel->save($postdata)) {
                unset($_COOKIE['products']);
                setcookie('products', '', -1, '/');
                return redirect()->to('order_status/success');
            } else {
                return redirect()->to('order_status/failed');
            }
        }
        $this->data['products'] = $this->productsModel->findall();
        $this->data['customers'] = $this->customersModel->findall();
        return view('includes/header') .
            view('products', $this->data) .
            view('includes/footer');
    }
    public function user_profile(): string
    {
        $postdata = $this->request->getPost();
        $products = $this->productsModel->findall();
        $this->data['products'] = array_reduce($products, function ($carry, $val) {
            $carry[$val['id']] = $val;
            return $carry;
        });
        $this->data['orders'] = $this->ordersModel->findAll();
        if (!empty($postdata)) {
            $user = $this->user_model->findById(auth()->user()->id);
            $user->fill([
                'password' => $postdata['password'],
            ]);
            $this->user_model->save($user);
        }
        return view('includes/header') .
            view('profile', $this->data) .
            view('includes/footer');
    }

    public function order_status($status): string
    {
        $this->data['status'] = $status;
        return view('order_status', $this->data);
    }
}
