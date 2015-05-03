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
                            //
                            ?>

                            <div class="form-group">
                                <label for="salary" class="col-sm-4 control-label">Salary<span class="required">*</span></label>
                                    <input type="text" name="salary" id="salary" class="form-control" placeholder="Salary" required/>
                            </div>
                            </br>
                            <div class="form-group">
                                <label for="comment" class="col-sm-4 control-label">Comment<span class="required">*</span></label>
                                    <textarea name="comment" id="comment" class="form-control" required placeholder="Comment"></textarea>
                            </div>
                        <?php
                            break;
                        case 2:
                            ?>
                                <div class="form-group">
                                    <label for="hourly_work" class="col-sm-4 control-label">Hourly Work<span class="required">*</span></label>
                                    <input type="text" name="hourly_work" id="hourly_work" class="form-control" placeholder="Hourly Work"
                                               required/>
                                </div>

                                <div class="form-group">
                                    <label for="wage" class="col-sm-4 control-label">Wage Per Hour<span class="required">*</span></label>

                                        <input type="text" name="wage" id="wage" class="form-control" placeholder="Wage Per Hour" required/>
                                </div>

                                <div class="form-group">
                                    <label for="comment1" class="col-sm-4 control-label">Comment<span class="required">*</span></label>
                                    <textarea name="comment" id="comment" class="form-control" required placeholder="Comment"></textarea>
                                </div>
                            <?php

                            break;
                        case 3:

                            ?>
                            <div class="form-group">
                                <label for="basic_salary" class="col-sm-4 control-label">Basic Salary<span class="required">*</span></label>

                                    <input type="text" name="basic_salary" id="basic_salary" class="form-control" placeholder="Basic Salary"
                                           required/>
                            </div>
                            <div class="form-group">
                                <label for="gross_saled" class="col-sm-4 control-label">Gross Saled<span class="required">*</span></label>

                                    <input type="text" name="gross_saled" id="gross_saled" class="form-control" placeholder="Gross Saled"
                                           required/>
                            </div>
                            <div class="form-group">
                                <label for="commission_rate" class="col-sm-4 control-label">Commission Rate<span
                                            class="required">*</span></label>

                                    <input type="text" name="commission_rate" id="commission_rate" class="form-control"
                                           placeholder="Commission Rate" required/>
                            </div>
                        <div class="form-group">
                            <label for="comment1" class="col-sm-4 control-label">Comment<span class="required">*</span></label>
                                <textarea name="comment" id="comment" class="form-control" required placeholder="Comment"></textarea>
                        </div>

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

