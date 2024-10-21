@extends('layouts.master')
@section('title', 'Dashboard')
@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ session('success') }}
            </div>
            @elseif(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> {{ session('error') }}
            </div>
            @endif
        </div>
        <div class="content-body">
            <!-- users list start -->
            <section class="app-user-list">
                <div class="row">
                    <div class="col-lg-4 col-sm-6">
                        <div class="card">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div>
                                    <h3 class="fw-bolder mb-75">{{ $users }}</h3>
                                    <span>Total Users</span>
                                </div>
                                <div class="avatar bg-light-primary p-50">
                                    <span class="avatar-content">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-archive font-medium-4">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="card">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div>
                                    <h3 class="fw-bolder mb-75">{{ $request_inventories }}</h3>
                                    <span>Inventory Borrowed</span>
                                </div>
                                <div class="avatar bg-light-danger p-50">
                                    <span class="avatar-content">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-archive">
                                            <polyline points="21 8 21 21 3 21 3 8"></polyline>
                                            <rect x="1" y="3" width="22" height="5"></rect>
                                            <line x1="10" y1="12" x2="14" y2="12"></line>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="card">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div>
                                    <h3 class="fw-bolder mb-75">{{ $request_rooms }}</h3>
                                    <span>Room Borrowed</span>
                                </div>
                                <div class="avatar bg-light-success p-50">
                                    <span class="avatar-content">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-archive">
                                            <polyline points="21 8 21 21 3 21 3 8"></polyline>
                                            <rect x="1" y="3" width="22" height="5"></rect>
                                            <line x1="10" y1="12" x2="14" y2="12"></line>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- list and filter start -->
                    <div class="card">
                        <div class="card-datatable table-responsive pt-0">
                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                <div
                                    class="d-flex justify-content-between align-items-center header-actions mx-2 row mt-75">
                                    <div
                                        class="col-sm-12 col-lg-4 d-flex justify-content-center justify-content-lg-start">
                                    </div>
                                    <div class="col-sm-12 col-lg-8 ps-xl-75 ps-0">
                                        <div
                                            class="dt-action-buttons d-flex align-items-center justify-content-center justify-content-lg-end flex-lg-nowrap flex-wrap">
                                            <form>
                                                <div class="me-1">
                                                    <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                                        <label>Search:
                                                            <input type="search" class="form-control" placeholder=""
                                                                aria-controls="DataTables_Table_0" name="search"
                                                                autocomplete="off" value="{{ request()->search }}">
                                                        </label>
                                                        <button type="submit" class="btn btn-primary">Search</button>
                                                    </div>
                                                </div>
                                            </form>
                                            @can('Admin')
                                            <div class="dt-buttons d-inline-flex mt-50">
                                                <a class="dt-button add-new btn btn-primary"
                                                    href="{{ route('announcements.create') }}">
                                                    <span>Add Announcement</span>
                                                </a>
                                            </div>
                                            @endcan
                                        </div>
                                    </div>
                                </div>
                                <table class="user-list-table table dataTable no-footer dtr-column"
                                    id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                    <thead class="table-light">
                                        <tr role="row">
                                            <th class="control sorting_disabled" rowspan="1" colspan="1"
                                                style="width: 54.1125px; display: none;" aria-label=""></th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1" style="width: 151.1px;" aria-sort="descending"
                                                aria-label="Name: activate to sort column ascending">ID Announcements
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1" style="width: 146.525px;"
                                                aria-label="Role: activate to sort column ascending">Title</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1" style="width: 183.475px;"
                                                aria-label="Billing: activate to sort column ascending">File</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1" style="width: 183.475px;"
                                                aria-label="Billing: activate to sort column ascending">Date of use</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1" style="width: 183.475px;"
                                                aria-label="Billing: activate to sort column ascending">Date of end</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1" style="width: 145px;"
                                                aria-label="Plan: activate to sort column ascending">Description</th>
                                            @can('Admin')
                                            <th class="sorting_disabled" rowspan="1" colspan="1"
                                                style="width: 185.688px;" aria-label="Actions">Actions</th>
                                            @endcan
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($announcements as $index => $announcement)
                                            <tr class="odd">
                                                {{-- <td valign="top" class="dataTables_empty">{{ $annocement->id }}
                                                </td> --}}
                                                <td valign="top" class="dataTables_empty">{{ $index + $announcements->firstItem() }}</td>
                                                <td valign="top" class="dataTables_empty">{{ $announcement->title }}
                                                </td>
                                                <td valign="top" class="dataTables_empty">
                                                    <a href="{{ asset('files/'. $announcement->file) }}" target="_blank">{{ $announcement->file }}</a>
                                                </td>
                                                <td valign="top" class="dataTables_empty">{{ $announcement->date_of_use }}
                                                </td>
                                                <td valign="top" class="dataTables_empty">{{ $announcement->date_of_end }}
                                                </td>
                                                <td valign="top" class="dataTables_empty">{{ $announcement->content }}
                                                </td>
                                                @can('Admin')
                                                <td valign="top" class="dataTables_empty">
                                                    <div class="d-inline-flex">
                                                        <a class="pe-1 dropdown-toggle hide-arrow text-primary"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-more-vertical font-small-4">
                                                                <circle cx="12" cy="12" r="1"></circle>
                                                                <circle cx="12" cy="5" r="1">
                                                                </circle>
                                                                <circle cx="12" cy="19" r="1"></circle>
                                                            </svg>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end" style="">
                                                            <a href="{{ route('announcements.edit', $announcement->id) }}"
                                                                class="dropdown-item delete-record">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-edit font-small-4">
                                                                    <path
                                                                        d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                                    </path>
                                                                    <path
                                                                        d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                                    </path>
                                                                </svg>Edit
                                                            </a>
                                                            <form
                                                                action="{{ route('announcements.destroy', $announcement->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method("DELETE")
                                                                <button type="submit"
                                                                    class="dropdown-item delete-record">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        class="feather feather-trash-2 font-small-4 me-50">
                                                                        <polyline points="3 6 5 6 21 6"></polyline>
                                                                        <path
                                                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                                        </path>
                                                                        <line x1="10" y1="11" x2="10" y2="17"></line>
                                                                        <line x1="14" y1="11" x2="14" y2="17"></line>
                                                                    </svg>Delete
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                @endcan
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $announcements->links() }}
                                <div class="d-flex justify-content-between mx-2 row mb-1"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection