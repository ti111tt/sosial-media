


            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambahJadwalModal">
                            Tambah Jadwal
                </button>
                <button onclick="printSelectedColumns()" class="btn btn-success">Print Jadwal</button>

                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">jadwal kegiatan p5</h6>
                        <a href="">Show All</a>
                        
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-white">
                                    
                                    <th scope="col">id_kls</th>
                                    <th scope="col">jurusan</th>
                                    <th scope="col">kegiatan_p5</th>
                                    <th scope="col">tgl</th>
                                    <th scope="col">kelas</th>
                                    
                                    <th scope="col">aksi</th>
                        
                                </tr>
                            </thead>
                            <tbody>
                            <?php
      $no=1;
      foreach ($tinardo as $nelson ) {
?>
                              <tr>
    <td><?= $nelson->id_kls ?></td>
    <td><?= $nelson->jurusan ?></td>
    <td><?= $nelson->kegiatan_p5 ?></td>
    <td><?= $nelson->tgl ?></td>
    <td><?= $nelson->kelas ?></td>



    <td>
        <button type="button" class="btn btn-primary" 
            data-bs-toggle="modal" 
            data-bs-target="#detailModal"
            data-id_kls="<?= $nelson->id_kls ?>"
            data-jurusan="<?= $nelson->jurusan ?>"
            data-kegiatan_p5="<?= $nelson->kegiatan_p5 ?>"
            data-tgl="<?= $nelson->tgl ?>">
            Detail
        </button>
       
        </td>
    </td>
</tr>


                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <script>
    function printSelectedColumns() {
        // Membuat tabel baru hanya dengan kolom yang diinginkan
        var printTable = '<table class="table text-start align-middle table-bordered table-hover mb-0">';
        printTable += '<thead><tr><th scope="col">Jurusan</th><th scope="col">Kegiatan P5</th><th scope="col">Tanggal</th><th scope="col">Kelas</th></tr></thead><tbody>';

        // Pilih semua baris dari tabel asli
        var rows = document.querySelectorAll('table tbody tr');

        // Iterasi setiap baris dan ambil kolom yang diinginkan
        rows.forEach(function (row) {
            var jurusan = row.querySelector('td:nth-child(2)').textContent;
            var kegiatan = row.querySelector('td:nth-child(3)').textContent;
            var tgl = row.querySelector('td:nth-child(4)').textContent;
            var kelas = row.querySelector('td:nth-child(5)').textContent;

            printTable += '<tr><td>' + jurusan + '</td><td>' + kegiatan + '</td><td>' + tgl + '</td><td>' + kelas + '</td></tr>';
        });

        printTable += '</tbody></table>';

        // Membuka jendela cetak baru
        var newWindow = window.open('', '', 'width=800,height=600');
        newWindow.document.write('<html><head><title>Print Jadwal</title>');
        newWindow.document.write('<style>table { width: 100%; border-collapse: collapse; } th, td { border: 1px solid black; padding: 8px; text-align: left; }</style>');
        newWindow.document.write('</head><body>');
        newWindow.document.write(printTable);
        newWindow.document.write('</body></html>');
        newWindow.document.close(); // Tutup dokumen agar selesai rendering

        // Tambahkan sedikit delay sebelum mencetak untuk memastikan halaman telah selesai di-render
        setTimeout(function() {
            newWindow.focus(); // Fokus ke jendela cetak
            newWindow.print(); // Cetak dokumen
            newWindow.close(); // Tutup jendela cetak setelah mencetak
        }, 500); // Penundaan selama 500ms
    }
</script>



            <!-- Recent Sales End -->
             <!-- Tambah Jadwal Modal -->
             <div class="modal fade" id="tambahJadwalModal" tabindex="-1" aria-labelledby="tambahJadwalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahJadwalLabel">Tambah Jadwal</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('home/aksi_tambah_jadwal') ?>" method="post">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="jurusan" name="jurusan" placeholder="Jurusan" required>
            <label for="jurusan">Jurusan</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="kegiatan_p5" name="kegiatan_p5" placeholder="Kegiatan P5" required>
            <label for="kegiatan_p5">Kegiatan P5</label>
          </div>
          <div class="form-floating mb-3">
            <input type="date" class="form-control" id="tgl" name="tgl" placeholder="Tanggal" required>
            <label for="tgl">Tanggal</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Kelas" required>
            <label for="kelas">Kelas</label>
          </div>
         
          <button type="submit" class="btn btn-danger">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" action="<?= base_url('home/aksi_edit_jadwal') ?>" method="post">
                    <input type="hidden" id="edit_id_kls" name="id_kls">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="edit_jurusan" name="jurusan" required>
                        <label for="edit_jurusan">Jurusan</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="edit_kegiatan_p5" name="kegiatan_p5" required>
                        <label for="edit_kegiatan_p5">Kegiatan P5</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="date" class="form-control" id="edit_tgl" name="tgl" required>
                        <label for="edit_tgl">Tanggal</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="edit_kelas" name="kelas" required>
                        <label for="edit_kelas">Kelas</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Detail Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-secondary rounded p-4">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel">Detail Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="modal-id_kls" class="form-label">ID Kelas</label>
                        <input type="text" class="form-control" id="modal-id_kls" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="modal-jurusan" class="form-label">Jurusan</label>
                        <input type="text" class="form-control" id="modal-jurusan" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="modal-kegiatan_p5" class="form-label">Kegiatan P5</label>
                        <input type="text" class="form-control" id="modal-kegiatan_p5" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="modal-tgl" class="form-label">Tanggal</label>
                        <input type="text" class="form-control" id="modal-tgl" readonly>
                    </div>
                    <!-- res -->
                    <a href="<?=base_url('home/restoreupjadwal/'.$nelson->id_kls)?>">
        <button type="button" class="btn btn-primary">restore
        </button>
        </a>
        <!-- del -->
        <a href="<?=base_url('home/sdjadwal/'.$nelson->id_kls)?>">
        <button type="button" class="btn btn-primary">delete
        </button>
        </a>
        <td>
            <!-- reup -->
            <a href="<?=base_url('home/restoreupjadwal/'.$nelson->id_kls)?>">
        <button type="button" class="btn btn-primary">rup
        </button>
        </a>

               
                                <!-- Edit Button -->
        <button type="button" class="btn btn-warning" 
            data-bs-toggle="modal" 
            data-bs-target="#editModal"
            data-id_kls="<?= $nelson->id_kls ?>"
            data-jurusan="<?= $nelson->jurusan ?>"
            data-kegiatan_p5="<?= $nelson->kegiatan_p5 ?>"
            data-tgl="<?= $nelson->tgl ?>"
            data-kelas="<?= $nelson->kelas ?>">
            Edit
        </button>
    </td>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('detailModal').addEventListener('show.bs.modal', function (event) {
    var button = event.relatedTarget;
    
    // Extract info from data-* attributes
    var id_kls = button.getAttribute('data-id_kls');
    var jurusan = button.getAttribute('data-jurusan');
    var kegiatan_p5 = button.getAttribute('data-kegiatan_p5');
    var tgl = button.getAttribute('data-tgl');
   
    
    // Update the modal's content.
    document.getElementById('modal-id_kls').value = id_kls;
    document.getElementById('modal-jurusan').value = jurusan;
    document.getElementById('modal-kegiatan_p5').value = kegiatan_p5;
    document.getElementById('modal-tgl').value = tgl;
   

});
    document.getElementById('editModal').addEventListener('show.bs.modal', function (event) {
    var button = event.relatedTarget;
    
    // Extract info from data-* attributes
    var id_kls = button.getAttribute('data-id_kls');
    var jurusan = button.getAttribute('data-jurusan');
    var kegiatan_p5 = button.getAttribute('data-kegiatan_p5');
    var tgl = button.getAttribute('data-tgl');
    var kelas = button.getAttribute('data-kelas');
   
    
    // Populate the form fields
    document.getElementById('edit_id_kls').value = id_kls;
    document.getElementById('edit_jurusan').value = jurusan;
    document.getElementById('edit_kegiatan_p5').value = kegiatan_p5;
    document.getElementById('edit_tgl').value = tgl;
    document.getElementById('edit_kelas').value = kelas;
});
</script>
        

