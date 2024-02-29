<div class="col-md-6 col-12">

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Input Barang</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <form action="<?= base_url('barang/aksi_addstock') ?>" method="post">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="password-id-icon">Nama Barang</label>
                                    <div class="col-md-12">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <fieldset class="form-group">
                                                    <select class="form-select" id="basicSelect"
                                                        name="id_barang_barang">
                                                        <option>-</option>
                                                        <?php
                                                        foreach ($a as $b) {
                                                            ?>
                                                            <option value="<?= $b->id_barang ?>">
                                                                <?php echo $b->nama_barang ?> //
                                                                <?php echo $b->kode_barang ?>
                                                            </option>
                                                        <?php } ?>
                                                    </select>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">

                                        <div class="form-group has-icon-left">
                                            <label for="email-id-icon">Jumlah</label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control" required name="stock"
                                                    placeholder="Stock" id="email-id-icon">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-bag-check-fill"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group has-icon-left">
                                        <label for="email-id-icon">Supplier</label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control" required name="supplier"
                                                placeholder="Nama Supplier" id="harga-input">
                                            <div class="form-control-icon">
                                                <i class="bi bi-person-fill"></i>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        <!-- <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button> -->
                                    </div>
                                </div>
                            </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</section>