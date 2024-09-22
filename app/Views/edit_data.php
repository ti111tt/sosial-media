<!-- Form Start -->
<div class="container-fluid pt-4 px-4">
                <div class="row g-4">
               
                    <div class="col-sm-12 col-xl-6">
                    <form action="<?= base_url('home/aksi_edit_data') ?>" method="post"  enctype="multipart/form-data">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Input Data Sekolah</h6>
                            <div>
                                <label for="formFileLg" class="form-label">Logo Web</label>
                                <input class="form-control form-control-lg bg-dark" id="formFileLg" type="file" name="logo">
                            </div>
                            <div>
                                <label for="formFileLg" class="form-label">Icon Web</label>
                                <input class="form-control form-control-lg bg-dark" id="formFileLg" type="file"  name="icon">
                            </div>
                            <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">nama data</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" name="nama">
                                </div>
                                <button type="submit" class="btn btn-danger">Simpan</button>
                            </div>
                            
        </form>
                    </div>
                    
                </div>
            </div>