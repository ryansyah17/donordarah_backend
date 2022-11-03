@extends('index')
@section('content')
    <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="page-header">
                    <h3 class="page-title"> Input Data Stok Darah </h3>

                </div>
                <div class="row">
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('stokdarah.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputName1">Golongan Darah A</label>
                                        <input type="number" class="form-control" id="exampleInputName1"
                                            name="goldarah_a">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1">Golongan Darah B</label>
                                        <input type="number" class="form-control" id="exampleInputName1"
                                            name="goldarah_b">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1">Golongan Darah AB</label>
                                        <input type="number" class="form-control" id="exampleInputName1"
                                            name="goldarah_ab">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1">Golongan Darah O</label>
                                        <input type="number" class="form-control" id="exampleInputName1"
                                            name="goldarah_o">
                                    </div>
                                   

                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                    <a class="btn btn-dark" href="{{ route('stokdarah.index') }}"> Back</a>
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
