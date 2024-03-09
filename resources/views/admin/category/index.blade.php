@extends('layouts.master')
@section('title','Category')
@section('content')
<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <form action="{{url('admin/delete-category/')}}" method="post">
            @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Category With it posts</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="category_delete_id" id="category_id">
        <h6>Do You Want To Delete Category With Its Posts ?</h6>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger"> Yes,Delete</button>
      </div>
      </form>
    </div>
  </div>
</div>


<style>
    /* Add this style to create a smooth fade-out effect */
    .alert-success {
        transition: opacity 1s ease;
    }
</style>
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h1 class="mt-4">View Category <a href="{{url('admin/add-category')}}" class="btn btn-primary btn-sm float-end">Add Category</a></h1>
        </div>
        <div class="card-body">
            @if(session('messege'))
            <div class="alert alert-success" id="successMessage">
                {{ session('messege') }}
            </div>
            @endif
            <div class="table-responsive">
            <table id="myDataTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Category Name</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category as $item )
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td><img src="{{asset('uploads/category/'.$item->image)}}" alt="" height="50px" width="50px"></td>
                        <td>{{$item->status == '1' ? 'Hidden':'Shown'}}</td>
                        <td>
                            <a href="{{url('admin/edit-category/'.$item->id)}}" class="btn btn-success text-light">Edit</a>
                            <!-- <a href="{{url('admin/delete-category/'.$item->id)}}" class="btn btn-danger text-light">Delete</a> -->
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger deletecategorybtn" value="{{$item->id}}">Delete</button>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
@endsection
<script>
    // Hide the success message after 5 seconds (5000 milliseconds)
    setTimeout(function() {
        var successMessage = document.getElementById('successMessage');
        if (successMessage) {
            successMessage.style.transition = 'opacity 1s ease'; // Set transition properties
            successMessage.style.opacity = '0'; // Hide the element smoothly
        }
    }, 5000);
</script>
@section('scripts')
<script>
    $(document).ready(function (){
        // $('.deletecategorybtn').click(function (e){
            $(document).on('click','.deletecategorybtn',function(e){
            e.preventDefault();

            var category_id = $(this).val();
            $('#category_id').val( category_id);
            $('#deleteModal').modal('show');
        });
    });
</script>
@endsection
