@extends('index')
@section('content')
    <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="page-header">
                    <h3 class="page-title"> Input Data Notifikasi </h3>

                </div>
                <div class="row">
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('notification.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputName1">Name</label>
                                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Name"
                                            name="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1">Umur</label>
                                        <input type="number" class="form-control" id="exampleInputName1" name="umur">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputCity1">Alamat</label>
                                        <textarea name="alamat" class="form-control" id="exampleInputCity1" cols="30" rows="10"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1">Kebutuhan Darah</label>
                                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Kebutuhan Darah"
                                            name="kebutuhan_darah">
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
                                        <label for="exampleInputName1">Resus Darah</label>
                                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Resus Darah"
                                            name="resus_darah">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1">Kontak</label>
                                        <input type="number" class="form-control" id="exampleInputName1" name="kontak">
                                    </div>

                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                    <a class="btn btn-dark" href="{{ route('notification.index') }}"> Back</a>
                                </form>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
            
        </div>
    </div>
@endsection
