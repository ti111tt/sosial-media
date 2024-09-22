<?php

namespace App\Models;

use CodeIgniter\Model;

class M_kk extends Model
{

public function tampil($cahya){
		return $this->db->table($cahya)
                        ->get()
                        ->getResult();

	}

	public function tampilwhere($tabel,$where){
        return $this->db->table($tabel)
                        ->getwhere($where)
                        ->getResult();
    }
	
	public function whereshow($cahya, $where){
		return $this->db->table($cahya)
                        ->getwhere($where)
                        ->getResult();

	}

	public function tampil_filter($cahya, $filter){
		$columns = $this->db->getFieldNames($cahya);

    // Remove 'id' from the list of columns
    $filteredColumns = array_diff($columns, [$filter]);

		return $this->db->table($cahya)
		->select($filteredColumns)
                        ->get()
                        ->getResult();

	}

	public function tampilarray($cahya){
		return $this->db->table($cahya)
                        ->get()
                        ->getResultArray();

	}

	
	public function join($table1, $table2, $on)
	{
		// Eksekusi query
		$builder = $this->db->table($table1)
							->join($table2, $on, 'left');
	
		// Debug: Output query untuk memeriksa apakah query valid
		// echo $builder->getCompiledSelect(); // Menampilkan SQL query yang dibentuk
	
		$query = $builder->get();
	
		// Cek apakah query berhasil atau tidak
		if ($query !== false) {
			return $query->getResult(); // Mengembalikan hasil query jika berhasil
		} else {
			return []; // Mengembalikan array kosong jika query gagal
		}
		
	}

	public function jointwo($cahya, $tadle2, $tadle3, $on, $on2){
		return $this->db->table($cahya)
		                ->join($tadle2,$on,'left')
		                ->join($tadle3,$on2,'left')
                        ->get()
                        ->getResult();
		//return $this->db->query('select * from barangm join')
        //                ->getResult();
                        

	}

	public function jointwowhere($cahya, $tadle2, $tadle3, $on, $on2, $where){
		return $this->db->table($cahya)
		                ->join($tadle2,$on,'left')
		                ->join($tadle3,$on2,'left')
		                ->getwhere($where)
                        ->getResult();
                        
		//return $this->db->query('select * from barangm join')
        //                ->getResult();
                        

	}

	public function joinwhere($cahya, $tadle2, $on, $where){
		return $this->db->table($cahya)
		                ->join($tadle2,$on,'left')
		                ->getwhere($where)
                        ->getResult();
                        
		//return $this->db->query('select * from barangm join')
        //                ->getResult();
                        

	}

	public function joinorder($cahya, $tadle2, $on, $id){
		return $this->db->table($cahya)
		                ->join($tadle2,$on,'left')
		                ->orderBy($id,'desc')
                        ->get()
                        ->getResult();
    //   Cara Pakai                            table      table         ON                           id
    //   $data['nelson'] = $model->joinorder('barangk', 'barang','barangk.id_barang=barang.id_brg','id_bk');
                        

	}

	public function tampilorder($cahya, $id){
		return $this->db->table($cahya)
		                ->orderBy($id,'desc')
                        ->get()
                        ->getResult();
    //   Cara Pakai                             table      id
    //   $data['nelson'] = $model->tampilorder('barang','id_brg');

	}

	public function getwhere($cahya, $where){
		return $this->db->table($cahya)
                        ->getwhere($where)
                        ->getRow();

	}

	public function tampil_filter_where($cahya, $filter, $where){
		$columns = $this->db->getFieldNames($cahya);

    // Remove 'id' from the list of columns
    $filteredColumns = array_diff($columns, [$filter]);

		return $this->db->table($cahya)
		->select($filteredColumns)
                        ->getwhere($where)
                        ->getResult();

	}

	public function upload($file){
		$imageName = $file->getName();
		$file->move(ROOTPATH . 'public/img', $imageName);

	}

