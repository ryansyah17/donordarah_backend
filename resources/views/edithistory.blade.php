@extends('index')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      
      <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Edit History</h4>
              <form action="{{ url('/edithistory/'. $history->id) }}" class="forms-sample"  method="POST" >
            
                @csrf
                @method('PUT')
                <div class="form-group">
                  <label>Donorke</label>
                  <input type="text" class="form-control"  placeholder="Donorke" value="{{ $history->donorke }}">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Lokasi</label>
                  <input type="text" class="form-control"  placeholder="Lokasi" value="{{ $history->lokasi }}">
                </div>
                <div class="form-group">
                  <label >Tanggal Donor</label>
                  <input type="text" class="form-control"  placeholder="Tanggal Donor" value="{{ $history->tanggal_donor }}">
                </div>
                <button type="submit" class="btn btn-primary mr-2" name="proses">Submit</button>
                {{-- <a href="{{ url('/history') }}" class="btn btn-success">Batal</a> --}}
                {{-- <button type="submit" class="btn btn-primary mr-2" value="save" >submit</button> --}}
               
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
  @endsection