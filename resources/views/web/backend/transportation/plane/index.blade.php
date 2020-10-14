@extends('web.backend.layouts.admin')

@section('content')
   <!-- Begin Page Content -->
   <div class="container-fluid">

   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
     <h1 class="h3 mb-0 text-gray-800">Plane</h1>
     <a href="{{route('plane.create')}}" class="btn btn-primary shadow-sm">
       <i class="fas fa-plus fa-sm text-white-50"></i> Add Plane
     </a>
   </div>

   <div class="row">
     <div class="card-body">
       <div class="table-responsive">
         <table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
              <tr class="text-center">
                <th>ID</th>
                <th>Id Maskapai</th>
                <th>gambar</th>
                <th>Model</th>
                <th>Jumlah Kursi</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse($planes as $plane)
                <tr class="text-center">
                  <td>{{$plane->id}}</td>
                  <td>{{$plane->id_maskapai}}</td>
                  <td><img src="{{Storage::url($plane->gambar)}}" alt="" width="150px" class="img-thumbnail img-fluid"></td>
                  <td>{{$plane->model}}</td>
                  <td>{{$plane->jumlah_kursi}}</td>
                  <td>
                    <a href="{{route('plane.edit', $plane->id)}}" class="btn btn-info">
                      <i class="fa fa-pencil-alt"></i>
                    </a>
                    <form action="{{route('plane.destroy', $plane->id)}}" method="post" class="d-inline">
                      @csrf
                      @method('delete')
                      
                      <button class="btn btn-danger">
                        <i class="fa fa-trash"></i>
                      </button>
                    </form>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="7" class="text-center">
                    Data Kosong
                  </td>
                </tr>
              @endforelse
            </tbody>
         </table>
       </div>
     </div>
   </div>
   

   </div>
   <!-- /.container-fluid -->
@endsection