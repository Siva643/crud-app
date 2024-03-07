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
                        <h2>Laravel Crud Never Seen Before</h2>
                    </div>
                    <div class="add-button" style="float:right;">
                        <a class="btn btn-dark" href="{{ route('add.new.record') }}">Add New Record</a>
                    </div>
                </div>
                <div class="card-body">
                    @if(Session::has('message'))
                        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                    @endif
                    <table class="table table-bordered">
                       <thead>
                        <tr>
                            <th>ID</th>
                            <th>Profile Image</th>
                            <th>Details</th>
                            <th>Color</th>
                            <th>Date</th>
                            <th>About</th>
                            <th>Action</th>
                        </tr>
                       </thead>
                       <tbody>
                        @foreach($all_records as $key=>$record)
                        <tr>
                            <td>{{ $record->id }}</td>
                            <td><img src="{{ asset('images/profile/'.$record->image) }}" alt="Image" style="width:150px; height:120px;"></td>
                            <td>
                                <strong>Name:</strong> {{ $record->name }}<br>
                                <strong>Email:</strong> {{ $record->email }}<br>
                                <strong>Age:</strong> {{ $record->age }}<br>
                                <strong>Gender:</strong> {{ $record->gender }}<br>
                                <strong>Occupation:</strong> {{ $record->occupation }}<br>
                            </td>
                            <td>{{ $record->color }}</td>
                            <td>{{ \Carbon\Carbon::parse($record->date)->format('Y-m-d') }}</td>
                            <td>{{ $record->about }}</td>
                            <td>
                                <a class="btn btn-success btn-sm" href="{{ route('edit.record',$record->id) }}">Edit</a>
                                <a class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete?')" href="{{ route('delete.record',$record->id) }}">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                       </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {!! $all_records->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>