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
                        <h2 class="text-left">Edit Record</h2>
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

                    <form action="{{ route('update.record',$record->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label class="mb-1">Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ $record->name }}">
                                </div>
                                <div class="mb-3">
                                    <label class="mb-1">Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ $record->email }}">
                                </div>
                                <div class="mb-3">
                                    <label class="mb-1">Age</label>
                                    <input type="number" name="age" class="form-control" value="{{ $record->age }}">
                                </div>
                                <div class="mb-3">
                                    <label class="mb-1">About</label>
                                    <textarea name="about" rows="5" class="form-control">{{ $record->about }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-5 offset-md-1">
                                <div class="form-check-inline mb-3">
                                    <label class="form-check-label mb-1">Gender</label> <br>
                                    <input class="form-check-input" type="radio" name="gender" value="Male" @if($record->gender=='Male') checked @endif> Male
                                    <input class="form-check-input" type="radio" name="gender" value="Female" @if($record->gender=='Female') checked @endif> Female
                                </div>
                                <div class="mb-3">
                                    <label class="mb-1">Image</label>
                                    <img src="{{ asset('images/profile/'.$record->image) }}" style="width:100px;margin-bottom:3px">
                                    <input type="file" name="image" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="mb-1">Date</label>
                                    <input type="date" name="date" class="form-control" value="{{ \Carbon\Carbon::parse($record->date)->format('Y-m-d') }}">
                                </div>
                                <div class="mb-3">
                                    <label class="mb-1">Occupation</label>
                                    <select name="occupation" class="form-control">
                                        <option value="">Select</option>
                                        <option value="Engineer" @if($record->occupation=='Engineer') selected @endif>{{ __('Engineer') }}</option>
                                        <option value="Doctor" @if($record->occupation=='Doctor') selected @endif>{{ __('Doctor') }}</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="mb-1">Color</label>
                                    <input type="color" name="color" class="form-control" value="{{ $record->color }}">
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" name="check_me" class="form-check-input" value="1" @if($record->check_me==1) checked @endif>
                                    <label class="form-check-label">Check me</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
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