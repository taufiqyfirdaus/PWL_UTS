@extends('layouts.template')
@section('content')
<div style="margin-left: 290px;">
    <h1>Selamat Datang</h1>
</div>

@push('custom_js')
<script>
    alert('Selamat datang')
</script>
@endpush
@endsection
