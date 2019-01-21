<?php
class Pages extends Controller{
    public function __construct(){
    }

    public function index(){
        $this->view('pages/index');
    }

    public function about(){
        $this->view('pages/about');
    }

    public function arbetstraning(){
        $this->view('pages/arbetstraning');
    }

    public function book(){
        $data = [];
        $this->view('pages/book', $data);
    }

    public function contact(){
        $data = [];
        $this->view('pages/contact');
    }

    public function portfolio(){
        $data = [];
        $this->view('pages/portfolio', $data);
    }
}