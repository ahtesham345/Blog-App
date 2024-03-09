@extends('layouts.master')
@section('title','Edit-Post')
@section('content')
<div class="container-fluid px-4">
<div class="card mt-4">
        <div class="card-header">
            <h4>Edit Post
                <a href="{{url('admin/users')}}" class="btn btn-danger float-end text-light">Back</a>
            </h4>
        </div>
            <div class="card-body">
                @if ($errors->any()){
                    <div class="text text-danger">
                        @foreach ($errors->all() as $error )
                            <div>{{$error}}</div>
                        @endforeach
                    </div>
                }

                @endif
                    <div class="mb-3">
                        <label for="">Name:</label>
                        <p class="form-control">{{$user->name}}</p>
                    </div>
                    <div class="mb-3">
                        <label for="">Email:</label>
                        <p class="form-control">{{$user->email}}</p>
                    </div>
                    <div class="mb-3">
                        <label for="">Name:</label>
                        <p class="form-control">{{$user->created_at->format('d/m/y')}}</p>
                    </div>
                    <form action="{{url('admin/update-user/'.$user->id)}}" method="POST">
                        @csrf
                        @method('PUT');
                    <div class="mb-3">
                        <label for="">Role as:</label>
                        <select name="role_as" id="" class="form-control">
                            <option value="0"{{$user->role_as == '0' ? 'selected':''}}>User</option>
                            <option value="1" {{$user->role_as == '1' ? 'selected':''}}>Admin</option>
                            <option value="2" {{$user->role_as == '2' ? 'selected':''}}>Blogger</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update user role</button>
                    </form>


            </div>
    </div>
</div>
@endsection
