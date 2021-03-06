@extends('index')

@section('content')
    <div class="container">
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
            <h2 class="form-signin-heading">Referrals</h2>

        @if(count($referrals))
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Last activity</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($referrals as $key => $referral)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td><a href="/cabinet/referrals/{{ $referral['id'] }}">{{ $referral['login'] }}</a></td>
                            <td>{{ $referral['last_activity'] }}</td>
                            <td><a href="/cabinet/dialogs/{{ $referral['id'] }}">send message</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div>No referrals</div>
        @endif
    </div>
@endsection