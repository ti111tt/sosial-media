<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\M_kk;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Dompdf\Dompdf;

class Home extends BaseController
{

	public function index()
	{
		if(session()->get('level')>0){

			$model=new M_kk;
			$isi=array(
			'activity_time'=>date('Y-m-d H:i:s'),
			'activity'=>session()->get('nama').' masuk ke halaman dashboard'
			);
			$model->tambah('activity_log', $isi);
			$where=array('logo_id' => '1');
		$logo['menu'] = $model->getwhere('logo',$where);
		// $where1=array('id_user' =>session()->get('id'));
		// $logo['acc'] = $model->getwhere('menu',$where1);
		echo view('header', $logo);
		echo view('menu', $logo);
		echo view('dashboard');
		echo view('footer');
		//echo view('theme_panel');
		}else{
		return redirect()->to('home/login');
	}
	}

	public function settings()
	{
		if(session()->get('level')>0){
			$model=new M_kk;
			$isi=array(
			'activity_time'=>date('Y-m-d H:i:s'),
			'activity'=>session()->get('nama').' masuk ke halaman settings'
			);
			$model->tambah('activity_log', $isi);
			$where=array('logo_id' => '1');
		$logo['menu'] = $model->getwhere('logo',$where);
		$where1=array('id_user' =>session()->get('id'));
		$logo['acc'] = $model->getwhere('menu',$where1);
		echo view('header', $logo);
		echo view('menu', $logo);
		echo view('settings');
		echo view('footer');
		//echo view('theme_panel');
		}else{
		return redirect()->to('home/login');
	}
	}

	public function aksi_settings()
	{
		
		$nama = $this->request->getPost('nama');
		$icon=$this->request->getFile('icon');
		$logo=$this->request->getFile('logo');

		$model=new M_kk;
		//print_r($table);
		if ($icon->isFile()) {
            // Process the icon file
            $model->delete_icon();
            $model->upload_icon($icon);
        } else {
            // Handle the case where no icon file was uploaded
        }
        if ($logo->isFile()) {
            // Process the logo file
            $model->delete_logo();
            $model->upload_logo($logo);
        } else {
            // Handle the case where no logo file was uploaded
        }
        // Check if $nama has a value
        if (!empty($nama)) {
            // Process the $nama value
            $change=array(
		'nama_web'=>$nama
		);
            $where=array(
		'logo_id'=>'1'
		);

		//print_r($storage);
    	$model->edit('logo',$change,$where);
        } else {
            // Handle the case where $nama is empty
        }
		
		return redirect()->to('home/settings');
	}

	public function login()
	{
		if(session()->get('level')>0){
			return redirect()->to('home/index');
			}else{
				$model=new M_kk;
			$where=array('logo_id' => '1');
		$logo['menu'] = $model->getwhere('logo',$where);
				echo view('header', $logo);
		echo view('login');
		
	}

		
	}

	

public function aksi_login()
	{
		$user = $this->request->getPost('username');
		$pass = $this->request->getPost('password');
		

		$login=array(
		'username'=>$user,
		'password'=>md5($pass)
		
		);

		$model=new M_kk;
		//print_r($table);
		$cek = $model->getwhere('users',$login);
		

		if ($cek>0){
			// if ($table='dokter') {
				session()->set('nama',$cek->username);
			session()->set('id',$cek->id_user);
			session()->set('level',$cek->level);
			//session()->set('per','dokter');
			// } else {
			// 	session()->set('nama',$cek->nama);
			// session()->set('id',$cek->id_pasien);
			// session()->set('level',$cek->status);
			// session()->set('per','pasien');
			// }
			

			return redirect()->to('home/index');
		}else{
			return redirect()->to('home/login');
		}
		
	}

	

	public function register()
	{
		echo view('header');
		echo view('register');
		
	}

	public function aksi_register()
	{
		$model=new M_kk;

		$first = $this->request->getPost('first_name');
		$last = $this->request->getPost('last_name');
		$pass = md5($this->request->getPost('password'));
		$email = $this->request->getPost('email');

		// Extract domain from email
    	$domain = explode('@', $email)[1];

    	// Check if domain is from Google
    	if ($model->checkGoogleDomain($domain)) {
        //echo "Valid Google email address";
    		$storage=array(
		'username'=>$first . ' ' . $last,
		'password'=>$pass,
		'email'=>$email,
		'level'=> 1
		);

		//print_r($storage);
    	$model->tambah('user',$storage);

		$login=array(
		'email'=>$email,
		'password'=>$pass
		
		);

		$cek = $model->getwhere('user',$login);


		if ($cek>0){
			session()->set('nama',$cek->username);
			session()->set('email',$cek->email);
			session()->set('id',$cek->id_user);
			session()->set('level',$cek->level);
			return redirect()->to('home/index');
		}else{
			return redirect()->to('home/login');
		}
    	} else {
        //echo "Not a Google email address";
    		return redirect()->to('home/register');
    	}

		

		

	}

	public function logout()
	{
		session()->destroy();
		return redirect()->to('home/login');
		
	}













// DATA
// USER
	///////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////
	public function jadwal()
	{
		if(session()->get('level')>0){

			$model=new M_kk;
			// $isi=array(
			// 'activity_time'=>date('Y-m-d H:i:s'),
			// 'activity'=>session()->get('nama').' masuk ke halaman data user'
			// );
			// $model->tambah('activity_log', $isi);
			$this->log_activity('User Membuka View');
			$where=array('logo_id' => '1');
		$logo['menu'] = $model->getwhere('logo',$where);
		// $where1=array('id_user' =>session()->get('id'));
		// $logo['acc'] = $model->getwhere('menu',$where1);
		$where1 = array('deleted' => NULL);
		$data['tinardo'] = $model->tampilwhere('kegiatan_p5',$where1);
		echo view('header', $logo);
		echo view('menu', $logo);
		echo view('jadwal', $data);
		echo view('footer');
		//echo view('theme_panel');
		}else{
		return redirect()->to('home/login');
	}
	}

