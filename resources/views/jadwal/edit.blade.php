@extends('index')
@section('content')
    <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="page-header">
                    <h3 class="page-title"> Edit Jadwal Donor </h3>

                </div>
                <div class="row">
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('jadwal.update', $jadwal->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="exampleInputName1">Nama Stand</label>
                                        <input type="text" class="form-control" id="exampleInputName1"
                                            placeholder="Nama Stand" name="name_stand" value="{{ $jadwal->name_stand }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1">Waktu</label>
                                        <input type="text" class="form-control" id="exampleInputName1"
                                            placeholder="Waktu Donor" name="waktu" value="{{ $jadwal->waktu }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputName1">Latitude</label>
                                        <input type="text" class="form-control" id="exampleInputName1"
                                            placeholder="Latitude" name="latitude" value="{{ $jadwal->latitude }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputName1">Longitude</label>
                                        <input type="text" class="form-control" id="exampleInputName1"
                                            placeholder="Longitude" name="longitude" value="{{ $jadwal->longitude }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1">Gambar</label>
                                        <input type="text" class="form-control" id="exampleInputName1"
                                            placeholder="Input Url picture" name="picture" value="{{ $jadwal->picture }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputName1">Lokasi</label>
                                        <input type="text" class="form-control" id="exampleInputName1"
                                            placeholder="Lokasi" name="location" value="{{ $jadwal->location }}">
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                    <a class="btn btn-dark" href="{{ route('jadwal.index') }}"> Back</a>
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
