@extends('layouts.app')
@section('content')
<div class="container">
    <h3>Summary Total per Request</h3>
    <table class="table">
        <thead><tr><th>Request</th><th>Total</th></tr></thead>
        <tbody>
        @foreach($results as $r)
            <tr>
                <td>#{{ $r->id }} - {{ $r->kode }}</td>
                <td class="text-end">Rp {{ number_format($r->total_nilai,0,',','.') }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $results->links() }}
</div>
@endsection