	public function rjadwal()
	{
		if(session()->get('level')>0){

			$model=new M_kk;
			// $isi=array(
			// 'activity_time'=>date('Y-m-d H:i:s'),
			// 'activity'=>session()->get('nama').' masuk ke halaman data user'
			// );
			// $model->tambah('activity_log', $isi);
			$this->log_activity('User megembalikan data');
			$where=array('logo_id' => '1');
		$logo['menu'] = $model->getwhere('logo',$where);
		// $where1=array('id_user' =>session()->get('id'));
		// $logo['acc'] = $model->getwhere('menu',$where1);
		$where1 = 'deleted IS NOT NULL';
		$data['tinardo'] = $model->tampilwhere('kegiatan_p5',$where1);
		echo view('header', $logo);
		echo view('menu', $logo);
		echo view('rjadwal', $data);
		echo view('footer');
		//echo view('theme_panel');
		}else{
		return redirect()->to('home/login');
	}
	}
	public function aksi_tambah_jadwal()
	{
		$this->log_activity('User menabah jadwal');
			$model=new M_kk;
			
			$b = $this->request->getPost('jurusan');
			$c = $this->request->getPost('kegiatan_p5');
			$d = $this->request->getPost('tgl');
			$e = $this->request->getPost('kelas');
			
			$isi=array(
			
			'jurusan'=>$b,
			'kegiatan_p5'=>$c,
			'tgl'=>$d,
			'kelas'=>$e,
			);
			$model->tambah('kegiatan_p5', $isi);

			
		
		return redirect()->to('home/jadwal');
	}
	public function delete_jadwal($id)
	{
		$this->log_activity('User Menghapus');
			$model=new M_kk;
			$where=array('id_kls' => $id);
			$model->hapus('kegiatan_p5',$where);
		
		return redirect()->to('home/jadwal');
	}
	public function aksi_edit_jadwal()
{
    // Inisialisasi model
    $model = new M_kk;

    // Ambil data dari form
    $id_kls = $this->request->getPost('id_kls');
    $jurusan = $this->request->getPost('jurusan');
    $kegiatan_p5 = $this->request->getPost('kegiatan_p5');
    $tgl = $this->request->getPost('tgl');
    $kelas = $this->request->getPost('kelas');

    // Data yang akan diupdate
    $data = array(
        'jurusan' => $jurusan,
        'kegiatan_p5' => $kegiatan_p5,
        'tgl' => $tgl,
        'kelas' => $kelas
    );

    // Panggil fungsi update di model
    $model->update_jadwal($id_kls, $data);

    // Redirect setelah update berhasil
    return redirect()->to('home/jadwal')->with('success', 'Data jadwal berhasil diupdate');
}

public function data_user()
	{
		if(session()->get('level')>0){

			$model=new M_kk;
			$isi=array(
			'activity_time'=>date('Y-m-d H:i:s'),
			'activity'=>session()->get('nama').' masuk ke halaman data user'
			);
			$model->tambah('activity_log', $isi);
			$where=array('logo_id' => '1');
		$logo['menu'] = $model->getwhere('logo',$where);
		$where1=array('id_user' =>session()->get('id'));
		$logo['acc'] = $model->getwhere('menu',$where1);
		echo view('header', $logo);
		echo view('menu', $logo);
		$where=array('delete_at' => NULL);
		$data['clara'] = $model->whereshow('users',$where);
		echo view('data_user', $data);
		echo view('footer');
		//echo view('theme_panel');
		}else{
		return redirect()->to('home/login');
	}
	}

	public function restore_user()
	{
		if(session()->get('level')>0){

			$model=new M_kk;
			$isi=array(
			'activity_time'=>date('Y-m-d H:i:s'),
			'activity'=>session()->get('nama').' masuk ke halaman restore user'
			);
			$model->tambah('activity_log', $isi);
			$where=array('logo_id' => '1');
		$logo['menu'] = $model->getwhere('logo',$where);
		$where1=array('id_user' =>session()->get('id'));
		$logo['acc'] = $model->getwhere('menu',$where1);
		echo view('header', $logo);
		echo view('menu', $logo);
		//$where=array('delete_at' => NULL);
		$data['clara'] = $model->query('select * from users WHERE delete_at IS NOT NULL');
		echo view('restore_user', $data);
		echo view('footer');
		//echo view('theme_panel');
		}else{
		return redirect()->to('home/login');
	}
	}

	public function delete_user($id)
	{

			$model=new M_kk;
			$where=array('user_id' => $id);
			$isi=array(
			'delete_at'=>date('Y-m-d H:i:s')
			);
			$model->edit('users', $isi, $where);
			// $isi=array(
			// 'activity_time'=>date('Y-m-d H:i:s'),
			// 'activity'=>session()->get('nama').' delete data user '.$id
			// );
			// $model->tambah('activity_log', $isi);
			// $model->hapus('users',$where);
		
		return redirect()->to('home/data_user');
	}

