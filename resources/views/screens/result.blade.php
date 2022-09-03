@extends('screens.index')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4> Fetch data  </h4>
                </div>
                <div class="card-body">

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Description</th>
                                <th>Image</th>
                         
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($crews as $crew)
                            <tr>
                                <td>{{$crew->id }}</td>
                                <td>{{$crew->name }}</td>
                                <td>{{$crew->price }}</td>
                                <td>{{$crew->description}}</td>
                                <td> <img src="{{Storage::url($crew->image) }}" height="75" width="75" alt="" /></td>
                                <td><form action="{{route('crews.destroy',$crew->id)}}" method="POST">
                                <a class="btn btn-primary" href="{{route('crews.edit',$crew->id) }}">Update</a>
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger" type="submit">Delete</button>
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