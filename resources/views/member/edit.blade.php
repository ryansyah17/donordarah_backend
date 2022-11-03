@extends('index')
@section('content')
    <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="page-header">
                    <h3 class="page-title"> Edit Data Member </h3>

                </div>
                <div class="row">
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('member.update',$member->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="exampleInputName1">Name</label>
                                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Name"
                                            name="name" value="{{ $member->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail3">Email address</label>
                                        <input type="email" class="form-control" id="exampleInputEmail3"
                                            placeholder="Email" name="email" value="{{ $member->email }}">
                                    </div>
                                    {{-- <div class="form-group">
                                        <label for="exampleInputPassword4">Password</label>
                                        <input type="password" class="form-control" id="exampleInputPassword4"
                                            placeholder="Password" name="password">
                                    </div> --}}
                                    <div class="form-group">
                                        <label for="exampleSelectGender">Jenis Kelamin</label>
                                        <select class="form-control" id="exampleSelectGender" name="jenis_kelamin">
                                            <option value="Laki-Laki"
                                                {{ $member->jenis_kelamin == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki
                                            </option>
                                            <option value="Perempuan"
                                                {{ $member->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan
                                            </option>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleSelectGender">Golongan Darah</label>
                                        <select class="form-control" id="exampleSelectGender" name="goldarah"
                                            value="{{ $member->goldarah }}">
                                            <option>A</option>
                                            <option>B</option>
                                            <option>AB</option>
                                            <option>O</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputCity1">Alamat</label>
                                        <input type="text" class="form-control" id="exampleInputCity1"
                                            placeholder="Location" name="alamat" value="{{ $member->alamat }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleSelectGender">Role</label>
                                        <select class="form-control" id="exampleSelectGender" name="roles">
                                            <option value="Admin" {{ $member->roles == 'Admin' ? 'selected' : '' }}>Admin
                                            </option>
                                            <option value="User" {{ $member->roles == 'User' ? 'selected' : '' }}>User
                                            </option>
                                            <option value="Superadmin"
                                                {{ $member->roles == 'Superadmin' ? 'selected' : '' }}>Superadmin</option>
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                    <a class="btn btn-dark" href="{{ route('member.index') }}"> Back</a>
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
