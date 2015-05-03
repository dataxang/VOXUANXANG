@extends('layout')
@section('content')
    <section class="header section-padding">
        <div class="background">&nbsp;</div>
        <div class="container">
            <div class="header-text">
                <h1>Calculate Salary</h1>
            </div>
        </div>
    </section>
    <div class="container">
        <section class="section-padding">
            <div class="jumbotron text-center">
                {{--<h1>Employee ID: {{ $user->id }}</h1>--}}

                {{ Form::open(['url'=> '/salary', 'class'=>'form']) }}
                {{ Form::hidden('id', $user->id)}}

                @if (Session::has('message'))
                    <div class="alert alert-info">{{ Session::get('message') }}</div>
                @endif

                <div class="form-group">
                    <label   class="col-sm-4 control-label">Last name :{{ $user->lastname}}</label>
                    </br>
                </div>
                <div class="form-group">
                    <label  class="col-sm-4 control-label">First name :{{ $user->firstname}}</label>
                    </br>
                </div>
                <div class="form-group">
                    <label class="col-sm-6 control-label" >Employee Type :{{$employeeType->name}}</label>
                    </br>
                    </br>
                </div>

                <?php
                    switch($employeeType->id)
                        {
                        case 1:
                            ?>
                             @include('employee._normal')
                        <?php
                            break;
                        case 2:
                            ?>
                              @include('employee._hourly')
                            <?php

                            break;
                        case 3:

                            ?>

                             @include('employee._sale')
                        <?php

                            break;

                          }
              ?>

                <div class="form-group">
                    {{ Form::submit('Save Salary', ['class' => 'btn btn-primary']) }}
                    <a class="btn btn-primary" href="{{ URL::previous() }}">Go Back</a>
                </div>
                {{ Form::close() }}
            </div>
        </section>
    </div>
@stop

