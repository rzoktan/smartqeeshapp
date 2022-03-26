<!-- Content Wrapper. Contains page content -->
<input type="hidden" id="txtHiddenMDepartment">
<div class="content-wrapper">
     <section class="content-header">
          <div class="container-fluid">
               <div class="row mb-2">
                    <div class="col-sm-6">
                         <h1><?= $subpage; ?></h1>
                    </div>
                    <div class="col-sm-6">
                         <ol class="breadcrumb float-sm-right">
                              <li class="breadcrumb-item"><a href="#"><?= $page; ?></a></li>
                              <li class="breadcrumb-item active"><?= $subpage; ?></li>
                         </ol>
                    </div>
               </div>
          </div>
     </section>
     <section class="content">
          <div class="container-fluid">
               <div class="row">
                    <div class="col-12">
                         <div class="card bg-white">
                              <div class="card-header">
                                   <h3 class="card-title">List Data <?= $subpage; ?></h3>
                                   <div class="card-tools">
                                        <div class="input-group input-group-sm" style="width: 150px;">
                                             <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                                             <div class="input-group-append">
                                                  <button type="submit" class="btn btn-default">
                                                       <i class="fas fa-search"></i>
                                                  </button>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                              <div class="card-body">
                                   <a class="btn btn-sm btn-primary btn_menu_add mb-2" data-toggle="modal" data-target="#modalAdd">Add Department</a>
                                   <table class="table table-sm">
                                        <thead>
                                             <tr>
                                                  <th class="text-center">#</th>
                                                  <th class="text-center">NAMA</th>
                                                  <th class="text-center">AKTIF</th>
                                                  <th class="text-center">TOOL</th>
                                             </tr>
                                        </thead>
                                        <tbody id="menu_tbody">

                                        </tbody>
                                   </table>
                              </div>
                              <!-- <div class="card-footer clearfix">
                                   <ul class="pagination pagination-sm m-0 float-right">
                                        <li class="page-item"><a class="page-link" href="#">«</a></li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#">»</a></li>
                                   </ul>
                              </div> -->
                         </div>
                    </div>
               </div>
          </div>
     </section>
</div>
<!-- modal add menu -->
<!-- Modal -->
<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modalAddTitle" aria-hidden="true">
     <div class="modal-dialog" role="document">
          <div class="modal-content">
               <div class="modal-header">
                    <h5 class="modal-title">Modal Tambah Department</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                    </button>
               </div>
               <form id="formModalAdd">
                    <div class="modal-body">
                         <div class="form-group">
                              <label for="txtNamaDepartement">Nama<small class="text-danger">* (Wajib di isi)</small></label>
                              <input type="text" class="form-control" id="txtNamaDepartement" name="txtNamaDepartement" placeholder="Nama Department" required>
                         </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                         <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Tutup</button>
                         <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                    </div>
               </form>
          </div>
     </div>
</div>
<!-- modal edit menu -->
<div class="modal fade" id="modalEditMenu" tabindex="-1" role="dialog" aria-labelledby="modalEditMenuTitle" aria-hidden="true">
     <div class="modal-dialog" role="document">
          <div class="modal-content">
               <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                    </button>
               </div>
               <div class="modal-body">
                    <form id="form_edit_menu" enctype="multipart/form-data">
                         <div class="form-group row">
                              <label for="nama_menu" class="col-sm-2 col-form-label">Nama</label>
                              <div class="col-sm-10">
                                   <input type="hidden" class="form-control" id="id_menu_edit" name="id_menu_edit">
                                   <input type="text" class="form-control" id="nama_menu_edit" name="nama_menu_edit">
                              </div>
                         </div>
                         <div class="form-group row">
                              <label for="url_menu" class="col-sm-2 col-form-label">Url</label>
                              <div class="col-sm-10">
                                   <input type="text" class="form-control" id="url_menu_edit" name="url_menu_edit">
                              </div>
                         </div>
                         <div class="form-group row">
                              <label for="icon_menu" class="col-sm-2 col-form-label">Icon</label>
                              <div class="col-sm-10">
                                   <input type="text" class="form-control" id="icon_menu_edit" name="icon_menu_edit">
                              </div>
                         </div>
                         <div class="row">
                              <div class="col-sm-10"></div>
                              <div class="col-sm-2 float-right">
                                   <button type="submit" class="btn btn-sm btn-primary btn_save">Submit</button>
                              </div>
                         </div>
                    </form>
               </div>
          </div>
     </div>
</div>
<script src="<?= base_url("assets/custom_js/master_department.js"); ?>"></script>