<?php
class Portfolios extends Controller{
    public function __construct(){
        $this->pageModel = $this->model('Page');
        $this->userModel = $this->model('User');
        $this->portfolioModel = $this->model('Portfolio');
    }

    public function portfolio(){
        $data = [
            'portfolio' => $this->pageModel->getPortfolio(),
            'user' => ''
        ];

        if($_SESSION){
            $data['user'] = $this->userModel->getUserById($_SESSION['userId']);
        }

        $this->view('pages/portfolio', $data);
    }

    public function remove($id){
        $this->portfolioModel->removeById($id);
        redirect('portfolios/portfolio');
    }
}