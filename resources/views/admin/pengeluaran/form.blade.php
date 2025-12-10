<div class="mb-3">
    <label>Tanggal</label>
    <input type="date" name="tanggal" class="form-control"
        value="{{ old('tanggal', $pengeluaran->tanggal ?? '') }}">
</div>

<div class="mb-3">
    <label>Kategori</label>
    <select name="kategori" class="form-control">
        @foreach(['token_listrik','nyaah_ka_indung','muadzin_cilik','renovasi_masjid','honor_guru_ngaji','program_sosial','lainnya'] as $k)
            <option value="{{ $k }}" {{ (old('kategori', $pengeluaran->kategori ?? '') == $k) ? 'selected' : '' }}>
                {{ ucfirst(str_replace('_',' ',$k)) }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label>Deskripsi</label>
    <textarea name="deskripsi" class="form-control">{{ old('deskripsi', $pengeluaran->deskripsi ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label>Jumlah (Rp)</label>
    <input type="number" name="jumlah" step="any"
    class="form-control"
    value="{{ old('jumlah', $pengeluaran->jumlah ?? '') }}">
</div>

<div class="mb-3">
    <label>Bukti (nota/foto)</label><br>
    @isset($pengeluaran->bukti)
        <img src="{{ asset('storage/'.$pengeluaran->bukti) }}" width="100" class="mb-2"><br>
    @endisset
    <input type="file" name="bukti" class="form-control">
</div>
