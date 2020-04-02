<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

            <div class="block-header">
                <h1><?php echo $pageTitle;?></h1>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Daftar Dosen</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <!-- Tabel Dosen -->
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Nip</th>
                                            <th>Status</th>
                                            <th>Pangkat/Gol</th>
                                            <th>Fungsional</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1;?>
                                        <?php foreach($dosen as $list) { ?>

                                        <tr>
                                            <td><?php echo $i;?></td>
                                            <td><a href="<?php echo site_url("admin/detail/dosen/").$list->nip;?>"><?php echo $list->nama;?></a></td>
                                            <td><?php echo $list->nip;?></td>
                                            <td><?php echo $list->statusPegawai;?></td>
                                            <td><?php echo $list->pangkatGolongan;?></td>
                                            <td><?php echo $list->jabatanFungsional;?></td>

                                        </tr>
                                        <?php $i++;}?>
                                    </tbody>
                                </table>
                                <!-- #END# Tabel Dosen -->
                            </div> 
                        </div>
                    </div>
                </div>
            </div>