        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
    
    <?php

    
use App\Controllers\User;

if (session()->get('message')): ?>

          <div class="alert alert-success alert-dismissible fade show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
              Data Mahasiswa Berhasil <strong><?= session()->getFlashdata('message');?></strong>
          </div>

          <?php endif; ?>
          
          <div class="card">
              <div class="card-header">
                  <!--button trigger modal-->
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modelTambah">
                    Tambah Data
                  </button>
              </div>
          </div>

          <!--Modal-->
          <div class="modal fade" id="modelTambah">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title">Tambah Data Mahasiswa</h5>
                            <button type="button" class="close" data-dismis="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                      </div>
                      <div class="modal-body">
                          <form action="<?= base_url('/User/tambah/')?>" method="POST">
                          
                          <div class="form-group mb-0">
                              <label for="nim"></label>
                              <input type="text" name="nim" id="nim" class="form-control" placeholder="Masukan Nomor Induk Mahasiswa">
                          </div>

                          <div class="form-group mb-0">
                              <label for="firstname"></label>
                              <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Masukan Nama Depan Anda">
                          </div>

                          <div class="form-group mb-0">
                              <label for="lastname"></label>
                              <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Masukan Nama Belakang Anda">
                          </div>

                          <div class="form-group mb-0">
                              <label for="email"></label>
                              <input type="text" name="email" id="email" class="form-control" placeholder="Masukan Email Anda">
                          </div>

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
        </div>
            </form>
                </div>
                    </div>

<div class="card">
    <div class="card-body">
        <table class="table table-striped">
        <thead>
    <tr>
        <th>Nomor</th>
        <th>NIM</th>
        <th>FIRSTNAME</th>
        <th>LASTNAME</th>
        <th>EMAIL</th>
        <th>Opsi</th>
    </tr>
        </thead>
         <tbody>
             <?php $i = 1; ?>
             <?php foreach($user as $row) : ?>
             <tr>
            <td scope= "row"> <?= $i; ?></td>
                <td> <?= $row['nim'] ?></td>
                <td> <?= $row['firstname'] ?></td>
                <td> <?= $row['lastname'] ?></td>
                <td> <?= $row['email'] ?></td>
                <td> 
                <!--<a href="<?= base_url('/User/ubah/'.$row['nim']) ?>" class="badge badge-success">Edit</a>-->
              <button type="button" data-toggle="modal" data-target="#modalUbah" class="btn btn-sm btn-warning">
                <i class="fa fa-edit"></i></button>

                <a href="<?= base_url('/User/hapus/'.$row['nim']) ?>" class="badge badge-danger" onclick="return confirm('Yakin ingin menghapus?')">Delete</a> 
            </td>
             </tr>
             <?php $i++; ?>   
             <?php endforeach; ?>
            
<!--Modal Edit-->
            <div class="modal fade" id="modalUbah">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Data Mahasiswa</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        
                        <form action="<?= base_url('/User/ubah/'); ?>" method="POST">
                            
                            <div class="form-group mb-0">
                                <label for="nim"></label>
                                <input type="text" name="nim" id="nim" class="form-control" placeholder="Masukkan Nomor Induk Mahasiswa">
                            </div>

                            <div class="form-group mb-0">
                                <label for="firstname"></label>
                                <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Masukkan Nama Depan">
                            </div>

                            <div class="form-group mb-0">
                                <label for="lastname"></label>
                                <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Masukkan Nama Belakang">
                            </div>

                            <div class="form-group mb-0">
                                <label for="email"></label>
                                <input type="text" name="email" id="email" class="form-control" placeholder="Masukkan Email">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" >Ubah Data</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
<!--akhir modal ubah-->

            </tbody>
        </table>
    </div>
</div>




