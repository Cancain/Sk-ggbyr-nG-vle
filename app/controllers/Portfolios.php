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

        $this->view('portfolios/portfolio', $data);
    }

    public function remove($id){
        $this->portfolioModel->removeById($id);
        redirect('portfolios/portfolio');
    }

    public function add(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Sanitize data
            filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'title' => $_POST['title'],
                'body' => $_POST['body'],
                'titleErr' => '',
                'bodyErr' => ''
            ];

            //Validate title
            if(empty($data['title'])) {
                $data['titleErr'] = 'Titeln kan inte vara tom'; 
            }

            //Validate body
            if(empty($data['body'])){
                $data['bodyErr'] = 'Inlägget måste ha någon sorts innehåll';
            }

            //make sure all errors are empty
            if(empty($data['titleErr']) && empty($data['bodyErr'])){
                die(var_dump($data));
            } else {
                $this->view('portfolios/addPortfolio', $data);
            }

        } else {
            
            $data = [
                'title' => '',
                'body' => '',
                'titleErr' => '',
                'bodyErr' => ''
            ];

            $this->view('portfolios/addPortfolio', $data);
        }
    }
}