@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        <ul id="users">

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="module">
        const usersElement = document.getElementById('users');

        window.axios.get('/api/users').then((response) => {
            const users = response.data;
            response.data.forEach((user) => {
                const userElement = document.createElement('li');
                userElement.setAttribute('id', user.id);
                userElement.innerText = user.name;
                usersElement.appendChild(userElement);
            });
        });
    </script>

    <script type="module">
        const usersElement = document.getElementById('users');
        Echo.channel('users')
        .listen('CreatedUser', (e) => {
            const userElement = document.createElement('li');
            userElement.setAttribute('id', e.user.id);
            userElement.innerText = e.user.name;
            usersElement.appendChild(userElement);
        })
        .listen('UpdatedUser', (e) => {
            const userElement = document.getElementById(e.user.id);
            userElement.innerText = e.user.name;
        })
        .listen('DeletedUser', (e) => {
            const userElement = document.getElementById(e.user.id);
            usersElement.removeChild(userElement);
        })
    </script>
@endpush
