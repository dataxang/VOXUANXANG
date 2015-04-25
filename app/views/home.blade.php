@extends('layout')
{{ HTML::style('jqxgrid/styles/jqx.base.css') }}
@section('content')
    <section>
    </section>

    <section class="header section-padding">


    </section>


    <div class="container">
        <h1>All Employees</h1>


        @if ($users->count())
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Salary Calculation</th>
                </tr>
                </thead>

                <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ link_to_route('employee.index', 'Calculate Salary', array("id"=>$user->id,"name"=>$user->username,"email"=>$user->email), array('class' => 'btn btn-info')) }}</td>
                    </tr>
                @endforeach

                </tbody>

            </table>

            <div class="pagination">
                {{ $users->links() }}
            </div>

        @else
            There are no users
        @endif

    </div>

    </section>
    </div>
@stop

