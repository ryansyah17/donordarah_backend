@extends('index')
@section('content')
    <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="page-header">
                    <h3 class="page-title"> Edit Data Stok Darah </h3>

                </div>
                <div class="row">
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('stokdarah.update',$stokdarah->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="exampleInputName1">Golongan Darah A</label>
                                        <input type="number" class="form-control" id="exampleInputName1"
                                            name="goldarah_a" value="{{ $stokdarah->goldarah_a }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1">Golongan Darah B</label>
                                        <input type="number" class="form-control" id="exampleInputName1"
                                            name="goldarah_b" value="{{ $stokdarah->goldarah_b }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1">Golongan Darah AB</label>
                                        <input type="number" class="form-control" id="exampleInputName1"
                                            name="goldarah_ab" value="{{ $stokdarah->goldarah_ab }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1">Golongan Darah O</label>
                                        <input type="number" class="form-control" id="exampleInputName1"
                                            name="goldarah_o" value="{{ $stokdarah->goldarah_o}}">
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                    <a class="btn btn-dark" href="{{ route('stokdarah.index') }}"> Back</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
