@extends('layouts.app')

@section('main')
<div class="container">
    <div class="text-right">
        <a href="products/create" class="btn btn-dark mt-2">New product</a>
    </div>
    <div class="card border-0 shadow-lg">
        <div class="card-body">
            <table class="table table-striped">
                <tr>
                    <th width="50">ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th width="230">Action</th>
                </tr>

                @if($products->isNotEmpty())
                @foreach($products as $product)
                <tr valign="middle">
                    <td>{{$loop->iteration}}</td>
                    <td>
                        <img src="products/{{$product->image}}" alt="image" class="rounded-circle" width="40" height="40">
                    </td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->email }}</td>
                    <td>{{ $product->description }}</td>
                    <td>
                        <a href="products/{{$product->id}}/edit" class="btn btn-dark btn-small">Edit</a>
                        {{-- Form for delete action --}}
                        <form action="products/{{$product->id}}/delete" method="POST" class="d-inline" id="deleteForm{{$product->id}}">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger btn-small" onclick="confirmDelete({{$product->id}})">Delete</button>
                        </form>
                        <a href="products/{{$product->id}}/show" class="btn btn-primary btn-small">Show</a>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="6">Record Not Found</td>
                </tr>
                @endif

            </table>
        </div>
    </div>

    <div class="mt-3">
        {{-- {{ $products->links() }} --}}
    </div>
</div>

<script>
    function confirmDelete(id) {
        if (confirm("Are you sure you want to delete?")) {
            document.getElementById('deleteForm'+id).submit();
        }
    }
</script>
@endsection
