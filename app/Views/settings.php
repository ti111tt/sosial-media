


            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    
                    
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Change Logo / Icon</h6>

                            <form method="post" enctype="multipart/form-data" action="<?=base_url('home/aksi_settings')?>">
                                <div class="mb-3">
                                <label for="formFile" class="form-label">Logo Web</label>
                                <input class="form-control bg-dark" type="file" id="formFile" name="logo">
                            </div>

                            <div class="mb-3">
                                <label for="formFile" class="form-label">Icon Web</label>
                                <input class="form-control bg-dark" type="file" id="formFile" name="icon">
                            </div>
                            
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nama Web</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="nama">
                                </div>
                                
                                <button type="submit" class="btn btn-primary">Change</button>
                            </form>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
            <!-- Form End -->