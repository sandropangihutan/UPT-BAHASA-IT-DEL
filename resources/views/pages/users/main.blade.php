@extends('layouts.master')
@section('title', 'Users')
@section('content')
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="card">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <div class="card-datatable table-responsive pt-0">
            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                <div class="d-flex justify-content-between align-items-center header-actions mx-2 row mt-75">
                    <div class="col-sm-12 col-lg-4 d-flex justify-content-center justify-content-lg-start">
                        <div>
                            <h4 class="mb-0">User</h4>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-8 ps-xl-75 ps-0">
                        <div
                            class="dt-action-buttons d-flex align-items-center justify-content-center justify-content-lg-end flex-lg-nowrap flex-wrap">
                            <div class="me-1">
                                <div id="DataTables_Table_0_filter" class="dataTables_filter"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="user-list-table table dataTable no-footer dtr-column" id="DataTables_Table_0"
                    role="grid" aria-describedby="DataTables_Table_0_info">
                    <thead class="table-light">
                        <tr role="row">
                            <th class="control sorting_disabled" rowspan="1" colspan="1"
                                style="width: 54.1125px; display: none;" aria-label=""></th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                colspan="1" style="width: 183.475px;"
                                aria-label="Billing: activate to sort column ascending">#</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                colspan="1" style="width: 183.475px;"
                                aria-label="Billing: activate to sort column ascending">Name</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                colspan="1" style="width: 183.475px;"
                                aria-label="Billing: activate to sort column ascending">Email</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                colspan="1" style="width: 183.475px;"
                                aria-label="Billing: activate to sort column ascending">Role</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                colspan="1" style="width: 183.475px;"
                                aria-label="Billing: activate to sort column ascending">Status</th>
                            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 185.688px;"
                                aria-label="Actions">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $item)
                            <tr class="odd">
                                <td valign="top" class="dataTables_empty">{{ $loop->iteration }}</td>
                                <td valign="top" class="dataTables_empty">{{ $item->name }}</td>
                                <td valign="top" class="dataTables_empty">{{ $item->email }}</td>
                                <td valign="top" class="dataTables_empty">{{ $item->role->name }}</td>
                                <td valign="top" class="dataTables_empty">{{ $item->status }}</td>
                                <td>
                                    @if($item->status == 'pending')
                                    <div class="d-inline-flex">
                                        <a class="pe-1 dropdown-toggle hide-arrow text-primary"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-more-vertical font-small-4">
                                                <circle cx="12" cy="12" r="1"></circle>
                                                <circle cx="12" cy="5" r="1">
                                                </circle>
                                                <circle cx="12" cy="19" r="1"></circle>
                                            </svg>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end" style="">
                                            <a href="{{ route('users.edit', $item->id) }}"
                                                class="dropdown-item delete-record">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    class="feather feather-edit font-small-4">
                                                    <path
                                                        d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                    </path>
                                                    <path
                                                        d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                    </path>
                                                </svg>Edit
                                            </a>
                                        </div>
                                    </div>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $users->links() }}
            <div class="d-flex justify-content-between mx-2 row mb-1"></div>
        </div>
    </div>
</div>
@endsection