<?= $this->extend('layout/dashboard_layout') ?>

<?= $this->section('content') ?>
<div class="card shadow-sm">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary"><?= esc($title) ?></h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-5">
                <div class="mb-3">
                    <label for="jenis_surat_id" class="form-label">1. Pilih Jenis Surat</label>
                    <select id="jenis_surat_id" class="form-select">
                        <option selected disabled>-- Silakan Pilih --</option>
                        <?php foreach ($jenisSurat as $jenis): ?>
                            <option value="<?= $jenis['id'] ?>"><?= esc($jenis['nama_surat']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="alert alert-info small">
                    Pilih jenis surat di atas untuk menampilkan formulir isian yang sesuai.
                </div>
            </div>
            <div class="col-md-7">
                <form id="form-surat" method="POST" action="<?= site_url('dashboard/surat/generate') ?>">
                     <?= csrf_field() ?>
                     <input type="hidden" name="surat_jenis_id" id="surat_jenis_id_hidden">
                     
                     <label class="form-label">2. Isi Data Pemohon</label>
                     <div id="dynamic-form-fields" class="border p-3 rounded bg-light" style="min-height: 200px;">
                        <p class="text-muted text-center" style="margin-top: 70px;">Pilih jenis surat untuk menampilkan formulir.</p>
                     </div>
                     <button type="submit" class="btn btn-primary mt-3" id="btn-submit-surat" disabled>
                        <i class="fas fa-print"></i> Buat & Cetak Surat
                     </button>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('page-scripts') ?>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const selectJenisSurat = document.getElementById('jenis_surat_id');
    const dynamicFormFields = document.getElementById('dynamic-form-fields');
    const btnSubmit = document.getElementById('btn-submit-surat');
    const hiddenJenisId = document.getElementById('surat_jenis_id_hidden');

    selectJenisSurat.addEventListener('change', function () {
        const jenisId = this.value;
        if (!jenisId) return;

        dynamicFormFields.innerHTML = '<p class="text-muted text-center" style="margin-top: 70px;">Memuat formulir...</p>';
        btnSubmit.disabled = true;
        hiddenJenisId.value = jenisId;

        fetch(`<?= site_url('dashboard/surat/get-form-fields/') ?>${jenisId}`, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(response => response.ok ? response.json() : Promise.reject('Gagal mengambil data.'))
        .then(data => {
            if (data.status === 'success') {
                renderForm(data.fields);
                btnSubmit.disabled = false;
            } else {
                dynamicFormFields.innerHTML = `<p class="text-danger text-center" style="margin-top: 70px;">Gagal memuat formulir.</p>`;
            }
        })
        .catch(error => {
            dynamicFormFields.innerHTML = `<p class="text-danger text-center" style="margin-top: 70px;">Terjadi kesalahan. Coba lagi.</p>`;
        });
    });

    function renderForm(fields) {
        let html = '';
        if (fields.length === 0) {
            html = '<p class="text-muted text-center">Tidak ada isian untuk surat ini.</p>';
        } else {
            fields.forEach(field => {
                html += '<div class="mb-3">';
                html += `<label for="${field.name}" class="form-label">${field.label}</label>`;
                
                const required = field.required ? 'required' : '';

                if (field.type === 'textarea') {
                    html += `<textarea name="data[${field.name}]" id="${field.name}" class="form-control" rows="3" ${required}></textarea>`;
                } else {
                    html += `<input type="${field.type}" name="data[${field.name}]" id="${field.name}" class="form-control" ${required}>`;
                }
                html += '</div>';
            });
        }
        dynamicFormFields.innerHTML = html;
    }
});
</script>
<?= $this->endSection() ?>