	public function replace_f($file, $file_d){
    $imagePath = ROOTPATH . 'public/img';
    $imageName = $file->getName();
    $sec_imageName = $file_d->getName();
    
        // Remove the existing file
        if (file_exists($imagePath . '/' . $sec_imageName)) {
        unlink($imagePath . '/' . $sec_imageName);
    }
    

    // Move the new file to the destination
    $file->move($imagePath, $imageName);
}

	public function upload_logo($file){
		$imageName = $file->getName();
		$filename = 'logo.png';
		$file->move(ROOTPATH.'public/img/logo',$filename);

	}

	public function delete_logo(){
		$imageName = 'logo.png';
		$imagePath = ROOTPATH . 'public/img/logo';
		unlink($imagePath . '/' . $imageName);
		// $imageName = 'logo.png';
		// $file->unlink(ROOTPATH . 'public/img/logo', $imageName);
		// $imageName = 'logo.jpg';
		// $file->unlink(ROOTPATH . 'public/img/logo', $imageName);

	}

	public function upload_icon($file){
		$imageName = $file->getName();
		$filename = 'icon.png';
		$file->move(ROOTPATH.'public/img/logo',$filename);

	}

	public function delete_icon(){
		$imageName = 'icon.png';
		$imagePath = ROOTPATH . 'public/img/logo';
		unlink($imagePath . '/' . $imageName);
		// unlink(ROOTPATH . 'public/img/logo', $imageName);
		// $imageName = 'icon.jpg';
		// $file->unlink(ROOTPATH . 'public/img/logo', $imageName);

	}

	public function getwherejoin($cahya, $tadle2, $on, $where){
		return $this->db->table($cahya)
		                ->join($tadle2,$on,'left')
                        ->getwhere($where)
                        ->getRow();

	}

	public function tambah($table, $isi){
		return $this->db->table($table)
                        ->Insert($isi);

	}

	public function hapus($table, $yoga){
		return $this->db->table($table)
                        ->delete($yoga);

	}

	public function getbarang($id = false){
		if ($id === false) {
			return $this->findAll();
		}
		else{
			return $this->getwhere(['id_brg'=>$id]);
		}

	}


	public function edit($table, $isi, $where){
return $this->db->table($table)
                        ->update($isi, $where);

	}

	public function update_all($table, $isi){
return $this->db->table($table)
                        ->update($isi);

	}

	public function maxkode($tab){
		return $this->db->table($tab)
                        ->selectmax('kode_obat','kode')
                        ->get()
                        ->getRow();

	}

	public function selesaicart($isi){
		return $this->db->table('transaksi')
                        ->insertBatch(
                        	$isi);


	}

	public function selesaicart2(){
		return $this->db->table('cart')
                        ->truncate();
                        

	}

	public function balikcart($isi){
		return $this->db->table('cart')
                        ->insertBatch(
                        	$isi);


	}

	public function balikcart2($yoga){
		return $this->db->table('transaksi')
                        ->delete($yoga);
                        

	}

	// Function to check if domain is from Google
	public function checkGoogleDomain($domain) {
    $googleDomains = array("gmail.com", "googlemail.com");
    return in_array($domain, $googleDomains);
	}

	public function query($query){
		return $this->db->query($query)
                        //->get()
                        ->getResult();

	}

	public function query_row($query){
		return $this->db->query($query)
                        //->get()
                        ->getRow();

	}

public function update_jadwal($id_kls, $data)
{
    return $this->db->table('kegiatan_p5')
                    ->where('id_kls', $id_kls)
                    ->update($data);
}

public function restoreProduct($table,$column,$id)
{
    // Ambil data dari tabel backup
    $backupData = $this->db->table($table)->where($column, $id)->get()->getRowArray();

    if ($backupData) {
        // Tentukan nama tabel utama tempat data akan di-restore
        $mainTable = str_replace('_backup', '', $table);

        // Update data di tabel utama
        $this->db->table($mainTable)->where($column, $id)->update($backupData);
    }
}

public function softdelete2($table, $kolom, $noTrans, $where)
{
    $this->db->table($table)->update([$kolom => $noTrans], $where);
}
public function saveActivityLog($message)
{
	return $this->db->table('activity_log')
					->insert([
						'activity_message' => $message,
						'activity_time' => date('Y-m-d H:i:s')
					]);
}

public function getLatestActivityLogs($limit = 10)
{
    return $this->db->table('activity_log')
                    ->orderBy('activity_time', 'DESC')
                    ->limit($limit)
                    ->get()
                    ->getResult();
}

