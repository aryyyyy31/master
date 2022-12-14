@extends('layouts.master')

@section('title')
- Transaksi
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Transaksi</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('transaksis.create') }}"> Create</a>
        </div>
    </div>
</div>
<br>

<table id="example" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Date</th>
            <th>Code</th>
            <th>Name</th>
            <th>Desc</th>
            <th>Debit</th>
            <th>Credit</th>
            <th>Action</th>
        </tr>
    </thead>
    @foreach ($transaksis as $transaksi)
    <tbody>
    </tbody>
    @endforeach
</table>
@endsection

@push('scripts')
<script type="text/javascript">
$(function() {
    var table = $('#example').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('transaksis.data') }}",
        columns: [{
                data: "DT_RowIndex",
                name: "DT_RowIndex",
                orderable: true,
                searchable: false
            },
            {
                data: "dates",
                name: "dates"
            },
            {
                data: "code",
                name: "code"
            },
            {
                data: "name",
                name: "name"
            },
            {
                data: "desc",
                name: "desc"
            },
            {
                data: "debit",
                name: "debit"
            },
            {
                data: "credit",
                name: "credit"
            },
            {
                data: "action",
                name: "action",
                orderable: false,
                searchable: false
            },
        ]
    });

    $('#example').on('click', '.delete[data-remote]', function(e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var url = $(this).data('remote');
        // confirm then
        $.ajax({
            url: url,
            type: 'DELETE',
            dataType: 'json',
            data: {
                method: '_DELETE',
                submit: true
            }
        }).always(function(data) {
            $('#example').DataTable().draw(false);
        });
    });
});
</script>
@endpush