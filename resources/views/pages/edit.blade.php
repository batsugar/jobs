@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Edit Job
                            <a href="{{ url('/jobs') }}" class="btn btn-success float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('jobs.update', $job->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="company">Company:</label>
                                <input type="text" id="company" name="company" class="form-control" value="{{ old('company', $job->company) }}" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $job->name) }}" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea id="description" name="description" class="form-control" required>{{ old('description', $job->description) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="requirements">Requirements:</label>
                                <textarea id="requirements" name="requirements" class="form-control">{{ old('requirements', $job->requirements) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="salary">Salary:</label>
                                <input type="number" id="salary" name="salary" class="form-control" value="{{ old('salary', $job->salary) }}">
                            </div>
                            <div class="form-group">
                                <label for="image">Image:</label>
                                <input type="file" id="image" name="image" class="form-control">
                                @if ($job->image)
                                    <img src="{{ asset('storage/' . $job->image) }}" alt="Job Image" style="max-width: 100px; margin-top: 10px;">
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="status">Status:</label>
                                <input type="checkbox" id="status" name="status" {{ old('status', $job->status) ? 'checked' : '' }}>
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
