<?php
include_once 'config/static.php';
include_once 'config/conn.php';
include_once 'controller/main.php';
include_once 'function/main.php';

# GET
Router::url('', 'get', function () { 
    return view('home'); 
});
Router::url('login', 'get', 'authController::login');
Router::url('login', 'post', 'authController::login');
Router::url('logout', 'get', 'authController::logout');
Router::url('register', 'get', function () {
    return view('register'); 
}); 
Router::url('dashboard', 'get', function () {
     return view('dashboard'); 
}); 
Router::url('pengajuan', 'get', function () {
     return view('pengajuan'); 
}); 
Router::url('detailpengajuan', 'get', function () {
     return view('detailpengajuan'); 
}); 
Router::url('editpengajuan', 'get', function () {
     return view('editpengajuan'); 
}); 
Router::url('berita', 'get', function () {
     return view('berita'); 
}); 

new Router();