	public function aksi_restore_user($id)
	{

			$model=new M_kk;
			$where=array('user_id' => $id);
			$isi=array(
			'delete_at'=>NULL
			);
			$model->edit('users', $isi, $where);
			// $isi=array(
			// 'activity_time'=>date('Y-m-d H:i:s'),
			// 'activity'=>session()->get('nama').' restore data user '.$id
			// );
			// $model->tambah('activity_log', $isi);
			// $model->hapus('users',$where);
		
		return redirect()->to('home/restore_user');
	}

	public function detail_user($id)
	{
		if(session()->get('level')>0){

			$model=new M_kk;
			$isi=array(
			'activity_time'=>date('Y-m-d H:i:s'),
			'activity'=>session()->get('nama').' masuk ke halaman detail user'
			);
			$model->tambah('activity_log', $isi);
			$where=array('logo_id' => '1');
		$logo['menu'] = $model->getwhere('logo',$where);
		$where1=array('id_user' =>session()->get('id'));
		$logo['acc'] = $model->getwhere('menu',$where1);
		echo view('header', $logo);
		echo view('menu', $logo);
		$where=array('user_id' => $id);
		$data['clara'] = $model->getwhere('users',$where);
		echo view('detail_user', $data);
		echo view('footer');
		//echo view('theme_panel');
		}else{
		return redirect()->to('home/login');
	}
	}

	public function reset_pass($id)
	{

			$model=new M_kk;
			$where=array('user_id' => $id);
			$isi=array(
			'password'=>md5('1')
			);
			$model->edit('users', $isi, $where);
		
		return redirect()->to('home/detail_user/'.$id);
	}
	public function edit_user($id)
	{

			$model=new M_kk;
			$user = $this->request->getPost('username');
			$nl = $this->request->getPost('nl');
			$jk = $this->request->getPost('jk');
			$ala = $this->request->getPost('alamat');
			$where=array('user_id' => $id);
			$isi=array(
			'username'=>$user,
			'nama_lengkap'=>$nl,
			'jenis_kelamin'=>$jk,
			'alamat'=>$ala,
			'update_at'=>date('Y-m-d H:i:s'),
			'update_by'=>session()->get('id')
			);
			$model->edit('users', $isi, $where);
		
		return redirect()->to('home/detail_user/'.$id);
	}

	public function tambah_user()
	{

			if(session()->get('level')>0){

			$model=new M_kk;
			$isi=array(
			'activity_time'=>date('Y-m-d H:i:s'),
			'activity'=>session()->get('nama').' masuk ke halaman tambah user'
			);
			$model->tambah('activity_log', $isi);
			$where=array('logo_id' => '1');
		$logo['menu'] = $model->getwhere('logo',$where);
		$where1=array('id_user' =>session()->get('id'));
		$logo['acc'] = $model->getwhere('menu',$where1);
		echo view('header', $logo);
		echo view('menu', $logo);

		echo view('tambah_user');
		echo view('footer');
		//echo view('theme_panel');
		}else{
		return redirect()->to('home/login');
	}
	}
	public function aksi_tambah_user()
	{

			$model=new M_kk;
			$user = $this->request->getPost('username');
			$pass = $this->request->getPost('pass');
			$nl = $this->request->getPost('nl');
			$jk = $this->request->getPost('jk');
			$ala = $this->request->getPost('alamat');
			
			$isi=array(
			'username'=>$user,
			'password'=>md5($pass),
			'nama_lengkap'=>$nl,
			'jenis_kelamin'=>$jk,
			'alamat'=>$ala,
			'level'=>'2',
			'create_at'=>date('Y-m-d H:i:s'),
			'create_by'=>session()->get('id')
			);
			$model->tambah('users', $isi);

			$where=array(
			'username'=>$user,
			'password'=>md5($pass),
			'nama_lengkap'=>$nl,
			'jenis_kelamin'=>$jk,
			'alamat'=>$ala,
			'level'=>'2'
			);
			$cek = $model->getwhere('users',$where);

			$isi2=array(
			'id_user'=>$cek->user_id,
			'dashboard'=>'1',
			'sewa'=>'1',
			'bayar'=>'1',
			'data_user'=>'0',
			'data_sewa'=>'0',
			'data_pembayaran'=>'1',
			'data_kendaraan'=>'1',
			'restore_user'=>'0',
			'restore_sewa'=>'0',
			'restore_pembayaran'=>'0',
			'restore_kendaraan'=>'0',
			'settings'=>'0'
			);
			$model->tambah('menu', $isi2);
		
		return redirect()->to('home/data_user');
	}





public function data_kendaraan()
	{
		if(session()->get('level')>0){

			$model=new M_kk;
			$isi=array(
			'activity_time'=>date('Y-m-d H:i:s'),
			'activity'=>session()->get('nama').' masuk ke halaman data kendaraan'
			);
			$model->tambah('activity_log', $isi);
			$where=array('logo_id' => '1');
		$logo['menu'] = $model->getwhere('logo',$where);
		$where1=array('id_user' =>session()->get('id'));
		$logo['acc'] = $model->getwhere('menu',$where1);
		echo view('header', $logo);
		echo view('menu', $logo);
		$data['clara'] = $model->tampil('kendaraan');
		echo view('data_kendaraan', $data);
		echo view('footer');
		//echo view('theme_panel');
		}else{
		return redirect()->to('home/login');
	}
	}
	public function tambah_kendaraan()
	{

			if(session()->get('level')>0){

			$model=new M_kk;
			$isi=array(
			'activity_time'=>date('Y-m-d H:i:s'),
			'activity'=>session()->get('nama').' masuk ke halaman tambah kendaraan'
			);
			$model->tambah('activity_log', $isi);
			$where=array('logo_id' => '1');
		$logo['menu'] = $model->getwhere('logo',$where);
		$where1=array('id_user' =>session()->get('id'));
		$logo['acc'] = $model->getwhere('menu',$where1);
		echo view('header', $logo);
		echo view('menu', $logo);

		echo view('tambah_kendaraan');
		echo view('footer');
		//echo view('theme_panel');
		}else{
		return redirect()->to('home/login');
	}
	}
	public function aksi_tambah_kendaraan()
	{

			$model=new M_kk;
			$nk = $this->request->getPost('nk');
			$tk = $this->request->getPost('tk');
			$wk = $this->request->getPost('wk');
			$hk = $this->request->getPost('hk');
			
			$isi=array(
			'nomor_kendaraan'=>$nk,
			'tipe_kendaraan'=>$tk,
			'warna_kendaraan'=>$wk,
			'harga_kendaraan'=>$hk,
			'create_at'=>date('Y-m-d H:i:s'),
			'create_by'=>session()->get('id')
			);
			$model->tambah('kendaraan', $isi);
		
		return redirect()->to('home/data_kendaraan');
	}
	public function delete_kendaraan($id)
	{

			$model=new M_kk;
			$where=array('kendaraan_id' => $id);
			$model->hapus('kendaraan',$where);
		
		return redirect()->to('home/data_kendaraan');
	}
	public function detail_kendaraan($id)
	{
		if(session()->get('level')>0){

			$model=new M_kk;
			$isi=array(
			'activity_time'=>date('Y-m-d H:i:s'),
			'activity'=>session()->get('nama').' masuk ke halaman detail kendaraan'
			);
			$model->tambah('activity_log', $isi);
			$where=array('logo_id' => '1');
		$logo['menu'] = $model->getwhere('logo',$where);
		$where1=array('id_user' =>session()->get('id'));
		$logo['acc'] = $model->getwhere('menu',$where1);
		echo view('header', $logo);
		echo view('menu', $logo);
		$where=array('kendaraan_id' => $id);
		$data['clara'] = $model->getwhere('kendaraan',$where);
		echo view('detail_kendaraan', $data);
		echo view('footer');
		//echo view('theme_panel');
		}else{
		return redirect()->to('home/login');
	}
	}
	public function edit_kendaraan($id)
	{

			$model=new M_kk;
			$nk = $this->request->getPost('nk');
			$tk = $this->request->getPost('tk');
			$wk = $this->request->getPost('wk');
			$hk = $this->request->getPost('hk');
			$where=array('kendaraan_id' => $id);
			$isi=array(
			'nomor_kendaraan'=>$nk,
			'tipe_kendaraan'=>$tk,
			'warna_kendaraan'=>$wk,
			'harga_kendaraan'=>$hk,
			'update_at'=>date('Y-m-d H:i:s'),
			'update_by'=>session()->get('id')
			);
			$model->edit('kendaraan', $isi, $where);
		
		return redirect()->to('home/detail_kendaraan/'.$id);
	}

