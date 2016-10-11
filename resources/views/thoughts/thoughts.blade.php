@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Thoughts</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="thoughts">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">What are you thinking about?</label>

                                <div class="col-md-6">
                                    <input id="description" name="description" type="text" class="form-control"
                                           value="{{ old('description') }}" required autofocus>

                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Register
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <table border="2">
                <thead>
                    <tr>
                        <td>id</td>
                        <td>description</td>
                        <td>created at</td>
                        <td>Controls</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($thoughts as $thought)
                        <tr>
                            <td>{!! $thought->id !!}</td>
                            <td>{!! $thought->description !!}</td>
                            <td>{!! $thought->created_at !!}</td>
                            <td>
                                <button id="removeThoughtBtn" class="removeThoughtBtn" data-id="{!! $thought->id !!}">DELETE</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        $(function () {
            $('.removeThoughtBtn').click( function () {

                $.ajax({
                    url: 'thoughts/' + $(this).data('id'),
                    type: 'DELETE',
                    data: {
                        '_token': '{!! csrf_token() !!}'
                    },

                    success: function(result) {
                        if(result.isDeleted){
                            location.reload();
                        }
                    }
                });
            });
        });
    </script>

@endsection
