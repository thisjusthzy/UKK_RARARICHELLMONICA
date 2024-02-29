<style>
    #jumlah-label,
    #jumlah-value,
    #harga-label,
    #harga-value {
        background-color: rgba(0, 0, 0, 0.1);
        padding: 5px;
        border-radius: 5px;
    }

    .harga-label {
        font-size: 16px;
        color: #333;
    }

    .harga-value {
        font-size: 24px;
        font-weight: bold;
        color: #4CAF50;
    }

    #total-harga-label,
    #total-harga-value {
        background-color: rgba(0, 0, 0, 0.1);
        padding: 5px;
        border-radius: 5px;
    }

    .total-harga-label {
        font-size: 16px;
        color: #333;
    }

    .total-harga-value {
        font-size: 24px;
        font-weight: bold;
        color: #4CAF50;
    }
</style>

<div class="col-md-6 col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Input Barang</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <form action="<?= base_url('transaksi/aksi_transaksi') ?>" method="post">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="password-id-icon">Nama Barang</label>
                                    <div class="col-md-12">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <fieldset class="form-group">
                                                    <select class="form-select" id="basicSelect" name="id_barang_barang"
                                                        onchange="updateStock()">
                                                        <option value="" disabled selected>-</option>
                                                        <?php foreach ($a as $b) { ?>
                                                            <option value="<?= $b->id_barang ?>"
                                                                data-jumlah="<?= $b->jumlah ?>"
                                                                data-harga="<?= $b->harga ?>">
                                                                <?= $b->nama_barang ?> //
                                                                <?= $b->kode_barang ?>
                                                            </option>
                                                        <?php } ?>
                                                    </select>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <label id="jumlah-label">Stock:</label>
                                                <span id="jumlah-value"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="password-id-icon">Nama Customer</label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control" required name="nama_customer"
                                                    placeholder="Nama Customer" id="password-id-icon">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-person-fill"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="email-id-icon">Jumlah</label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control" required name="stock"
                                                    placeholder="Jumlah" id="jumlah-input">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-bag-check-fill"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <label for="cash-input">Cash</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" required name="uang"
                                                        placeholder="Total uang" id="cash-input">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-person-fill"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <label id="harga-label">Harga Satuan: </label>
                                                <span id="harga-value"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="hidden" name="harga_total" id="harga_total_input"
                                                    value="0">
                                                <label id="total-harga-label">Total Harga:</label>
                                                <span id="total-harga-value">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="hidden" name="kembalian" id="change">
                                                <label id="change-label">Change:</label>
                                                <span id="change-value">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="error-message" class="col-12" style="color: red; display: none;"></div>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                </div>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function updateStock() {
        var selectedOption = document.getElementById("basicSelect").options[document.getElementById("basicSelect").selectedIndex];
        var jumlahValue = document.getElementById("jumlah-value");
        var jumlahInput = document.getElementById("jumlah-input");
        var hargaValue = document.getElementById("harga-value");
        var submitButton = document.querySelector("button[type='submit']");
        var errorMessage = document.getElementById("error-message");

        if (selectedOption) {
            jumlahValue.textContent = "" + selectedOption.getAttribute("data-jumlah");
            hargaValue.textContent = "" + selectedOption.getAttribute("data-harga");
            calculateTotal(); // Calculate total price initially
        } else {
            jumlahValue.textContent = "null";
            hargaValue.textContent = "null";

            if (jumlahInput.value > parseInt(jumlahValue.textContent)) {
                submitButton.disabled = true;
                errorMessage.textContent = "Stok melewati batas";
                errorMessage.style.display = "block";
            } else {
                submitButton.disabled = false;
                errorMessage.style.display = "none";
            }
        }
    }

    function calculateTotal() {
        var jumlah = parseFloat(document.getElementById("jumlah-input").value);
        var harga = parseFloat(document.getElementById("harga-value").textContent, "."); // Use "." as the decimal separator
        var totalHarga = jumlah * harga;

        // Format total harga without cents
        var format = new Intl.NumberFormat("id-ID", {
            style: "currency",
            currency: "IDR",
            minimumFractionDigits: 0, // Set minimumFractionDigits to 0 to remove cents
            maximumFractionDigits: 0, // Set maximumFractionDigits to 0 to remove cents
        });
        var totalHargaFormat = format.format(totalHarga);

        // Set total harga value
        document.getElementById("total-harga-value").textContent = totalHargaFormat;

        var jumlahValue = parseInt(document.getElementById("jumlah-value").textContent);
        var submitButton = document.querySelector("button[type='submit']");
        var errorMessage = document.getElementById("error-message");

        if (jumlah > jumlahValue) {
            submitButton.disabled = true;
            errorMessage.textContent = "Stok melewati batas";
            errorMessage.style.display = "block";
        } else {
            submitButton.disabled = false;
            errorMessage.style.display = "none";
        }
        document.getElementById("total-harga-value").textContent = totalHargaFormat;

        // Set the value of hidden input for harga_total
        document.getElementById("harga_total_input").value = totalHarga;
    }
    document.getElementById("jumlah-input").addEventListener("input", calculateTotal);
    document.getElementById("basicSelect").addEventListener("change", updateStock);
    document.getElementById("cash-input").addEventListener("input", calculateChange);

    function calculateChange() {
        var totalHarga = parseFloat(document.getElementById("total-harga-value").textContent.replace(/\D/g, ''));
        var uangInput = document.getElementById("cash-input");
        var changeValue = document.getElementById("change-value");
        var kembalianInput = document.getElementById("change"); // Added this line to get the kembalian input

        // Ensure that uangInput is not empty and is a valid number
        if (uangInput.value && !isNaN(uangInput.value)) {
            var uang = parseFloat(uangInput.value);
            var change = uang - totalHarga;

            // Format the change as currency using the Indonesian Rupiah currency format
            var formattedChange = new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR",
            }).format(change);

            // Display the formatted change
            changeValue.textContent = formattedChange;

            // Update the kembalian input field with the calculated change
            kembalianInput.value = change;
        } else {
            // If uangInput is empty or not a valid number, set change and kembalian to 0
            changeValue.textContent = new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR",
            }).format(0);
            kembalianInput.value = 0;
        }
    }




    document.getElementById("password-id-icon").addEventListener("input", calculateChange);


</script>