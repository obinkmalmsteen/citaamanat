<div class="row">
    {{-- Provinsi --}}
    <div class="col-md-6 mb-3">
        <label>Provinsi</label>
        <select id="province_id" name="province_id" class="form-control" style="background-color:#fff8b3;">
            <option value="">-- Pilih Provinsi --</option>
            @foreach($provinces as $prov)
                <option value="{{ $prov->id }}">{{ $prov->name }}</option>
            @endforeach
        </select>
    </div>

    {{-- Kabupaten --}}
    <div class="col-md-6 mb-3">
        <label>Kabupaten / Kota</label>
        <select id="regency_id" name="regency_id" class="form-control" style="background-color:#fff8b3;">
            <option value="">-- Pilih Kabupaten/Kota --</option>
        </select>
    </div>

    {{-- Kecamatan --}}
    <div class="col-md-6 mb-3">
        <label>Kecamatan</label>
        <select id="district_id" name="district_id" class="form-control" style="background-color:#fff8b3;">
            <option value="">-- Pilih Kecamatan --</option>
        </select>
    </div>

    {{-- Kelurahan --}}
    <div class="col-md-6 mb-3">
        <label>Kelurahan / Desa</label>
        <select id="village_id" name="village_id" class="form-control" style="background-color:#fff8b3;">
            <option value="">-- Pilih Kelurahan/Desa --</option>
        </select>
    </div>
</div>

{{-- Script AJAX --}}
<script>
$(document).ready(function() {
    $('#province_id').on('change', function() {
        var provinceID = $(this).val();
        $('#regency_id').html('<option value="">-- Pilih Kabupaten/Kota --</option>');
        $('#district_id').html('<option value="">-- Pilih Kecamatan --</option>');
        $('#village_id').html('<option value="">-- Pilih Kelurahan/Desa --</option>');

        if (provinceID) {
            $.get('/get-regencies/' + provinceID, function(data) {
                $.each(data, function(index, regency) {
                    $('#regency_id').append('<option value="' + regency.id + '">' + regency.name + '</option>');
                });
            });
        }
    });

    $('#regency_id').on('change', function() {
        var regencyID = $(this).val();
        $('#district_id').html('<option value="">-- Pilih Kecamatan --</option>');
        $('#village_id').html('<option value="">-- Pilih Kelurahan/Desa --</option>');

        if (regencyID) {
            $.get('/get-districts/' + regencyID, function(data) {
                $.each(data, function(index, district) {
                    $('#district_id').append('<option value="' + district.id + '">' + district.name + '</option>');
                });
            });
        }
    });

    $('#district_id').on('change', function() {
        var districtID = $(this).val();
        $('#village_id').html('<option value="">-- Pilih Kelurahan/Desa --</option>');

        if (districtID) {
            $.get('/get-villages/' + districtID, function(data) {
                $.each(data, function(index, village) {
                    $('#village_id').append('<option value="' + village.id + '">' + village.name + '</option>');
                });
            });
        }
    });
});
</script>
