    <h1>All Employees</h1>


    @if ($users->count())
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Username</th>
                <th>Password</th>
                <th>Email</th>
            </tr>
            </thead>

            <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->password }}</td>
                    <td>{{ $user->email }}</td>

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

