@extends('screens.index')
@section('content')
<!-- Button trigger modal -->
<button type="button" class="btn btn-outline-danger text-center mt-5" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
Update CRUD Operation
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
  <h5 class="modal-title" id="staticBackdropLabel">CRUD ZONE</h5>
  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<form action="{{ route('crews.update','$crew->id') }}" method="POST"  enctype="multipart/form-data">
    @csrf
    @method('PUT')
<div class="my-3">
<input type="text" class="form-control"  placeholder="Product Name" name="name" id="" value="{{$crew->name}}">   
</div>
<div class="my-3">
<input type="text" class="form-control"  placeholder="Product Price" name="price" id="" value="{{$crew->price}}">  
</div>
<div class="my-3">
<input type="text" class="form-control"  placeholder="Product Description" name="description" id="" value="{{$crew->description}}">  
</div>
<div class="my-5">
<input type="file" class="form-control"  name="image" id="" required value="{{$crew->image}}">  
</div>
<button type="submit" class="btn btn-outline-danger">Add Record</button>
</form>
<div class="modal-footer">
<button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>    


@endsection