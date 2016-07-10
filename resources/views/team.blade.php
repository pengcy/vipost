@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="row">
            <!-- Display Validation Errors -->
            @include('common.errors')
          <div class="col-sm-3">
                @if (count($users) > 0)
                    <div class="list-group">
                        <a href="#" class="list-group-item active">
                            Team members
                        </a>
                        @foreach ($users as $user)
                            <a href="{{url('team/user/' . $user->id)}}" class="list-group-item">{{ $user->name }}</a>
                        @endforeach
                    </div>
                @endif
            </div>


            <div class="col-sm-8">
                <!-- Current Posts -->
                @if (isset($posts) && count($posts) > 0)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            {{$selectedUser->name}}
                        </div>

                        <div class="panel-body">
                            <table class="table table-striped post-table">
                                <thead>
                                    <th>Post</th>
                                    <th>&nbsp;</th>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td class="table-text"><div>{{ $post->date }}</div></td>
                                            <td class="table-text"><div>{{ $post->whats_done }}</div></td>
                                            <td class="table-text"><div>{{ $post->will_do }}</div></td>
                                            <td class="table-text"><div>{{ $post->blockers }}</div></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
            </div>


        </div> <!-- end of row -->

    </div> <!-- end of container -->
@endsection
