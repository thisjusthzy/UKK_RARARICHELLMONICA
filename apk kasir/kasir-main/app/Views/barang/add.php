<div class="col-md-6 col-12">

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Input Barang</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <form onsubmit="removeFormatAndSubmit(this);" action="<?= base_url('barang/aksi_addbarang') ?>"
                    method="post">
                    <!-- ... rest of your form ... -->

                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="password-id-icon">Nama Barang</label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control" required name="nama_barang"
                                            placeholder="Nama Barang" id="password-id-icon">
                                        <div class="form-control-icon">
                                            <i class="bi bi-stack"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">

                                <div class="form-group has-icon-left">
                                    <label for="email-id-icon">Jumlah / Stock</label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control" required name="jumlah"
                                            placeholder="Stock" id="email-id-icon">
                                        <div class="form-control-icon">
                                            <i class="bi bi-bag-check-fill"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="form-label">Harga Barang:</label>
                                    <div class="position-relative">
                                        <input type="text" id="harga" name="harga" class="form-control text-capitalize"
                                            placeholder="Harga Barang" autocomplete="on" onkeyup="formatRupiah(this)">
                                        <div class="form-control-icon">
                                            <i class="bi bi-currency-dollar"></i>
                                        </div>
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
<script>
    function formatRupiah(input) {
        // Remove existing Rp., spaces, and commas
        let value = input.value.replace(/Rp\.|\s|\./g, "");

        // Format the value with commas for thousands separator
        value = value.replace(/\B(?=(\d{3})+(?!\d))/g, ".");

        // Prepend Rp. to the formatted value
        value = value;

        // Update the input value
        input.value = value;
    }

    function removeFormatAndSubmit(form) {
        // Remove Rp., spaces, and commas before submitting the form
        let hargaInput = form.querySelector("#harga");
        hargaInput.value = hargaInput.value.replace(/Rp\.|\s|\./g, "");

        // You can add additional form submission logic if needed
        form.submit();
    }

    // Example usage
    const input = document.getElementById("harga");
    formatRupiah(input);
</script>