    public function getAllMedia() {
        return $this->db->table('media')
            ->select('media.*, users.username')
            ->join('users', 'users.id_user = media.id_user')
            ->orderBy('created_at', 'DESC')
            ->get()
            ->getResult();
    }

    public function saveMedia($data) {
        return $this->db->table('media')->insert($data);
    }

	// public function addLike($media_id, $id_user) {
    //     return $this->db->table('likes')->insert([
    //         'media_id' => $media_id,
    //         'id_user' => $id_user
    //     ]);
    // }
// Example of how to fetch media items with like counts
public function getMediaWithLikes() {
    $builder = $this->db->table('media');
    $builder->select('media.*, COUNT(likes.id) AS like_count');
    $builder->join('likes', 'likes.media_id = media.id', 'left');
    $builder->groupBy('media.id');
    $query = $builder->get();
    return $query->getResult();
}

	public function addComment($media_id, $id_user, $comment_text) {
		return $this->db->table('comments')->insert([
			'media_id' => $media_id,
			'id_user' => $id_user,
			'comment_text' => $comment_text,
			'created_at' => date('Y-m-d H:i:s')  // Menyimpan waktu pembuatan
		]);
	}
	
	public function getAllMediaWithUser() {
		return $this->db->table('media')
			->select('media.*, users.nama_lengkap')
			->join('users', 'users.id_user = media.id_user')
			->get()
			->getResult();
	}
	
	public function getAllMediaWithUsers($user_id) {
		$sql = "
			SELECT media.*, users.nama_lengkap, 
			(SELECT comment_text FROM comments WHERE media_id = media.id LIMIT 1) as comment_text
			FROM media
			JOIN users ON users.id_user = media.id_user
			LEFT JOIN likes ON likes.media_id = media.id AND likes.id_user = ?
			GROUP BY media.id
			ORDER BY media.created_at DESC
		";
	
		return $this->db->query($sql, [$user_id])->getResult();
	}
	
	
	
	
	
	
	public function get_media_with_comments()
	{
		$media = $this->findAll();  // Mengambil semua item media
	
		foreach ($media as &$item) {
			$item['comments'] = $this->db->table('comments')
										 ->where('media_id', $item['id'])
										 ->get()->getResultArray();
		}
	
		return $media;
	}
	// public function addLike($media_id, $id_user) {
	// 	$data = [
	// 		'media_id' => $media_id,
	// 		'id_user' => $id_user,
	// 	];
	// 	return $this->db->table('likes')->insert($data);
	// }
	
	// public function checkIfLiked($media_id, $id_user) {
	// 	return $this->db->table('likes')
	// 					->where('media_id', $media_id)
	// 					->where('id_user', $id_user)
	// 					->countAllResults() > 0;
	// }
	
	
	public function checkIfLiked($mediaId, $userId)
{
    return $this->db->table('likes')
                    ->where('media_id', $mediaId)
                    ->where('id_user', $userId)
                    ->countAllResults() > 0;
}

public function addLike($mediaId, $userId)
{
    $data = [
        'media_id' => $mediaId,
        'id_user' => $userId
    ];
    return $this->db->table('likes')->insert($data);
}

public function getLikeCount($mediaId)
{
    return $this->db->table('likes')
                    ->where('media_id', $mediaId)
                    ->countAllResults();
}

	
}

