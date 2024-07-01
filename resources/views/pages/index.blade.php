@extends('app')

@section('content')
    <div class="container">
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Posts</h4>
                    </div>
                </div>

                <div class="card-body">

                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">title</th>
                            <th scope="col">description</th>
                            <th scope="col">status</th>
                            <th scope="col">Created_at</th>
                            <th scope="col">Updated_at</th>
                            <th scope="col">action</th>

                        </tr>
                        </thead>
                        <tbody>


                            @foreach ($posts as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->title}}</td>
                                    <td>{{$item->description}}</td>
                                    <td>{{$item->status}}</td>
                                    <td>{{$item->created_at}}</td>
                                    <td>{{$item->updated_at}}</td>
                                    <td></td>
                                </tr>
                            @endforeach 
                        </tbody>
                    </table>
                </div>


            </div>
        </div>

    </div>
@endsection
