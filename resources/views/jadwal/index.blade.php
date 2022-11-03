@extends('index')
@section('content')
    <div class="container-fluid page-body-wrapper">
        
        <div class="main-panel">
            <div class="content-wrapper">
                
                <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Daftar Jadwal Donor</h4>
                                <a class="btn btn-success" href="{{ route('jadwal.create') }}"> Tambah</a>
                                </p>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th> No </th>
                                                <th> Nama Stand </th>
                                                <th> Waktu </th>
                                                <th> Latitude </th>
                                                <th> Longitude </th>
                                                <th> Lokasi </th>
                                                <th> Aksi </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($jadwal as $m)
                                                <tr>

                                                    <td>{{ ++$i }}</td>
                                                    <td>{{ $m->name_stand }}</td>
                                                    <td >{{ $m->waktu }}</td>
                                                    <td >{{ $m->latitude }}</td>
                                                    <td>{{ $m->longitude }}</td>
                                                    <td>{{ $m->location }}</td>
                                                    <td>
                                                        <form action="{{ route('jadwal.destroy', $m->id) }}" method="POST">
                                                            <a class="btn btn-warning" href="{{ route('jadwal.edit', $m->id) }}"
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