	public function sewa()
	{
		if(session()->get('level')>0){

			$model=new M_kk;
			$where=array('logo_id' => '1');
		$logo['menu'] = $model->getwhere('logo',$where);
		$where1=array('id_user' =>session()->get('id'));
		$logo['acc'] = $model->getwhere('menu',$where1);
		echo view('header', $logo);
		echo view('menu', $logo);
		$data['clara'] = $model->tampil('kendaraan');
		echo view('sewa', $data);
		echo view('footer');
		//echo view('theme_panel');
		}else{
		return redirect()->to('home/login');
	}
	}
	public function aksi_sewa()
	{

			$model=new M_kk;
			$kd = $this->request->getPost('kd');
			$lama = $this->request->getPost('lama');
			$harga = $this->request->getPost('harga');
			
			$isi=array(
			'user_id'=>session()->get('id'),
			'kendaraan_id'=>$kd,
			'lama_sewa'=>$lama,
			'total_harga'=>$harga,
			'status'=>'belum_dibayar',
			'create_at'=>date('Y-m-d H:i:s'),
			'create_by'=>session()->get('id')
			);
			$model->tambah('sewa', $isi);
		
		return redirect()->to('home/sewa');
	}
	public function list_bayar()
	{
		if(session()->get('level')>0){

			$model=new M_kk;
			$where=array('logo_id' => '1');
		$logo['menu'] = $model->getwhere('logo',$where);
		$where1=array('id_user' =>session()->get('id'));
		$logo['acc'] = $model->getwhere('menu',$where1);
		echo view('header', $logo);
		echo view('menu', $logo);
		$where=array('user_id' => session()->get('id'),
					 'status' => 'belum_dibayar');
		$data['clara'] = $model->joinwhere('sewa', 'kendaraan', 'sewa.kendaraan_id=kendaraan.kendaraan_id', $where);
		echo view('list_bayar', $data);
		echo view('footer');
		//echo view('theme_panel');
		}else{
		return redirect()->to('home/login');
	}
	}

