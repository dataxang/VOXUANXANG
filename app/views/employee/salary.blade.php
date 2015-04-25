@extends('layout')
@section('content')
    <section>
    </section>

    <section class="header section-padding">
    </section>
<?php
        if(isset($_GET['name']))
        {
            $username = $_GET['name'];
        }

    if(isset($_GET['email']))
    {
        $email = $_GET['email'];
    }
?>

    <div class="container">

        <form method='post' action='{{Asset('register')}}' id='form-register'>
            <h2> Salary Calculation</h2>
            <label> Username : </label><label> <?php echo($username); ?></label></br>
            <label>Email : </label><label> <?php echo($email); ?></label></br>
            <button class='btn btn-lg btn-primary btn-block'>Save</button>
            <button class='btn btn-lg btn-primary btn-block'>Back</button>
        </form>
    </div>

    </section>
    </div>
@stop

