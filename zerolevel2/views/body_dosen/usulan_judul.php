<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

            <div class="block-header">
                <h2>USULAN JUDUL SKRIPSI</h2>
            </div>

            <?php if($this->session->flashdata('message')) {?>  
            <div class="alert alert-dismissable alert-<?php echo $this->session->flashdata('type');?>">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <?php echo $this->session->flashdata('message');?>
            </div>
            <?php }?>             
            
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                        	<div class="button-demo">
                                <button type="button" class="btn btn-primary btn-lg waves-effect" data-toggle="modal" data-target="#modalFormJudul" data-form="formTambah">Tambah Judul</button>
                            </div>

                            <!-- Tabel judul -->
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Keywords</th>
                                            <th>Tanggal usulan</th>
                                            <th>Diusulkan ke laboratorium/studio</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1;?>
                                        <?php foreach($judul as $list) { ?>
                                        
                                        <tr>
                                            <td><?php echo $i;?></td>
                                            <td><?php echo $list['judulTa'];?></td>
                                            <td><?php echo $list['judulKeyword'];?></td>
                                            <td><?php echo $list['judulTglUsul'];?></td>
                                            <td><?php echo $list['labstudioNama'];?></td>
                                            <td><?php echo $list['judulStatus'];?></td>
                                            <td style='white-space: nowrap'>
                                                <?php if ($list['judulStatus'] != "Not Available") {?>
                                                <button type="button" class="btn btn-xs btn-warning waves-effect" data-toggle="modal" data-target="#modalFormJudul" data-form="formEdit" data-id="<?php echo $list['judulId'];?>">Edit</button>
                                                <button class="btn btn-xs btn-danger waves-effect buttonHapus" data-id="<?php echo $list['judulId'];?>">Delete</button>

                                                <?php }?>
                                            </td>
                                        </tr>
                                        <?php $i++;}?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- #END# Tabel judul -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modals utk menampilkan form input judul -->
            <div class="modal fade" id="modalFormJudul" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Judul Skripsi</h4>
                        </div>

                        <div class="modal-body">
                            <?php echo form_open(site_url('dosen/dokumen/tambah'));?>
                                <input type="hidden" name="idJudul">
                                <div class="form-group form-float">
                                    <label class="form-label">Judul</label>
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="judul" required>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <label class="form-label">Diusulkan ke laboratorium/studio</label>
                                    <div class="form-line">
                                        <select class="form-control show-tick" data-live-search="true" name="labstudio">
                                            <option value ="">-- Pilih --</option>
                                            <?php foreach($labstudio as $list) { ?>
                                            <option value ="<?php echo $list['labstudioId'];?>"><?php echo $list['labstudioNama'];?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <label class="form-label">Keywords</label>
                                    <div class="form-line">
                                        <input type="text" class="form-control" data-role="tagsinput" name="keyword">
                                    </div>
                                    <span id="helpBlock" class="help-block small">Kata kunci bisa lebih dari satu, dipisahkan dengan tanda koma.</span>
                                </div>
                            

                                <button class="btn btn-primary waves-effect" type="submit">SIMPAN</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Modals utk menampilkan form input judul -->            
