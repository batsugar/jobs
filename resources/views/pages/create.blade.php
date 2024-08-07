@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Create Job
                            <a href="{{ url('/jobs') }}" class="btn btn-success float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('jobs') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="company">Company</label>
                                <input type="text" id="company" class="form-control" name="company" value="{{ old('company') }}">
                                @error('company')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="name">Job Title</label>
                                <input type="text" id="name" class="form-control" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="description">Description</label>
                                <textarea id="description" class="form-control" name="description">{{ old('description') }}</textarea>
                                @error('description')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="requirements">Requirements</label>
                                <textarea id="requirements" class="form-control" name="requirements">{{ old('requirements') }}</textarea>
                                @error('requirements')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="salary">Salary</label>
                                <input type="number" id="salary" class="form-control" name="salary" value="{{ old('salary') }}">
                                @error('salary')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="image">Image</label>
                                <input type="file" id="image" class="form-control" name="image">
                                @error('image')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="status">Status</label>
                                <input type="checkbox" id="status" name="status" {{ old('status') ? 'checked' : '' }}>
                                <span class="form-check-label">Is Public</span>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
