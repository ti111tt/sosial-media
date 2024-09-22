<!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Restore Users</h6>
                            <!-- <a href="<?= base_url('home/tambah_user')?>">
                                          <button type="button" class="btn btn-success m-2">Tambah</button>
                                          </a> -->
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Level</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
      $no=1;
      foreach ($clara as $nelson ) {
?>
                                    <tr>
                                        <th scope="row"><?= $no++ ?></th>
                                        <td><?= $nelson->username ?></td>
                                        <td><?= $nelson->alamat ?></td>
                                        <td>
<?php
         switch ($nelson->level) {
         case 1:
             echo "Admin";
             break;
         case 2:
             echo "Pelanggan";
             break;
           }?>
                                        </td>
                                        <td>
                                          <a href="<?= base_url('home/aksi_restore_user/'.$nelson->user_id)?>">
                                          <button type="button" class="btn btn-info m-2">Restore</button>
                                          </a>
                                          <!-- <a href="<?= base_url('home/delete_user/'.$nelson->user_id)?>">
                                          <button type="button" class="btn btn-danger m-2">Delete</button>
                                          </a> -->
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    
                    
                    
                </div>
            </div>
            <!-- Table End