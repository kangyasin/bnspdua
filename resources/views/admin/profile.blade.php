@extends('layouts.app')

@section('content')
<div class="container">
@if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
    <div class="row justify-content-center">
        <div class="right">
    <a href="{{url('admin/add_profile')}}" class="btn btn-primary">Add New Profile</a><br/><br/>
</div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Profile</div>
                <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col" colspan="2">Action</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach($profile as $key => $profiles)
                        <tr>
                            <th scope="row">{{ $key += 1 }}</th>
                            <td>{{ $profiles->nama }}</td>
                            <td>{{ $profiles->email }}</td>
                            <td><a href="{{url('admin/edit_profile', $profiles->id)}}" class="btn btn-success">Edit</a></td>
                            <td>
                            <form action="{{url('adminprofile',$profiles->id)}}" method="post">
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                <button onclick="return confirm('Are you sure?')" class="btn btn-danger" type="submit">Delete</button>
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
@endsection
