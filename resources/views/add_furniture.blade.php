@extends(Auth::check() ? auth()->user()->role == "User" ? 'user.template' : 'admin.template' : 'guest.template')

@section('body')

    <div class="container-fluid col-md-8 mt-4">
        <h1 class="fs-2 text-center mb-8" style="color: {{PRIMARY_COLOR}};">Add Furniture</h1>
        <form action="/insert-furniture" method="POST" enctype="multipart/form-data" class="text-center">
            {{csrf_field()}}
            <div class="form-group row mt-4">
                <label for="inputName" class="col-sm-4 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" name="name" id="inputName" class="form-control" placeholder="Furniture Name">
                </div>
            </div>
            <div class="form-group row mt-4">
                <label for="inputPrice" class="col-sm-4 col-form-label">Price</label>
                <div class="col-sm-6">
                    <input type="number" name="price" id="inputPrice" class="form-control" placeholder="Furniture Price">
                </div>
            </div>
            <div class="form-group row mt-4">
                <label for="inputType" class="col-sm-4 col-form-label">Type</label>
                <div class="col-sm-6">
                    <select class="form-control form-control-md" id="inputType" name="type">
                        <option disabled selected>Furniture Type</option>
                        @foreach (FURNITURE_TYPE as $type)
                            <option value="{{$type}}" >{{$type}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row mt-4">
                <label for="inputColor" class="col-sm-4 col-form-label">Color</label>
                <div class="col-sm-6">
                    <select class="form-control form-control-md" id="inputColor" name="color">
                        <option disabled selected>Furniture Color</option>
                        @foreach (FURNITURE_COLOR as $color)
                            <option value="{{$color}}" >{{$color}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row mt-4">
                <label for="inputImage" class="col-sm-4 col-form-label">Image</label>
                <div class="col-sm-6">
                    <input type="file" name="image" id="inputImage" class="form-control">
                </div>
            </div>
            <div class="form-group row mt-4">
                <div class="col-sm-10 text-center">
                    <button type="submit" class="btn btn-primary">Add Furniture</button>
                </div>
            </div>
        </form>
        <div class="text-center mt-8">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <i class="text-danger">{{$error}}</i>
                    <br>
                @endforeach
            @endif
        </div>
    </div>

@endsection
