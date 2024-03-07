<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Laravel crud never seen before</title>
</head>
<body>
<div class="container">
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="title" style="float:left;">
                        <h2 class="text-left">Add New Record</h2>
                    </div>
                    <div class="add-button" style="float:right;">
                        <a class="btn btn-dark" href="{{ route('all.records') }}">All Records</a>
                    </div>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(Session::has('message'))
                        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                    @endif

                    <form action="{{ route('store.new.record') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label class="mb-1">Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                </div>
                                <div class="mb-3">
                                    <label class="mb-1">Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                                </div>
                                <div class="mb-3">
                                    <label class="mb-1">Age</label>
                                    <input type="number" name="age" class="form-control" value="{{ old('age') }}">
                                </div>
                                <div class="mb-3">
                                    <label class="mb-1">About</label>
                                    <textarea name="about" rows="5" class="form-control">{{ old('about') }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-5 offset-md-1">
                                <div class="form-check-inline mb-3">
                                    <label class="form-check-label mb-1">Gender</label> <br>
                                    <input class="form-check-input" type="radio" name="gender" value="Male"> Male
                                    <input class="form-check-input" type="radio" name="gender" value="Female"> Female
                                </div>
                                <div class="mb-3">
                                    <label class="mb-1">Image</label>
                                    <input type="file" name="image" class="form-control" value="{{ old('image') }}">
                                </div>
                                <div class="mb-3">
                                    <label class="mb-1">Date</label>
                                    <input type="date" name="date" class="form-control" value="{{ old('date') }}">
                                </div>
                                <div class="mb-3">Occupation</label>
                                    <select name="occupation" class="form-control">
                                        <option value="">Select</option>
                                        <option value="Engineer">Engineer</option>
                                        <option value="Doctor">Doctor</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="mb-1">Color</label>
                                    <input type="color" name="color" class="form-control" value="{{ old('color') }}">
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" name="check_me" class="form-check-input" value="1">
                                    <label class="form-check-label">Check me</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>