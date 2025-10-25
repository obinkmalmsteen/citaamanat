
  

    <h2>Form Pendaftaran Masjid</h2>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <style>
.hidden {
  display: none;
  opacity: 0;
  transition: opacity 0.3s ease;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const selectField = document.querySelector('select[name="sesuai_id_mesjid"]');
    const alasanFieldDiv = document.querySelector('#alasan_id_berbeda-field').closest('.col-md-12');

   function toggleAlasanField() {
    if (selectField.value === 'Tidak') {
        alasanFieldDiv.classList.remove('hidden');
    } else {
        alasanFieldDiv.classList.add('hidden');
        document.querySelector('#alasan_id_berbeda-field').value = '';
    }
}

    // Jalankan saat pertama kali halaman dimuat
    toggleAlasanField();

    // Jalankan setiap kali pilihan berubah
    selectField.addEventListener('change', toggleAlasanField);
});
</script>
 
    <form method="POST" action="{{ route('masjidPublicStore') }}">
        @csrf
                <div class="col-md-12 mb-4" >
                  <label for="name-field" class="pb-2">1. Id pelanggan</label>
                  <input type="text" name="id_pelanggan" class="form-control" id="id_pelanggan-field" style="background-color: #fff8b3;"  required="">
                </div>

                <div class="col-md-12 mb-4">
                  <label for="nama_pelanggan-field" class="pb-2">2. Nama Pelanggan</label>
                  <input type="text" class="form-control" style="background-color: #fff8b3;" name="nama_pelanggan" id="nama_pelanggan-field" required="">
                </div>
                 
                    <div class="col-md-12 mb-4">
                        <label class="form-label"><span class="text-danger">*</span>3. Jenis Bangunan (Masjid atau Mushola):</label>
                        <select name="Jenis_bangunan" style="background-color: #fff8b3;" class="form-control" value="{{ old('jenis_bangunan') }}">
                            <option selected disabled>== Pilih Jenis Bangunan ==</option>
                            <option value="Masjid">Masjid</option>
                            <option value="Mushola">Mushola</option>
                            
                        </select>
                        @error('jenis_bangunan')
                        <small class="text-danger">{{ $message }}</small>  
                        @enderror
                    </div>

                      <div class="col-md-12 mb-4">
                  <label for="nama_masjid-field" class="pb-2">Nama Masjid / Mushola</label>
                  <input type="text" class="form-control" style="background-color: #fff8b3;"
                   name="nama_masjid" id="nama_masjid-field" required="">
                </div>

                     <div class="col-md-12 mb-4">
                        <label class="form-label"><span class="text-danger">*</span>4. Jenis Pembayaran Listrik :</label>
                        <select name="Jenis_layanan" style="background-color: #fff8b3;" class="form-control" value="{{ old('Jenis_layanan') }}">
                            <option selected disabled>== Pilih Pra Bayar atau Pasca Bayar ==</option>
                            <option value="PraBayar">Pra Bayar (Token)</option>
                            <option value="PascaBayar">Pasca Bayar</option>
                            
                        </select>
                        @error('Jenis_layanan')
                        <small class="text-danger">{{ $message }}</small>  
                        @enderror
                    </div>

                     <div class="col-md-12 mb-4">
                        <label class="form-label"><span class="text-danger">*</span> Apakah Nama ID Pelanggan PLN memakai nama Masjid/Mushola ?</label>
                        <select name="sesuai_id_mesjid" style="background-color: #fff8b3;" class="form-control" value="{{ old('sesuai_id_mesjid') }}">
                            <option selected disabled>== Pilih Ya atau Tidak==</option>
                            <option value="Ya">Ya</option>
                            <option value="Tidak">Tidak</option>
                            
                        </select>
                        @error('Jenis_layanan')
                        <small class="text-danger">{{ $message }}</small>  
                        @enderror
                    </div>
               

                <div class="col-md-12 mb-4">
                  <label for="alasan_id_berbeda-field" class="pb-2">Apa alasan nya kenapa Id Pelanggan PLN memakai Nama yang berbeda dari nama Masjid atau Mushola nya</label>
                  <input type="text" class="form-control" style="background-color: #fff8b3;"
                   name="alasan_id_berbeda" id="alasan_id_berbeda-field" >
                </div>

                <div class="col-md-12 mb-4">
                  <label for="nama_ketua_dkm-field" class="pb-2">Nama Ketua DKM</label>
                  <input type="text"  class="form-control" style="background-color: #fff8b3;" name="nama_ketua_dkm" id="nama_ketua_dkm-field" required="">
                </div>

                <div class="col-md-12 mb-4">
                  <label for="telp_ketua_dkm-field" class="pb-2">Telepon/HP Ketua DKM</label>
                  <input type="text"  class="form-control" style="background-color: #fff8b3;" name="telp_ketua_dkm" id="telp_ketua_dkm-field" required="">
                </div>

                 <div class="col-md-12 mb-4">
                  <label for="nama_ketua_dkm-field" class="pb-2">Nama Penerima Manfaat ( Bisa ketua DKM, bisa saja Marbot atau siapapun yang ditunjuk oleh masjid)</label>
                  <input type="text"  class="form-control" style="background-color: #fff8b3;" name="nama_ketua_dkm" id="nama_ketua_dkm-field" required="">
                </div>
                
                 <div class="col-md-12 mb-4">
                  <label for="nama_ketua_dkm-field" class="pb-2">Nomor Telepon Penerima Manfaat</label>
                  <input type="text"  class="form-control" style="background-color: #fff8b3;" name="nama_ketua_dkm" id="nama_ketua_dkm-field" required="">
                </div>



                

                <div class="col-md-12 mb-4">
                  <label for="estimasi_biaya-field" class="pb-2">Perkiraan Biaya Listrik Tiap Bulan atau sekali mengisi Token (isi dengan angka Nominal)</label>
                  <input type="text"  class="form-control" style="background-color: #fff8b3;" name="estimasi_biaya" id="estimasi_biaya-field" required="">
                </div>

       <div class="row" >
                    <div class="col-12">
                    <button type="submit" class="btn btn-sm btn-primary col-12">
                        <i class="fas fa-save mr-2"></i>
                        Simpan
                    </button>
                </div>
    </form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(function() {
  $('#province').on('change', function() {
    let province_id = $(this).val();
    $('#regency').html('<option>Loading...</option>');
    $('#district').html('<option value="">-- Pilih Kecamatan --</option>');
    $('#village').html('<option value="">-- Pilih Kelurahan/Desa --</option>');
    $.get('/get-regencies/' + province_id, function(data) {
      $('#regency').empty().append('<option value="">-- Pilih Kabupaten/Kota --</option>');
      data.forEach(function(item) {
        $('#regency').append('<option value="'+item.id+'">'+item.name+'</option>');
      });
    });
  });

  $('#regency').on('change', function() {
    let regency_id = $(this).val();
    $('#district').html('<option>Loading...</option>');
    $('#village').html('<option value="">-- Pilih Kelurahan/Desa --</option>');
    $.get('/get-districts/' + regency_id, function(data) {
      $('#district').empty().append('<option value="">-- Pilih Kecamatan --</option>');
      data.forEach(function(item) {
        $('#district').append('<option value="'+item.id+'">'+item.name+'</option>');
      });
    });
  });

  $('#district').on('change', function() {
    let district_id = $(this).val();
    $('#village').html('<option>Loading...</option>');
    $.get('/get-villages/' + district_id, function(data) {
      $('#village').empty().append('<option value="">-- Pilih Kelurahan/Desa --</option>');
      data.forEach(function(item) {
        $('#village').append('<option value="'+item.id+'">'+item.name+'</option>');
      });
    });
  });
});
</script>
