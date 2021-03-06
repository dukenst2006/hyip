@extends('Admin::index')

@section('content')
    @if(Session::get('errors'))
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <ul>
                @foreach($errors->all() as $message)
                    <li>{{$message}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session()->has('messages'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <ul>
                @foreach (session()->get('messages') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div>
        <h1 class="sub-header">Dashboard</h1>
    </div>

    @if (count($users))
        <h3>Users</h3>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Active</th>
                        <th>Banned</th>
                        <th>All</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $users['active'] }}</td>
                        <td>{{ $users['all_users'] - $users['active'] }}</td>
                        <td>{{ $users['all_users'] }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    @else
        <div>No users</div>
    @endif

@endsection