	public function bayar($id)
	{
		if(session()->get('level')>0){

			$model=new M_kk;
			$where=array('logo_id' => '1');
		$logo['menu'] = $model->getwhere('logo',$where);
		$where1=array('id_user' =>session()->get('id'));
		$logo['acc'] = $model->getwhere('menu',$where1);
		echo view('header', $logo);
		echo view('menu', $logo);
		$where=array('sewa_id' => $id);
		$data['clara'] = $model->getwherejoin('sewa', 'kendaraan', 'sewa.kendaraan_id=kendaraan.kendaraan_id', $where);
		echo view('bayar', $data);
		echo view('footer');
		//echo view('theme_panel');
		}else{
		return redirect()->to('home/login');
	}
	}
	public function aksi_bayar($id)
	{

			$model=new M_kk;
			$bayar = $this->request->getPost('bayar');
			$kembalian = $this->request->getPost('kembalian');
			
			$isi=array(
			'sewa_id'=>$id,
			'bayar'=>$bayar,
			'kembalian'=>$kembalian,
			'create_at'=>date('Y-m-d H:i:s'),
			'create_by'=>session()->get('id')
			);
			$model->tambah('pembayaran', $isi);

			$where=array('sewa_id' => $id);
			$isi=array(
			'status'=>'dibayar',
			'update_at'=>date('Y-m-d H:i:s'),
			'update_by'=>session()->get('id')
			);
			$model->edit('sewa', $isi, $where);
		
		return redirect()->to('home/list_bayar');
	}



































































































































































































// 	public function forget_pass()
// 	{
		
// 		echo view('forget_pass');
		
// 	}

// 	public function aksi_forget()
// 	{
// 		$model=new M_kk;

// 		$email = $this->request->getPost('email');

// 		// Extract domain from email
//     	$domain = explode('@', $email)[1];

//     	// Check if domain is from Google
//     	if ($model->checkGoogleDomain($domain)) {
//         //echo "Valid Google email address";
//     		$subject = 'Password Reset';
//     		$message = 'Click the link to reset your password: http://yourdomain.com/reset_password.php?token=your_generated_token';
//     		$headers = 'From: roxukagamer@gmail.com';
//     		mail($email, $subject, $message, $headers);
//     		return redirect()->to('home/login');
//     	} else {
//         //echo "Not a Google email address";
//     		return redirect()->to('home/forget_pass');
//     	}

		

		

// 	}

// 	public function cari()
// 	{
// 		if(session()->get('level')>0){
// 			$model=new M_kk;
// 		echo view('header');
// 		echo view('menu');
// 		$data['nelson'] = $model->tampil('dokter');
// 		echo view('cari',$data);

// 		echo view('footer');
// 		echo view('theme_panel');
// 		}else{
// 		return redirect()->to('home/login');
// 	}
// 	}

// 	public function aksi_cari()
// 	{
// 		$id_dok = $this->request->getPost('id_dokter');
// 		$id_pas = $this->request->getPost('id_pasien');
// 		//$pass = $this->request->getPost('password');
		

// 		$isi=array(
// 		'id_dokter'=>$id_dok,
// 		'id_pasien'=>$id_pas,
// 		'status'=>1
// 		);

// 		$model=new M_kk;
// 		//print_r($table);
// 		$model->tambah('group',$isi);
		

// 		// if ($cek>0){
// 		// 	if ($table="dokter") {
// 		// 		session()->set('nama',$cek->nama);
// 		// 	session()->set('id',$cek->id_dokter);
// 		// 	session()->set('level',$cek->status);
// 		// 	session()->set('per','dokter');
// 		// 	} else {
// 		// 		session()->set('nama',$cek->nama);
// 		// 	session()->set('id',$cek->id_pasien);
// 		// 	session()->set('level',$cek->status);
// 		// 	session()->set('per','pasien');
// 		// 	}
			

// 			return redirect()->to('home/index');
// 		// }else{
// 		// 	return redirect()->to('home/login');
// 		// }
// 	}

// 	public function list_chat()
// 	{
// 		if(session()->get('level')>0){
// 			$model=new M_kk;
// 		echo view('header');
// 		echo view('menu');
// 		if(session()->get('per')=='dokter'){
// 			$wh = 'a.id_dokter = '.session()->get('id');
// 		} else {
// 			$wh = 'a.id_pasien = '.session()->get('id');
// 		}

// 		$data['nelson'] = $model->query('select a.id_group,a.id_dokter,a.id_pasien,a.status,b.nama as nama_dokter,c.nama as nama_pasien FROM `group` a
// LEFT JOIN dokter b ON b.id_dokter=a.id_dokter
// LEFT JOIN pasien c ON c.id_pasien=a.id_pasien
// WHERE a.status=1 and '.$wh.'');
// 		//print_r($data);
// 		echo view('list_chat',$data);

// 		echo view('footer');
// 		echo view('theme_panel');
// 		}else{
// 		return redirect()->to('home/login');
// 	}
// 	}

// 	public function chat($group)
// 	{
// 		if(session()->get('level')>0){
// 			$model=new M_kk;
// 		echo view('header');
// 		echo view('menu');
// 		// if(session()->get('per')=='dokter'){
// 		// 	$wh = 'a.id_dokter = '.session()->get('id');
// 		// } else {
// 		// 	$wh = 'a.id_pasien = '.session()->get('id');
// 		// }
// 		$data = [
// 			'group' => $group
// 		];

// 		$data['nelson'] = $model->query('select * FROM `chat` WHERE id_group = '.$group.'');
// 		//print_r($data);
// 		echo view('chat',$data);

// 		echo view('footer');
// 		echo view('theme_panel');
// 		}else{
// 		return redirect()->to('home/login');
// 	}
// 	}

// 	public function aksi_send($group)
// 	{
// 		$model=new M_kk;
// 		$nama = $this->request->getPost('nama');
// 		$chat = $this->request->getPost('chat');
// 		//echo date('Y-m-d H:i:s');
// 		$isi=array(
// 		'id_group'=>$group,
// 		'user'=>$nama,
// 		'chat'=>$chat,
// 		'time'=>date('Y-m-d H:i:s')
// 		);

		
// 		$model->tambah('chat',$isi);
// 		return redirect()->to('home/chat/'.$group);
// 	}

// 	public function tutup($group)
// 	{
// 		if(session()->get('level')>0){
// 			$model=new M_kk;
// 		echo view('header');
// 		echo view('menu');
// 		// if(session()->get('per')=='dokter'){
// 		// 	$wh = 'a.id_dokter = '.session()->get('id');
// 		// } else {
// 		// 	$wh = 'a.id_pasien = '.session()->get('id');
// 		// }
// 		$data = [
// 			'group' => $group
// 		];

// 		$data['nelson'] = $model->query('select * FROM `chat` WHERE id_group = '.$group.'');
// 		//print_r($data);
// 		echo view('tutup',$data);

// 		echo view('footer');
// 		echo view('theme_panel');
// 		}else{
// 		return redirect()->to('home/login');
// 	}
// 	}

// 	public function aksi_tutup($group)
// 	{
// 		$model=new M_kk;
// 		$biaya = $this->request->getPost('biaya');
// 		$keterangan = $this->request->getPost('keterangan');

// 		$where=array(
// 		'id_group'=>$group
// 		);
// 		//print_r($table);
// 		$cek = $model->getwhere('group',$where);
// 		//echo date('Y-m-d H:i:s');
// 		$isi=array(
// 		'id_pasien'=>$cek->id_pasien,
// 		'harga'=>$biaya,
// 		'keterangan'=>$keterangan,
// 		'waktu'=>date('Y-m-d H:i:s'),
// 		'status'=>1,
// 		'bayar'=>0,
// 		'kembalian'=>0
// 		);
// 		//print_r($isi);
// 		$model->tambah('transaksi',$isi);

// 		$edi=array(
// 		'status'=>2
// 		);

// 		$model->edit('group',$edi,$where);
// 		return redirect()->to('home/index');
// 	}




















































// 	public function list_bayar()
// 	{
// 		if(session()->get('level')>0){
// 			$model=new M_kk;
// 		echo view('header');
// 		echo view('menu');

// 		$data['nelson'] = $model->query('select * FROM `transaksi` 
// WHERE status=1 and id_pasien='.session()->get('id').'');
// 		//print_r($data);
// 		echo view('list_bayar',$data);

// 		echo view('footer');
// 		echo view('theme_panel');
// 		}else{
// 		return redirect()->to('home/login');
// 	}
// 	}

