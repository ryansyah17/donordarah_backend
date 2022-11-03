@extends('index')
@section('content')
    <div class="container-fluid page-body-wrapper">
        
        <div class="main-panel">
            <div class="content-wrapper">
                
                <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Daftar Pendonor</h4>
                                <a class="btn btn-success" href="{{ route('pendonor.create') }}"> Tambah</a>
                                </p>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th> No </th>
                                                <th> Nama </th>
                                                <th> Jenis Kelamin </th>
                                                <th> Kadar HB </th>
                                                <th> Gol.Darah </th>
                                                <th> Aksi </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pendonor as $m)
                                                <tr>

                                                    <td>{{ ++$i }}</td>
                                                    <td>{{ $m->name }}</td>
                                                    <td >{{ $m->jenis_kelamin }}</td>
                                                    <td >{{ $m->kadarhb }}</td>
                                                    <td>{{ $m->goldarah }}</td>
                                                    <td>
                                                        <form action="{{ route('pendonor.destroy', $m->id) }}" method="POST">
                                                            <a class="btn btn-warning" href="{{ route('pendonor.edit', $m->id) }}"
                                                                title="Ubah Data Mahasiswa">Edit</a>
                            
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger"
                                                                onclick="return confirm('Are you sure you want to delete')">Hapus</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:../../partials/_footer.html -->

            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
@endsection
