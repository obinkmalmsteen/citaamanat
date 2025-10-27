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
            <i class="fas fa-plus mr-2"></i> Tambah Testimonial
        </button>
    </div>
</div>

<div id="formTambahTestimonial" class="collapse mt-3">
    <form action="{{ route('testimonial.store') }}" method="POST" enctype="multipart/form-data" class="p-3 border rounded">
        @csrf
        <div class="form-group">
            <label for="ucapan">Ucapan</label>
            <textarea name="ucapan" id="ucapan" class="form-control" rows="4" required></textarea>
        </div>

        <div class="form-group">
            <label for="video">Video (opsional)</label>
            <input type="file" name="video" id="video" class="form-control-file" accept="video/*">
        </div>

        <div class="form-group">
            <label for="keterangan">Keterangan (opsional)</label>
            <input type="text" name="keterangan" id="keterangan" class="form-control">
        </div>

        <button type="submit" class="btn btn-success mt-2">
            <i class="fas fa-save mr-2"></i> Simpan
        </button>
    </form>
</div>


<div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>No</th>
                        <th>Id testimonial</th>
                        <th>Ucapan</th>
                        <th>Video</th>
                        <th>Keterangan</th>
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
                            <td>{{ $item->video }}</td>
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


