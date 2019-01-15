@extends('layouts.dashboard')
@section('page_heading','Dashboard')
@section('content')

    <!-- BEGIN PAGE HEAD-->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1>All Staff Datatable For The Banyan main server
            </h1>
        </div>
    </div>
    <!-- END PAGE BREADCRUMB -->

    <!-- BEGIN PAGE BASE CONTENT -->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase">All Staff</span>
                    </div>
                    <div class="tools"> </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="sample_1">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Locked By</th>
                            <th>Start Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Locked By</th>

                            <th>Start Date</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach ($users as $user)
                            @if($user->role != 'SuperAdmin')

                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>

                                        @php
                                            $lob=\Illuminate\Support\Facades\DB::table('lock_transaction')->where([['user','=',$user->username],['server','=','main']])->orderBy('created_at','desc')->limit(1);
                                            if($lob->count() > 0){
                                               $ab=DB::connection('mysql1')->table('users')->where('id',$lob->first()->approve_by)->first();
                                               echo $ab->username . ' ' .'status:'.$lob->first()->status;
                                            }

                                        @endphp

                                    </td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>
                                        @if($user->role == 'locked')
                                            <a href="#"  onclick="falert({{$user->id}})" class="btn btn-inline btn-primary btn-sm ladda-button" >ReActive</a>
                                        @endif
                                        @if($user->role != 'locked')
                                            <a href="#"  onclick="lalert({{$user->id}})" class="btn btn-inline btn-danger btn-sm ladda-button" >Locked</a>
                                        @endif
                                        <script>
                                            function falert(id){
                                                $data=confirm('Are u sure want to active this user?');
                                                if($data){
                                                    window.location.assign('reactive/'+ id);
                                                }

                                            }
                                            function lalert(id){
                                                $data=confirm('Are u sure want to lock this user?');
                                                if($data){
                                                    window.location.assign('lock/'+ id);
                                                }

                                            }
                                        </script>

                                    </td>
                                </tr>
                            @endif

                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>


    <!-- END CONTAINER -->
@endsection