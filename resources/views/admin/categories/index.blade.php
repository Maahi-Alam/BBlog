@extends('layouts.admin')

@section('content')

    <h1> ALL Categories</h1>




    <div class="col-sm-12">


        @if($categories)


            <table class="table">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Created date</th>
                </tr>
                </thead>
                <tbody>

                @foreach($categories as $category)

                    <tr>
                        <td>{{$category->id}}</td>
                        <td><a href="{{route('cat.edit',$category->id)}}">{{$category->name}}</a></td>
                        <td>{{$category->created_at ? $category->created_at->diffForHumans() : 'no date'}}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>

        @endif



    </div>










@endsection

@section('footer')
@endsection