	// public function bayar($tran)
	// {
	// 	if(session()->get('level')>0){
	// 		$model=new M_kk;
	// 	echo view('header');
	// 	echo view('menu');
	// 	// if(session()->get('per')=='dokter'){
	// 	// 	$wh = 'a.id_dokter = '.session()->get('id');
	// 	// } else {
	// 	// 	$wh = 'a.id_pasien = '.session()->get('id');
	// 	// }
	// 	$data = [
	// 		'tran' => $tran
	// 	];

	// 	$data['nelson'] = $model->query_row('select * FROM `transaksi` WHERE id_transaksi = '.$tran.'');
	// 	//print_r($data);
	// 	echo view('bayar',$data);

	// 	echo view('footer');
	// 	echo view('theme_panel');
	// 	}else{
	// 	return redirect()->to('home/login');
	// }
	// }

	// public function aksi_bayar($tran)
	// {
	// 	$model=new M_kk;
	// 	$bayar = $this->request->getPost('bayar');
	// 	$kembalian = $this->request->getPost('kembalian');

	// 	$where=array(
	// 	'id_transaksi'=>$tran
	// 	);
	// 	//print_r($table);
	// 	//$cek = $model->getwhere('group',$where);
	// 	//echo date('Y-m-d H:i:s');
	// 	// $isi=array(
	// 	// 'id_pasien'=>$cek->id_pasien,
	// 	// 'harga'=>$biaya,
	// 	// 'keterangan'=>$keterangan,
	// 	// 'waktu'=>date('Y-m-d H:i:s'),
	// 	// 'status'=>1,
	// 	// 'bayar'=>0,
	// 	// 'kembalian'=>0
	// 	// );
	// 	// //print_r($isi);
	// 	// $model->tambah('transaksi',$isi);

	// 	$edi=array(
	// 	'status'=>2,
	// 	'bayar'=>$bayar,
	// 	'kembalian'=>$kembalian
	// 	);

	// 	$model->edit('transaksi',$edi,$where);
	// 	return redirect()->to('home/index');
	// }

