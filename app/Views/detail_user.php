<!-- Other Elements Start -->
<style>
        .form-control {
            width: 50%;
        }
        .form-select {
            width: 50%;
        }
        
    </style>
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    
                    
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                        aria-selected="true">Detail</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-profile" type="button" role="tab"
                                        aria-controls="pills-profile" aria-selected="false">Edit</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-menu-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-menu" type="button" role="tab"
                                        aria-controls="pills-menu" aria-selected="false">Atur Menu</button>
                                </li>
                                
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                    <table class="table table-borderless">
                                
                                <tbody>
                                    <tr>
                                        <th scope="row">Username</th>
                                        <td><?= $clara->username ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Nama Lengkap</th>
                                        <td><?= $clara->nama_lengkap ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Jenis Kelamin</th>
                                        <td><?= $clara->jenis_kelamin ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Alamat</th>
                                        <td><?= $clara->alamat ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Level</th>
                                        <td><?php
         switch ($clara->level) {
         case 1:
             echo "Admin";
             break;
         case 2:
             echo "Pelanggan";
             break;
           }?></td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                            <a href="<?= base_url('home/reset_pass/'.$clara->user_id)?>">
                                          <button type="button" class="btn btn-danger m-2">Reset Password</button>
                                          </a>
                                </div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <form action="<?= base_url('home/edit_user/'.$clara->user_id) ?>" method="post">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="username" value="<?= $clara->username ?>">
                            <label for="floatingInput">Username</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingPassword" name="nl" value="<?= $clara->nama_lengkap ?>">
                            <label for="floatingPassword">Nama Lengkap</label>
                        </div>
                        <select class="form-select mb-3" aria-label="Default select example" name="jk">
                                <option value="<?= $clara->jenis_kelamin ?>" selected>Jenis Kelamin</option>
                                <option value="perempuan">Perempuan</option>
                                <option value="laki">Laki-Laki</option>
                                
                            </select>
                            <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingPassword" name="alamat" value="<?= $clara->alamat ?>">
                            <label for="floatingPassword">Alamat</label>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            
                            
                        </div>
                        <button type="submit" class="btn btn-primary m-2">Edit</button>
                        </form>
                                </div>


                                <div class="tab-pane fade" id="pills-menu" role="tabpanel" aria-labelledby="pills-menu-tab">
                                    <form action="<?= base_url('home/atur_menu/'.$clara->user_id) ?>" method="post">
                        <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Default checkbox
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Default checkbox
                                </label>
                            </div>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            
                            
                        </div>
                        <button type="submit" class="btn btn-primary m-2">Edit</button>
                        </form>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <!-- Other Elements End -->