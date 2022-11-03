@extends('index')
@section('content')
    <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="page-header">
                    <h3 class="page-title"> Input Data Member </h3>

                </div>
                <div class="row">
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('member.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputName1">Name</label>
                                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Name"
                                            name="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail3">Email address</label>
                                        <input type="email" class="form-control" id="exampleInputEmail3"
                                            placeholder="Email" name="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword4">Password</label>
                                        <input type="password" class="form-control" id="exampleInputPassword4"
                                            placeholder="Password" name="password">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleSelectGender">Jenis Kelamin</label>
                                        <select class="form-control" id="exampleSelectGender" name="jenis_kelamin">
                                            <option>Laki-Laki</option>
                                            <option>Perempuan</option>
                                        </select>
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
                                        <label for="exampleInputCity1">Alamat</label>
                                        <input type="text" class="form-control" id="exampleInputCity1"
                                            placeholder="Location" name="alamat">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleSelectGender">Role</label>
                                        <select class="form-control" id="exampleSelectGender" name="roles">
                                            <option>Admin</option>
                                            <option>User</option>
                                            <option>Superadmin</option>
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