	public function riwayat()
	{
		if(session()->get('level')>0){
			$model=new M_kk;
		echo view('header');
		echo view('menu');

		$data['nelson'] = $model->query('select * FROM `transaksi` a
Left join pasien b on b.id_pasien=a.id_pasien
WHERE a.status=2');
		//print_r($data);
		echo view('riwayat',$data);

		echo view('footer');
		echo view('theme_panel');
		}else{
		return redirect()->to('home/login');
	}
	}

	public function laporan()
	{
		if(session()->get('level')>0){
			$model=new M_kk;
		echo view('header');
		echo view('menu');

// 		$data['nelson'] = $model->query('select * FROM `transaksi` a
// Left join pasien b on b.id_pasien=a.id_pasien
// WHERE a.status=2');
		//print_r($data);
		echo view('laporan');

		echo view('footer_lprn');
		echo view('theme_panel');
		}else{
		return redirect()->to('home/login');
	}
	}















































	public function print_excel()
	{
		$model=new M_kk;
		$dari = $this->request->getPost('tgl_darie');
		$sampai = $this->request->getPost('tgl_sampe');
		$fileName = 'Laporan_Excel.xlsx';

		$spreadsheet = new Spreadsheet();

		$cek = $model->query('select * FROM `transaksi` a
Left join pasien b on b.id_pasien=a.id_pasien
WHERE a.status=2 AND waktu BETWEEN "'.$dari.'" AND "'.$sampai.'"');

		$sheet = $spreadsheet->getActiveSheet();

		$sheet->setCellValue('A1', 'No');
		$sheet->setCellValue('B1', 'Pasien');
		$sheet->setCellValue('C1', 'Keterangan');
		$sheet->setCellValue('D1', 'Waktu');
		$sheet->setCellValue('E1', 'Harga');
		$sheet->setCellValue('F1', 'Bayar');
		$sheet->setCellValue('G1', 'Kembalian');

		$row = 2;
		$no = 1;
		foreach ($cek as $val) {
			$sheet->setCellValue('A'.$row, $no);
		$sheet->setCellValue('B'.$row, $val->nama);
		$sheet->setCellValue('C'.$row, $val->keterangan);
		$sheet->setCellValue('D'.$row, $val->waktu);
		$sheet->setCellValue('E'.$row, $val->harga);
		$sheet->setCellValue('F'.$row, $val->bayar);
		$sheet->setCellValue('G'.$row, $val->kembalian);
		$row++;
		$no++;
		}

		$writer = new Xlsx($spreadsheet);
		$writer->save($fileName);

		header("Content-Type: application/vnd.ms-excel");
		header('Content-Disposition: attachment; filename="'.basename($fileName).'"');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length:' . filesize($fileName));

		flush();
		readfile($fileName);
		exit;

				//session()->set('nama',$cek->nama);
	}

	public function print_print()
	{
		$model=new M_kk;
		$dari = $this->request->getPost('tgl_darip');
		$sampai = $this->request->getPost('tgl_sampp');

		$data['nelson'] = $model->query('select * FROM `transaksi` a
Left join pasien b on b.id_pasien=a.id_pasien
WHERE a.status=2 AND waktu BETWEEN "'.$dari.'" AND "'.$sampai.'"');

		echo view('header_print');

		echo view('print',$data);
		echo view('footer_print');

				//session()->set('nama',$cek->nama);
	}

	public function print_pdf()
	{
		$model=new M_kk;
		$dompdf =new Dompdf();
		
		$dari = $this->request->getPost('tgl_darif');
		$sampai = $this->request->getPost('tgl_sampf');

		$data['nelson'] = $model->query('select * FROM `transaksi` a
Left join pasien b on b.id_pasien=a.id_pasien
WHERE a.status=2 AND waktu BETWEEN "'.$dari.'" AND "'.$sampai.'"');

		

		$html =  view('pdf',$data);
		$dompdf->loadHtml($html);

		// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();

				//session()->set('nama',$cek->nama);
	}

	public function restoreupjadwal($id)
{
    $model = new M_kk();

    // Restore product data
    $model->restoreProduct('kegiatan_p5_backup','id_kls',$id);
	// $this->updatelog('User Restore Updated Data Barang');
    return redirect()->to('home/jadwal');
}

public function sdjadwal($id)
	{
			$model = new M_kk;
			$where = array('id_kls' => $id);
			// Ubah status transaksi menjadi "habis" di kedua tabel
			$model->softdelete2('kegiatan_p5', 'deleted', date('Y-m-d H:i:s'), $where);
			// $this->log_activity('User Soft Delete Data Keranjang');
			// Kirim respons (jika diperlukan)
			return redirect()->to('home/jadwal');
	}

	public function rsjadwal($id)
	{
			$model = new M_kk;
			$where = array('id_kls' => $id);
			// Ubah status transaksi menjadi "habis" di kedua tabel
			$model->softdelete2('kegiatan_p5', 'deleted', Null, $where);
			// $this->log_activity('User Soft Delete Data Keranjang');
			// Kirim respons (jika diperlukan)
			return redirect()->to('home/rjadwal');
	}

	public function edit_data()
	{
		if(session()->get('level')>0){

			$model=new M_kk;
			$this->log_activity('User edit data');
			$where=array('logo_id' => '1');
		$logo['menu'] = $model->getwhere('logo',$where);
		
		// $where1 = array('deleted' => NULL);
		// $data['tinardo'] = $model->tampilwhere('kegiatan_p5',$where1);
		echo view('header', $logo);
		echo view('menu', $logo);
		echo view('edit_data');
		echo view('footer');
		//echo view('theme_panel');
		}else{
		return redirect()->to('home/login');
	}
	}
	public function aksi_edit_data()
	{
		
		$nama = $this->request->getPost('nama');
		$icon=$this->request->getFile('icon');
		$logo=$this->request->getFile('logo');

		$model=new M_kk;
		//print_r($table);
		if ($icon->isFile()) {
            // Process the icon file
            $model->delete_icon();
            $model->upload_icon($icon);
        } else {
            // Handle the case where no icon file was uploaded
        }
        if ($logo->isFile()) {
            // Process the logo file
            $model->delete_logo();
            $model->upload_logo($logo);
        } else {
            // Handle the case where no logo file was uploaded
        }
        // Check if $nama has a value
        if (!empty($nama)) {
            // Process the $nama value
            $change=array(
		'nama_web'=>$nama
		);
            $where=array(
		'logo_id'=>'1'
		);

		//print_r($storage);
    	$model->edit('logo',$change,$where);
        } else {
            // Handle the case where $nama is empty
        }
		
		return redirect()->to('home/edit_data');
	}
	private function log_activity($activity)
    {
		$model = new M_kk();
		
$data = array(
    'id_user' => session()->get('id'),
    'activity' => $activity,
    'timestamp' => date('Y-m-d H:i:s'),
    'delete' => null
);
$model->tambah('activity', $data);

}

public function activity()
{
    $model = new M_kk();
	$where=array('logo_id' => '1');
	$logo['menu'] = $model->getwhere('logo',$where);
    // Mengambil data activity dan join dengan tabel 'users'
    $data['activities'] = $model->join('activity', 'users', 'users.id_user = activity.id_user');

    // Cek jika query gagal
    if ($data['activities'] === false) {
        // Tangani error, misalnya dengan menampilkan pesan atau log
        echo "Error: Query gagal dijalankan.";
        return;
    }

	echo view('header', $logo);
    echo view('menu', $logo);
    
    echo view('activity', $data);
	echo view('footer');
}
public function siswa()
	{
		if(session()->get('level')>0){

			$model=new M_kk;
			// $isi=array(
			// 'activity_time'=>date('Y-m-d H:i:s'),
			// 'activity'=>session()->get('nama').' masuk ke halaman data user'
			// );
			// $model->tambah('activity_log', $isi);
			$this->log_activity('User Membuka View');
			$where=array('logo_id' => '1');
		$logo['menu'] = $model->getwhere('logo',$where);
		// $where1=array('id_user' =>session()->get('id'));
		// $logo['acc'] = $model->getwhere('menu',$where1);
		$where1 = array('deleted' => NULL);
		$data['tinardo'] = $model->tampilwhere('kegiatan_p5',$where1);
		echo view('header', $logo);
		echo view('menu', $logo);
		echo view('siswa', $data);
		echo view('footer');
		//echo view('theme_panel');
		}else{
		return redirect()->to('home/login');
	}

}
public function media() {
	$model = new M_kk();
	$where=array('logo_id' => '1');
	$logo['menu'] = $model->getwhere('logo',$where);
	$data['media'] = $model->getAllMedia();
	echo view('header', $logo);
	echo view('menu', $logo);
	echo view('media', $data);
	echo view('footer');
}
	public function upload() {
		$file = $this->request->getFile('media_file');
		$description = $this->request->getPost('description');
		$mimeType = $file->getMimeType(); // Tentukan mimeType file
	
		// Tentukan media_type berdasarkan mimeType
		if (strpos($mimeType, 'image') !== false) {
			$mediaType = 'photo';
		} elseif (strpos($mimeType, 'video') !== false) {
			$mediaType = 'video';
		} else {
			$mediaType = 'text'; // Jika bukan image atau video, default ke text
		}
	
		if ($file->isValid() && !$file->hasMoved()) {
			$file->move(ROOTPATH . 'public/images');
			$model = new M_kk();
			$model->saveMedia([
				'id_user' => session()->get('id'),  // Ambil id_user dari session
				'media_type' => $mediaType,
				'media_path' => $file->getName(),
				'description' => $description
			]);
		}
	
		return redirect()->to('home/media');
	}
	// public function like($media_id) {
	// 	$model = new M_kk();
	// 	//print_r(session()->get('id'));
	// 	$model->addLike($media_id, session()->get('id'));  // Ganti dari user_id ke id_user
	// 	return redirect()->to('home/mediatampil#media-' . $media_id);
	// }
	
	public function mediatampil() {
		$model = new M_kk();
	
		// Get the logo data
		$where = array('logo_id' => '1');
		$logo['menu'] = $model->getwhere('logo', $where);
		
		$where1 = array('media.id_user' => session()->get('id'));
		// Get all media items with user information
		$mediaItems = $model->getAllMediaWithUsers($where1);
	
		// Get like count for each media item and check if the user has liked the media
		$userId = session()->get('id');
		foreach ($mediaItems as &$media) {
			$media->like_count = $model->getLikeCount($media->id);
			$media->user_has_liked = $model->checkIfLiked($media->id, $user);
		}
	
		// Pass media items to the view
		$data['media'] = $mediaItems;
	
		// Load the views
		echo view('header', $logo);
		echo view('menu', $logo);
		echo view('mediatampil', $data);  // View untuk menampilkan media
		echo view('footer');
	}
	
	public function like($media_id) {
		$model = new M_kk();
		$id = session()->get('id');
	
		// Data yang akan dimasukkan ke tabel likes
		$data = [
			'media_id' => $media_id,
			'id_user' => $id,
			'created_at' => date('Y-m-d H:i:s') // Sesuaikan format tanggal jika perlu
		];
	
		// Menambahkan like ke tabel
		if ($model->tambah('likes', $data)) {
			return $this->response->setJSON(['success' => true]);
		} else {
			return $this->response->setStatusCode(500, 'Could not add like');
		}
	}
	
	
	public function comment($media) {
		$comment = $this->request->getPost('comment');
		$model = new M_kk();
		$model->addComment($media, session()->get('id'), $comment);  // Ganti dari user_id ke id_user
	
		// Redirect with anchor to stay on the same post
		return redirect()->to('home/mediatampil#media-' . $media);
	}
	
}