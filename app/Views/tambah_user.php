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
                            
                            
                            
                                
                            <form action="<?= base_url('home/aksi_tambah_user') ?>" method="post">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="username">
                            <label for="floatingInput">Username</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="floatingPassword" name="pass">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingPassword" name="nl">
                            <label for="floatingPassword">Nama Lengkap</label>
                        </div>
                        <select class="form-select mb-3" aria-label="Default select example" name="jk">
                                <option value="laki" selected>Jenis Kelamin</option>
                                <option value="perempuan">Perempuan</option>
                                <option value="laki">Laki-Laki</option>
                                
                            </select>
                            <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingPassword" name="alamat">
                            <label for="floatingPassword">Alamat</label>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            
                            
                        </div>
                        <button type="submit" class="btn btn-primary m-2">Tambah</button>
                        </form>
                                
                                
                            
                        </div>
                    </div>
                    
                </div>
            </div>
            <!-- Other Elements End -->