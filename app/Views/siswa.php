


            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
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



   
       
        
    </td>
</tr>


                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <script>
    

            <!-- Recent Sales End -->
             <!-- Tambah Jadwal Modal -->
             <div class="modal fade" id="tambahJadwalModal" tabindex="-1" aria-labelledby="tambahJadwalLabel" aria-hidden="true">
 