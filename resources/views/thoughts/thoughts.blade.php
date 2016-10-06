@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Thoughts</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/api/thoughts') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('decription') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">What are you thinking about?</label>

                                <div class="col-md-6">
                                    <input id="decription" type="text" class="form-control" name="decription"
                                           value="{{ old('decription') }}" required autofocus>

                                    @if ($errors->has('decription'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('decription') }}</strong>
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
                        <td>decription</td>
                        <td>created at</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($thoughts as $thought)
                        <tr>
                            <td>{!! $thought->id !!}</td>
                            <td>{!! $thought->description !!}</td>
                            <td>{!! $thought->created_at !!}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
