@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">

           <!-- Display Validation Errors -->
            @include('common.errors')

            <!-- New Post Form -->
            <form action="{{ url('post') }}" method="POST" class="form-horizontal">
                {{ csrf_field() }}

                <div class="form-group">
                  <label class="col-sm-6">Date</label>
                  <div class="col-xs-7">
                    <input class="form-control" id='post-date' type="date" name="post_date">
                  </div>
                </div>

                <!-- Post What's done -->
                <strong>What's Done</strong>
                <div class="form-group">
                    <!-- <label for="post-whats-done" class="col-sm-3 control-label">What's Done</label> -->

                    <div class="col-sm-12">
                        <textarea type="text" name="whats_done" id="post-whats-done" class="form-control" rows="6" cols="100" value="{{ old('post') }}"></textarea>
                    </div>
                </div>

                <!-- Post Will done -->
                <strong>Will Do</strong>
                <div class="form-group">
                    <div class="col-sm-12">
                        <textarea type="text" name="will_do" id="post-will-do" class="form-control" rows="6" cols="100" value="{{ old('post') }}"></textarea>
                    </div>
                </div>

                <strong>Blockers</strong>
                <div class="form-group">
                    <div class="col-sm-12">
                        <textarea type="text" name="blockers" id="post-blockers" class="form-control" rows="6" cols="100" value="{{ old('post') }}"></textarea>
                    </div>
                </div>

                <!-- Add Post Button -->
                <div class="form-group">
                    <div class="col-sm-offset-10 col-sm-12">
                        <button type="submit" class="btn btn-default">
                            <i class="fa fa-btn fa-plus"></i>Add
                        </button>
                    </div>
                </div>

            </form>

            <!-- Current Posts -->
            @if (count($posts) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        My Posts
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

                                        <!-- Task Delete Button -->
                                        <td>
                                            <form action="{{url('post/' . $post->id)}}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" id="delete-post-{{ $post->id }}" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif

        </div>
    </div>
@endsection
