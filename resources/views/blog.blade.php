@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Blog BNSP</div>

                <div class="card-body">
                  Selamat datang di blog kita !<br/>

                  <table class="table table-striped">
                    <thead>

                    <tr>
                      <th>No</th>
                      <th>Judul</th>
                      <th>Deskripsi</th>
                      <th>Action</th>
                    </tr>

                  </thead>
                    @foreach($blogs as $key => $blog)
                    <tr>
                      <td>{{ $key += 1 }}</td>
                      <td>{{ $blog->title }}</td>
                      <td>{{ $blog->description }}</td>
                      <td>
                        <a href="" class="btn btn-success">Edit</a>
                        <a href="" class="btn btn-danger">Delete</a>
                      </td>
                    </tr>
                    @endforeach
                  </table>




                </div>
            </div>
        </div>
    </div>
</div>
@endsection
