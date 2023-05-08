@extends('layout-admin.app')

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Manage users</h1>
        </div>
    </div>
    <div class="container-fluid">
        <p class="mb-4">Display of accounts and their information.</p>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div id="content">
            <div class="card shadow mb-4">

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered"  width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Admin</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td style="width: 33%;">{{ $user->name }}</td>
                                    <td style="width: 33%;">{{ $user->email }}</td>
                                    <td style="width: 33%">
                                    @if ($user->role == 'admin')
                                        <form action="{{ route('users.change_role') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                                            <button type="submit" class="btn btn-success btn-icon-split" spellcheck="false">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-check"></i>
                                                </span>
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{ route('users.change_role') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                                            <button type="submit" class="btn btn-danger btn-icon-split" spellcheck="false">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-times"></i>
                                                </span>
                                            </button>
                                        </form>
                                    @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection