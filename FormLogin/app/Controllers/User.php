<?php namespace  App\Controllers;

use CodeIgniter\Controller;
use App\Models\M_user;

class User extends BaseController
{
    public function __construct()
	{
		$this->model = new M_user();
	}

    public function index(){
        $data = [
            'title' => 'Form Login',
            'tampil' => 'login',
        ];
        echo view('templates/wrapper', $data);
    }

    public function register() {
        $data = [
            'title' => 'Form register',
            'tampil' => 'register',
        ];
        echo view('templates/wrapper', $data);
    }

    public function regis(){
        helper(['form', 'url', 'date']);

        $userModel = new M_user();
        
        $now = date('Y-m-d H:i:s');
        
        $data = [
            'firstname' => $this->request->getVar('firstname'),
            'lastname' => $this->request->getVar('lastname'),
            'email' => $this->request->getVar('email'),
            'password' => $this->request->getVar('password'),
            'date_update' => $now
        ];

        $save = $userModel->insert($data);
       
        session()-> setFlashdata('message','Registrasi');

        return redirect() -> to(base_url('user'));
    }

    public function indexc()
	{

		$data = [
			'judul' => 'CRUD',
			'user' => $this->model->getAllData()
		];

		echo view('templatess/Header', $data);
		echo view('templatess/Sidebar');
		echo view('templatess/Topbar');
		echo view('Home/indexs', $data);
		echo view('templatess/Footer');
    }
    
    public function tambah()
	{
		$data = [
			'nim' => $this->request->getPost('nim'),
			'firstname' => $this->request->getPost('firstname'),
			'lastname' => $this->request->getPost('lastname'),
			'email' => $this->request->getPost('email')
		];

		//inser data
		$tambah = $this->model->tambah($data);
        
        if($tambah) {
		session()->setFlashdata('message', 'Ditambahkan');
		return redirect()->to(base_url('/user/indexc/'));
        }
    }
    
    public function hapus($nim)
	{
		$tambah = $this->model->hapus($nim);
		
		session()->setFlashdata('message', 'Dihapus');
		return redirect()->to(base_url('/user/indexc/'));
    }
    
    public function ubah()
	{
		$data = [
			'nim' => $this->request->getPost('nim'),
			'firstname' => $this->request->getPost('firstname'),
			'lastname' => $this->request->getPost('lastname'),
			'email' => $this->request->getPost('email')
		];
		
		$tambah = $this->model->ubah($data);

		if($tambah) {
		session()->setFlashdata('message', 'Diedit');
		return redirect()->to(base_url('/user/indexc/'));
		}
	}
}