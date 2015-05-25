@extends('layout.admin')

@section('content')
<!--<div class="row">
    <div class="col-md-12">
        <ul class="nav nav-tabs">
            <li class="active">
                <a href="#all" data-toggle="tab">All Accounts</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="all">
                <table class="table table-hover users-table middle-align">
                    <thead>
                        <tr>
                            <th></th>
                            <th class="hidden-xs hidden-sm"></th>
                            <th>Name</th>
                            <th class="hidden-xs hidden-sm">Email</th>
                            <th class="hidden-xs hidden-sm">UID</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="user-cb">
                                <input type="checkbox" class="cbr" name="users-list[]" value="1">
                            </td>
                            <td class="user-image hidden-xs hidden-sm">
                                <a href="#">
                                    <img src="https://placehold.it/40" alt="Avatar" class="img-circle">
                                </a>
                            </td>
                            <td class="user-name">
                                <a href="#" class="name">John Doe</a>
                                <span>Administrator</span>
                            </td>
                            <td class="hidden-xs hidden-sm">
                                <span class="email">admin@falconfrag.com</span>
                            </td>
                            <td class="user-id">
                                1
                            </td>
                            <td class="action-links">
                                <a href="#" class="edit">
                                    <i class="fa fa-pencil"></i> Edit
                                </a>
                                <a href="#" class="delete">
                                    <i class="fa fa-trash"></i> Delete
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>-->

<div class="row">
    <div class="col-md-12">
        <ul class="nav nav-tabs">
            <li class="active">
                <a href="#all" data-toggle="tab">All Users</a>
            </li>
            <li>
                <a href="#staff" data-toggle="tab">Staff</a>
            </li>
            <li>
                <a href="#clients" data-toggle="tab">Clients</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="all">
                <table class="table table-hover members-table middle-align">
                    <thead>
                        <tr>
                            <th></th>
                            <th class="hidden-xs hidden-sm"></th>
                            <th>Name</th>
                            <th class="hidden-xs hidden-sm">Email</th>
                            <th>ID</th>
                            <th><span class="hidden-xs hidden-sm">Actions</span></th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td class="user-cb">
                                <input type="checkbox" class="cbr" name="members-list[]" value="1" />
                            </td>
                            <td class="user-image hidden-xs hidden-sm">
                                <a href="#">
                                    <img src="https://placehold.it/42" class="img-circle" alt="user-pic" />
                                </a>
                            </td>
                            <td class="user-name">
                                <a href="#" class="name">{{ $user->first_name }} {{ $user->last_name }}</a>
                                <span>{{ $user->roles()->first()->name }}</span>
                            </td>
                            <td class="hidden-xs hidden-sm">
                                <span class="email">{{ $user->email }}</span>
                            </td>
                            <td class="user-id">{{ $user->id }}</td>
                            <td class="action-links">
                                <a href="#" class="edit">
                                    <i class="fa fa-pencil"></i> Edit
                                </a>
                                <a href="#" class="delete">
                                    <i class="fa fa-trash"></i>Delete
                                </a>
                            </td>
                        </tr>
                    @empty
                        <p class="text-center">No users are currently registered.</p>
                    @endforelse
                    </tbody>
                </table>
                {!! $users->render() !!}
            </div>
            <div class="tab-pane active" id="staff">
                <p class="text-center">Staff</p>
            </div>
            <div class="tab-pane active" id="clients">
                <p class="text-center">Clients</p>
            </div>
        </div>
    </div>
</div>
@stop
