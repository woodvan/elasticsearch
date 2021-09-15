@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1 class="text-primary" style="text-align: center;">Laravel 7 Elasticsearch integration from scratch with example</h1>
        </div>
    </div>
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-lg-6">
                        {{ Form::open(array('method'=>'get','class'=>'')) }}
                        <div class="input-group">
                            <input name="search" value="{{ old('search') }}" type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
            <button class="btn btn-default" type="submit">Go!</button>
          </span>
                        </div><!-- /input-group -->
                        {{ Form::close() }}
                    </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->
            </div>
            <div class="panel-body">

                <div class="row">
                    <div class="col-lg-6">
                        @if(!empty($students))
                            @foreach($students as $key => $value)
                                <h3 class="text-danger">{{ $value['first_name'] }}</h3>
                                <p>{{ $value['last_name'] }}</p>
                                <p>{{ $value['address'] }}</p>
                            @endforeach
                        @endif
                    </div>
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Create New Student
                            </div>
                            <div class="panel-body">
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                {{ Form::open(array('url' => 'studentSearchCreate','autocomplete'=>'off')) }}
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>First Name:</strong>
                                            {{ Form::text('first_name', null, array('placeholder' => 'First Name','class' => 'form-control')) }}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Last Name:</strong>
                                            {{ Form::text('last_name', null, array('placeholder' => 'Last Name','class' => 'form-control')) }}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Address:</strong>
                                            {{ Form::text('address', null, array('placeholder' => 'Address','class' => 'form-control')) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection