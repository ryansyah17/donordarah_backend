@extends('index')
@section('content')
    <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="page-header">
                    <h3 class="page-title"> Edit Data Pendonor </h3>

                </div>
                <div class="row">
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('pendonor.update',$pendonor->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="exampleSelectGender">User</label>
                                        <select class="form-control" id="user" aria-label="Default select example"
                                            name="id_users">
                                            <option selected>Select the user</option>
                                            @foreach ($member as $user)
                                                <option value="{{ $user->id }}" {{ $user->id == $pendonor->id_users ? 'selected' : '' }}>{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputName1">Name</label>
                                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Name"
                                            name="name" value="{{ $pendonor->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1">Tempat Lahir</label>
                                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Tempat Lahir"
                                            name="tempat_lahir" value="{{ $pendonor->tempat_lahir }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1">Tanggal Lahir</label>
                                        <input type="text" class="form-control" id="datepicker"
                                            name="tanggal_lahir" value="{{ $pendonor->tanggal_lahir }}">
                                            
                                    </div>
                                   
                                    <div class="form-group">
                                        <label for="exampleSelectGender">Jenis Kelamin</label>
                                        <select class="form-control" id="exampleSelectGender" name="jenis_kelamin">
                                            <option value="Laki-Laki"
                                                {{ $pendonor->jenis_kelamin == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki
                                            </option>
                                            <option value="Perempuan"
                                                {{ $pendonor->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputCity1">Alamat</label>
                                        <textarea name="alamat" class="form-control" id="exampleInputCity1" cols="30" rows="10">{{ $pendonor->alamat}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1">No Handphone</label>
                                        <input type="number" class="form-control" id="exampleInputName1" name="nohp" value="{{ $pendonor->nohp }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleSelectGender">Golongan Darah</label>
                                        <select class="form-control" id="exampleSelectGender" name="goldarah">
                                            <option>A</option>
                                            <option>B</option>
                                            <option>AB</option>
                                            <option>O</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1">Berat Badan</label>
                                        <input type="number" class="form-control" id="exampleInputName1" name="beratbadan" value="{{ $pendonor->beratbadan }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1">Tekanan Darah</label>
                                        <input type="number" class="form-control" id="exampleInputName1"
                                            name="tekanandarah" value="{{ $pendonor->tekanandarah }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1">Kadar HB</label>
                                        <input type="number" class="form-control" id="exampleInputName1" name="kadarhb" value="{{ $pendonor->kadarhb }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1">Tanggal Donor</label>
                                        <input type="text" class="form-control" id="datepicker1"
                                            name="tanggal_donor" value="{{ $pendonor->tanggal_donor }}">
                                            
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                    <a class="btn btn-dark" href="{{ route('pendonor.index') }}"> Back</a>
                                </form>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:../../partials/_footer.html -->

            <!-- partial -->
        </div>
    </div>
@endsection
