<?php
/**
 * Created by PhpStorm.
 * User: longnguyen
 * Date: 5/24/18
 * Time: 3:37 PM
 */
?>
@extends('admin.DashBoard')
@section('content')
    <section class="tables">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-7">
                    <div class="card">
                        <div class="card-close">
                            <div class="dropdown">
                                <button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                                <div aria-labelledby="closeCard" class="dropdown-menu has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                            </div>
                        </div>
                        <div class="card-header d-flex align-items-center">
                            <h3 class="h4">Contact All</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <script>
                                    function loadFormContact(id){
                                        $.get('admin/Contact/ChangeContact/'+id,function(responseData){
                                            $("#formChangeContact").html(responseData);
                                        });
                                    }
                                </script>
                                <tbody>
                                @foreach($Contact as $C)
                                    <form action="admin/Contact/ChangeContact/{{$C->id}}" method="GET">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}" >
                                    <tr>
                                        <td>{{$C->Name}}</td>
                                        <td>{{$C->Email}}</td>
                                        <td><?php if($C->Checker == 0){ echo "Do not check";}else{ echo "Checked";} ?></td>
                                        <td><input type="button" onclick="loadFormContact(<?php echo $C->id; ?>)" name="" value="Update"></td>
                                        <td><a href="admin/Contact/DeleteContact/{{$C->id}}">Delete</a></td>
                                    </tr>
                                    </form>
                                @endforeach
                                </tbody>
                                {{$Contact->render()}}
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5" id="formChangeContact">
                    <!-- load code Ajax o day -->

                    <!-- End code Ajax -->
                </div>
            </div>
        </div>
    </section>
    @endsection
