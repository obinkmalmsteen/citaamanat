@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<style>
.table-responsive { border-radius:10px; }
.badge-status-pending{background:#f0ad4e;color:#fff}
.badge-status-approved{background:#28a745;color:#fff}
.badge-status-rejected{background:#dc3545;color:#fff}
</style>
@endsection

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Semua Item Pengadaan</h3>
        <div>
            <a href="{{ route('pengadaan.items.export.excel', request()->all()) }}" class="btn btn-success btn-sm">Export Excel</a>
            <a href="{{ route('pengadaan.items.export.pdf', request()->all()) }}" class="btn btn-secondary btn-sm">Export PDF</a>
        </div>
    </div>

    <form method="GET" class="row g-2 mb-3">
        <div class="col-auto">
            <input type="date" name="date_from" class="form-control form-control-sm" value="{{ request('date_from') }}">
        </div>
        <div class="col-auto">
            <input type="date" name="date_to" class="form-control form-control-sm" value="{{ request('date_to') }}">
        </div>
        <div class="col-auto">
            <select name="status" class="form-select form-select-sm">
                <option value="">Semua Status</option>
                <option value="pending" {{ request('status')=='pending'?'selected':'' }}>Pending</option>
                <option value="approved" {{ request('status')=='approved'?'selected':'' }}>Approved</option>
                <option value="rejected" {{ request('status')=='rejected'?'selected':'' }}>Rejected</option>
            </select>
        </div>
        <div class="col-auto">
            <select name="cabang_id" class="form-select form-select-sm">
                <option value="">Semua Cabang</option>
                @foreach($cabangs as $cabang)
                    <option value="{{ $cabang->id }}" {{ request('cabang_id') == $cabang->id ? 'selected' : '' }}>
                        {{ $cabang->nama_cabang }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-auto">
            <input type="text" name="q" class="form-control form-control-sm" placeholder="Cari nama barang..." value="{{ request('q') }}">
        </div>
        <div class="col-auto">
            <select name="per_page" onchange="this.form.submit()" class="form-select form-select-sm">
                <option value="25" {{ $perPage==25?'selected':'' }}>25</option>
                <option value="50" {{ $perPage==50?'selected':'' }}>50</option>
                <option value="100" {{ $perPage==100?'selected':'' }}>100</option>
            </select>
        </div>
        <div class="col-auto">
            <button class="btn btn-primary btn-sm">Filter</button>
        </div>
        <div class="col-auto">
            <a href="{{ route('pengadaan.items.index') }}" class="btn btn-outline-secondary btn-sm">Reset</a>
        </div>
    </form>

    <div class="mb-2">
        <label class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="useDatatables"> Use DataTables AJAX
        </label>
    </div>

 <style>
nav[role="navigation"] svg {
    width: 16px;
    height: 16px;
    flex-shrink: 0;
}


 </style>
    <div class="table-responsive shadow-sm rounded bg-white">
        <table id="itemsTable" class="table table-hover table-striped align-middle mb-0" style="width:100%">
            <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Cabang</th>
                <th>User</th>
                <th>Barang</th>
                <th class="text-center">Qty</th>
                <th class="text-end">Harga</th>
                <th class="text-end">Total</th>
                <th>Status</th>
                <th>Tanggal</th>
            </tr>
            </thead>
            <tbody>
            @foreach($items as $item)
                <tr>
                     <!-- NO URUT -->
    <td>
        {{ $loop->iteration + ($items->currentPage() - 1) * $items->perPage() }}
    </td>
                    <td>{{ $item->request->kode ?? '-' }}</td>
                    <td>{{ $item->request->cabang->nama_cabang ?? '-' }}</td>
                    <td>{{ $item->request->user->nama ?? '-' }}</td>
                    <td>{{ $item->barang->nama_barang ?? '-' }}</td>
                    <td class="text-center">{{ $item->qty }}</td>
                    <td class="text-end">{{ number_format($item->harga,0,',','.') }}</td>
                    <td class="text-end">{{ number_format($item->qty * $item->harga,0,',','.') }}</td>
                    <td>
                        @php $s = $item->request->status ?? 'pending'; @endphp
                        @if($s=='approved')
                            <span class="badge badge-status-approved text-success">Approved</span>
                        @elseif($s=='rejected')
                            <span class="badge badge-status-rejected text-danger">Rejected</span>
                        @else
                            <span class="badge badge-status-pending text-warning ">Pending</span>
                        @endif
                    </td>
                    <td>{{ optional($item->request->created_at)->format('Y-m-d') }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $items->links() }}
    </div>
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
$(function(){
    var table = null;

    function initDatatable() {
        if (table) { table.destroy(); $('#itemsTable tbody').empty(); }
        $('#itemsTable').DataTable({
            processing: true,
            serverSide: false, // we're returning all data limited by controller
            ajax: {
                url: "{{ route('pengadaan.items.data') }}",
                data: function(d){
                    d.date_from = $('input[name=date_from]').val();
                    d.date_to = $('input[name=date_to]').val();
                    d.status = $('select[name=status]').val();
                    d.cabang_id = $('select[name=cabang_id]').val();
                    d.q = $('input[name=q]').val();
                }
            },
            columns: [
                { data: 'request_id' },
                { data: 'request_code' },
                { data: 'cabang' },
                { data: 'user_name' },
                { data: 'nama_barang' },
                { data: 'qty', className: 'text-center' },
                { data: 'harga', className: 'text-end' },
                { data: 'total', className: 'text-end' },
                { data: 'status', render: function(d){
                    if(d=='approved') return '<span class="badge badge-status-approved">Approved</span>';
                    if(d=='rejected') return '<span class="badge badge-status-rejected">Rejected</span>';
                    return '<span class="badge badge-status-pending">Pending</span>';
                }},
                { data: 'created_at' }
            ],
            pageLength: 25,
            lengthChange: false,
            responsive: true
        });
    }

    $('#useDatatables').on('change', function(){
        if ($(this).is(':checked')) {
            initDatatable();
        } else {
            if (table) { table.destroy(); table = null; location.reload(); }
        }
    });
});
</script>


@endsection
