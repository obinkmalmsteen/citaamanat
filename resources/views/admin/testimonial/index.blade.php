@extends('layouts/app')


@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-university   mr-2"></i>
        {{ $title }}

    </h1>

    <div class="card">


        <div class="card-header d-flex flex-wrap justify-content-between">
            <div>
                <button class="btn btn-sm btn-primary" data-toggle="collapse" data-target="#formTambahTestimonial">
                    <i class="fas fa-plus mr-2"></i> Berikan Testimonial
                </button>
            </div>
        </div>

        <div class="d-flex justify-content-center">
            <div id="formTambahTestimonial" class="collapse mt-3 w-100">
                <form action="{{ route('testimonial.store') }}" method="POST" enctype="multipart/form-data"
                    class="p-3 border rounded bg-white shadow">
                    <div class="mx-auto text-center mb-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
                        <p class="fs-5 text-uppercase "><b>SILAHKAN ISI TESTIMONIAL ANDA</b></p>

                    </div>
                    @csrf

                    <div class="form-group mb-3">
    <label for="ucapan" class="form-label required">Ucapan</label><label class="form-label text-danger">. * Harus Diisi</label>
    <textarea name="ucapan" id="ucapan" class="form-control"
              style="background-color: #f1f1f1;" rows="4" required></textarea>
</div>

                    <br>
                    <div class="form-group mb-3">
                        <label for="keterangan" class="form-label">Nama Pengelola Masjid </label><label class="form-label text-danger">. * Harus Diisi</label>
                        <input type="text" placeholder="Contoh: Ketua DKM Al Abror, Ahmad Saeful" name="keterangan"
                            id="keterangan" class="form-control" style="background-color: #f1f1f1;" required>
                    </div>
                    <br>
                    <div class="form-group mb-3">
                        <label for="foto_pengelola" class="form-label">Foto Ketua DKM / Pengelola Masjid</label><label class="form-label text-danger">. * Harus Diisi</label>
                        <input type="file" name="foto_pengelola" id="foto_pengelola-field" class="form-control"
                            style="background-color: #f1f1f1;" accept="image/*" required>
                    </div>
                    <br>

                    <div class="form-group mb-3">
                        <label for="video" class="form-label">Video (opsional)</label>
                        <input type="file" name="video" id="video" class="form-control"
                            style="background-color: #f1f1f1;" accept="video/*">
                    </div>
                    <br>
                 
 <div class="col-md-12 mb-4">
                        <button type="submit" class="btn btn-success col-12">
                            <i class="fas fa-save mr-2"></i>
                            Kirim Testimonial
                        </button>
                    </div>


                </form>
            </div>
        </div>



        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>No</th>
                        <th>Id testimonial</th>
                        <th>Ucapan</th>
                        <th>Photo</th>
                        <th>Video</th>
                        <th>Pengelola Masjid</th>
                        <th>
                            <i class="fas fa-cog"></i>
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($testimonial as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $item->id_testimonial }}</td>
                            <td>{{ $item->ucapan }}</td>
                            <td class="text-center">
                                @if ($item->photo)
                                    <img src="{{ asset('storage/foto_pengelola/' . $item->photo) }}" alt="Foto Pengelola"
                                        style="width: 70px; height: 70px; object-fit: cover; border-radius: 8px;">
                                @else
                                    <span class="text-muted">Tidak ada foto</span>
                                @endif
                            </td>

                            <td class="text-center">
                                @if ($item->video)
                                    <div class="mt-3">
                                        <video width="100%" height="auto" controls
                                            style="border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.15);">
                                            <source src="{{ asset('storage/video/' . $item->video) }}" type="video/mp4">
                                            Browser Anda tidak mendukung pemutaran video.
                                        </video>
                                    </div>
                                @endif
                            </td>
                            <td>{{ $item->keterangan }}</td>




                            <td class="text-center">
                                <a href="#" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection


@if ($errors->any())
<script>
document.addEventListener("DOMContentLoaded", function() {
    const tombol = document.querySelector('[data-toggle="collapse"][data-target="#formTambahTestimonial"]');
    if (tombol) {
        tombol.click(); // buka form hanya jika ada error
    }
});
</script>
@endif


