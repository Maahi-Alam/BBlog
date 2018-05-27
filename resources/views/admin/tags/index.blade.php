@extends('layouts.admin')

@section('content')

    <h1> ALL Tags</h1>




    <div class="col-sm-12">


        @if($tags)


            <table class="table">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Created date</th>
                </tr>
                </thead>
                <tbody>

                @foreach($tags as $tag)

                    <tr>
                        <td>{{$tag->id}}</td>
                        <td><a href="{{route('tag.edit',$tag->id)}}">{{$tag->name}}</a></td>
                        <td>{{$tag->created_at ? $tag->created_at->diffForHumans() : 'no date'}}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>

        @endif



    </div>










@endsection

@section('footer')
@endsection