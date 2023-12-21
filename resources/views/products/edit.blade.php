@extends('layouts.app')

@section('main')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="d-flex justify-content-between py-3">
                <div class="h4">Employees</div>
                <div>
                    <a href="/" class="btn btn-primary">Back</a>
                </div>
            </div>

            <form method="POST" action="/products/{{$product->id}}/update" enctype="multipart/form-data" id="myForm">
                @csrf
                @method('PUT')
                <div class="card border-0 shadow-lg">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control"
                                placeholder="Enter Name" value="{{old('name',$product->name)}}">
                            @if($errors->has('name'))
                            <span class="text-danger">{{$errors->first('name')}}</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" name="email" id="email" placeholder="Enter Email"
                                class="form-control" value="{{ old('email',$product->email) }}">
                            @if($errors->has('email'))
                            <span class="text-danger">{{$errors->first('email')}}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="">Address</label>
                            <textarea name="textarea" id="textarea" rows="2"
                                class="form-control">{{old('textarea',$product->description)}}</textarea>
                            @if($errors->has('textarea'))
                            <span class="text-danger">{{$errors->first('textarea')}}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="">Image</label>
                            <input type="file" name="image" id="image" class="form-control">{{old('image',$product->image)}}
                            @if($errors->has('image'))
                            <span class="text-danger">{{$errors->first('image')}}</span>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-dark">Submit</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   $(document).ready(function () {
    var nameRegex = /^[a-zA-Z\s]+$/;
    var emailRegex = /\S+@\S+\.\S+/;

    $('#name').keyup(function () {
        var name = $(this).val().trim();
        $(".text-danger").remove();

        if (name.length < 3) {
            $(this).after('<span class="text-danger">Name should be at least 3 characters long.</span>');
        }
    });

    $('#email').keyup(function () {
        var email = $(this).val().trim();
        $(".text-danger").remove();

        if (!emailRegex.test(email)) {
            $(this).after('<span class="text-danger">Please enter a valid email.</span>');
        }
    });

    $('#textarea').keyup(function () {
        var address = $(this).val().trim();
        $(".text-danger").remove();

        if (address === '') {
            $(this).after('<span class="text-danger">Please enter an address.</span>');
        }
    });

    $('#myForm').submit(function (event) {
        event.preventDefault();
        $(".text-danger").remove();

        var name = $('#name').val().trim();
        var email = $('#email').val().trim();
        var address = $('#textarea').val().trim();
        var image = $('#image').prop('files')[0];

        if (!nameRegex.test(name)) {
            $('#name').after('<span class="text-danger">Please enter a valid name.</span>');
            return false;
        }

        if (name.length < 3) {
            $('#name').after('<span class="text-danger">Name should be at least 3 characters long.</span>');
            return false;
        }

        if (!emailRegex.test(email)) {
            $('#email').after('<span class="text-danger">Please enter a valid email.</span>');
            return false;
        }

        if (address === '') {
            $('#textarea').after('<span class="text-danger">Please enter an address.</span>');
            return false;
        }

        // Check if an image is selected
        if (image) {
            var allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
            if (!allowedTypes.includes(image.type)) {
                $('#image').after('<span class="text-danger">Please select a valid image type (JPEG, PNG, or GIF).</span>');
                return false;
            }

            var maxSize = 2 * 1024 * 1024; // 2MB in bytes
            if (image.size > maxSize) {
                $('#image').after('<span class="text-danger">Please select an image file smaller than 2MB.</span>');
                return false;
            }
        }

        // If all validations pass, submit the form
        this.submit();
    });
});

</script>
@endsection
