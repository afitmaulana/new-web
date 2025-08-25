<div class="container mt-4">
    <h3>Form Absensi</h3>
    <form method="post" action="<?= site_url('attendance/save') ?>">
        <?= csrf_field() ?>

        <div class="mb-3">
            <label>Nama Pegawai</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Status Kehadiran</label>
            <select name="status" class="form-control" required>
                <option value="">-- Pilih Status --</option>
                <option value="Hadir">Hadir</option>
                <option value="Izin">Izin</option>
                <option value="Sakit">Sakit</option>
                <option value="Alpa">Alpa</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
