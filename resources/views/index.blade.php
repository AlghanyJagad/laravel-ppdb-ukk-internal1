@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#table').DataTable({
                "iDisplayLength": 50,
                pageLength: 10,
                bFilter: true,
                searching: true,
                deferRender: true,
                scrollY: 200,
                scrollCollapse: true,
                scroller: true
            });
        });

    </script>
@stop
@extends('layouts.app')

@section('content')
    <div class="row">

        <div class="col-lg-2">
            <a href="{{ route('registrasi.create') }}" class="btn btn-primary btn-rounded btn-fw mb-3"><i
                    class="fa fa-plus"></i>
                Tambah pendaftar</a>
            <a href="/siswas/cetak_pdf" class="btn btn-primary btn-fw" target="_blank">CETAK PDF</a>
        </div>
        <div class="row col-lg-12" style="margin-top: 20px;">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title pull-left">Data Siswa</h4>
                        <div class="table-responsive">
                            <table class="table table-striped" id="table">
                                <thead>
                                    <tr>
                                        <th>NoReg</th>
                                        <th>Nama</th>
                                        <th>JK</th>
                                        <th>Alamat</th>
                                        <th>Agama</th>
                                        <th>Asal Sekolah</th>
                                        <th>Minat Jurusan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datas as $data)
                                        <tr>
                                            <td>{{ $data->noreg }}</td>
                                            <td class="py-1">
                                                <a href="{{ route('registrasi.show', $data->id) }}">
                                                    {{ $data->nama }}
                                                </a>
                                            </td>
                                            <td>{{ $data->jk }}</td>
                                            <td>{{ $data->alamat }}</td>
                                            <td>{{ $data->agama }}</td>
                                            <td>{{ $data->asal_sekolah }}</td>
                                            <td>{{ $data->minat_jurusan }}</td>
                                            <td>
                                                <div class="btn-group dropdown">
                                                    <button type="button" class="btn btn-success dropdown-toggle btn-sm"
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Action
                                                    </button>
                                                    <div class="dropdown-menu" x-placement="bottom-start"
                                                        style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
                                                        <a class="dropdown-item"
                                                            href="{{ route('registrasi.edit', $data->id) }}"> Edit
                                                        </a>
                                                        <form action="{{ route('registrasi.destroy', $data->id) }}"
                                                            class="pull-left" method="post">
                                                            {{ csrf_field() }}
                                                            {{ method_field('delete') }}
                                                            <button class="dropdown-item"
                                                                onclick="return confirm('Anda yakin ingin menghapus data ini?')">
                                                                Delete
                                                            </button>
                                                        </form>

                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{-- {!! $datas->links() !!} --}}
                    </div>
                </div>
            </div>
        </div>
    @endsection
