@section('js')

<script type="text/javascript">
    $(document).ready(function() {
    $(".users").select2();
});

</script>

<script type="text/javascript">
    function readURL() {
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $(input).prev().attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(function () {
            $(".uploads").change(readURL)
            $("#f").submit(function(){
                // do ajax submit or just classic form submit
              //  alert("fake subminting")
                return false
            })
        })
</script>
@stop

@extends('layouts.app')

@section('content')

<form method="POST" action="{{ route('registrasi.update', $registrasi->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-12 d-flex align-items-stretch grid-margin">
            <div class="row flex-grow">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Registrasi</h4>

                            <div class="form-group{{ $errors->has('noreg') ? ' has-error' : '' }}">
                                <label for="noreg" class="col-md-4 control-label">Nomor Registrasi</label>
                                <div class="col-md-6">
                                    <input id="noreg" type="text" class="form-control" name="noreg" value="{{ $registrasi->noreg }}" required readonly="">
                                    @if ($errors->has('noreg'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('noreg') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                                <label for="nama" class="col-md-4 control-label">Nama</label>
                                <div class="col-md-6">
                                    <input id="nama" type="text" class="form-control" name="nama"
                                        value="{{ $registrasi->nama }}" required>
                                    @if ($errors->has('nama'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('jk') ? ' has-error' : '' }}">
                                <label for="jk" class="col-md-4 control-label">Jenis Kelamin</label>
                                <div class="col-md-6">
                                <select class="form-control" name="jk" required="">
                                    <option value=""></option>
                                    <option value="L" {{$registrasi->jk === "L" ? "selected" : ""}}>Laki-Laki</option>
                                    <option value="P" {{$registrasi->jk === "P" ? "selected" : ""}}>Perempuan</option>
                                </select>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
                                <label for="alamat" class="col-md-4 control-label">Alamat</label>
                                <div class="col-md-12">
                                    <textarea id="alamat" class="form-control" name="alamat" value="{{ $registrasi->alamat }}">{{ $registrasi->alamat }}</textarea>
                                    @if ($errors->has('alamat'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('alamat') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('agama') ? ' has-error' : '' }}">
                                <label for="agama" class="col-md-4 control-label">Agama</label>
                                <div class="col-md-6">
                                    <input id="agama" type="text" class="form-control" name="agama"
                                        value="{{ $registrasi->agama }}" required>
                                    @if ($errors->has('agama'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('agama') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('asal_sekolah') ? ' has-error' : '' }}">
                                <label for="asal_sekolah" class="col-md-4 control-label">Asal Sekolah</label>
                                <div class="col-md-6">
                                    <input id="asal_sekolah" type="text" class="form-control" name="asal_sekolah"
                                        value="{{ $registrasi->asal_sekolah }}" required>
                                    @if ($errors->has('asal_sekolah'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('asal_sekolah') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('minat_jurusan') ? ' has-error' : '' }}">
                                <label for="minat_jurusan" class="col-md-4 control-label">Minat Jurusan</label>
                                <div class="col-md-6">
                                <select class="form-control" name="minat_jurusan" required="">
                                    <option value=""></option>
                                    <option value="RPL"{{$registrasi->minat_jurusan === "RPL" ? "selected" : ""}}>Rekayasa Perangkat Lunak</option>
                                    <option value="TKJ"{{$registrasi->minat_jurusan === "TKJ" ? "selected" : ""}}>Teknik Komputer Jaringan</option>
                                    <option value="MMD"{{$registrasi->minat_jurusan === "MMD" ? "selected" : ""}}>Multimedia</option>
                                    <option value="OTKP"{{$registrasi->minat_jurusan === "OTKP" ? "selected" : ""}}>Otomatisasi Tata Kelola Perkantoran</option>
                                    <option value="TBG"{{$registrasi->minat_jurusan === "TBG" ? "selected" : ""}}>Tata Boga</option>
                                    <option value="HTL"{{$registrasi->minat_jurusan === "HTL" ? "selected" : ""}}>Perhotelan</option>
                                </select>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary" id="submit">
                                Update
                            </button>
                            <button type="reset" class="btn btn-danger">
                                Reset
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</form>
@endsection