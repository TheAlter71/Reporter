<x-admin.master>
    <x-slot name="title">
        {{ $title ?? 'Users | Admin'}}
    </x-slot>

    <x-admin.partials.sidebar />

    <x-admin.partials.navbar />



    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>User Panel</h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Users</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                <!-- /# row -->
                <div id="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="jsgrid-table-panel">
                                    <div id="jsGrid">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col">PK</th>
                                                    <th scope="col">Username</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td>reporter@0101</td>
                                                    <td>Mehedi Hasan</td>
                                                    <td>email.mehedi.bd@gmail.com</td>
                                                    <td><span class="badge badge-success">Admin</span></td>
                                                    <td>
                                                        <a href="#" class="btn btn-primary btn-sm">Update</a>
                                                        <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td>reporter@0101</td>
                                                    <td>Mehedi Hasan</td>
                                                    <td>email.mehedi.bd@gmail.com</td>
                                                    <td><span class="badge badge-success">Admin</span></td>
                                                    <td>
                                                        <a href="#" class="btn btn-primary btn-sm">Update</a>
                                                        <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td>reporter@0101</td>
                                                    <td>Mehedi Hasan</td>
                                                    <td>email.mehedi.bd@gmail.com</td>
                                                    <td><span class="badge badge-secondary">User</span></td>
                                                    <td>
                                                        <a href="#" class="btn btn-primary btn-sm">Update</a>
                                                        <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /# card -->
                        </div>
                        <!-- /# column -->
                    </div>
                    <!-- /# row -->

                    <x-admin.partials.footer />
                </div>
            </div>
        </div>
    </div>


</x-admin.master>