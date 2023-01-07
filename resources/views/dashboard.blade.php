@include('header')
            <!-- Recent Sales Start -->
            @if(Session::has('success'))
            <div class="alert alert-success">
            <p>{{ Session::get('success') }}</p>
            </div>
            @elseif(Session::has('danger'))
            <div class="alert alert-danger">
            <p>{{ Session::get('danger') }}</p>
            </div>
            @elseif(Session::has('warning'))
            <div class="alert alert-warning">
            <p>{{ Session::get('warning') }}</p>
            </div>
            @endif
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Recent Data</h6>
                        <a href="add_data">Add Data</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-white">
                                    <th scope="col">S. No.</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Mobile No.</th>
                                    <th scope="col">Profile Pic</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($data))
                                    @foreach($data as $data => $value)
                                    <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$value['name']}}</td>
                                    <td>{{$value['email']}}</td>
                                    <td>{{$value['phone']}}</td>
                                    <td>
                                    <img class="rounded-circle" src="{{ URL::asset('uploads/profile_image/'. $value['image'])}}" alt="" style="width: 40px; height: 40px;">
                                    </td>
                                    <td>@if($value['status']==1){{'Active'}}@else{{'Inactive'}}@endif</td>
                                    <td><span><a class="btn btn-sm btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></a></span> <a class="btn btn-sm btn-primary" href="{{url('edit/'.$value->id)}}">Edit <span><i class="fas fa-edit"></i></span></a></td>
                                    </tr>
                                    @endforeach
                                @else
                                <tr>
                                    <td colspan="7" style="text-align:center;">No Record Found</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->
            
@include('footer')