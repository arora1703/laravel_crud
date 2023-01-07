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
                        <a href="add_file">Add Audio</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-white">
                                    <th scope="col">S. No.</th>
                                    <th scope="col">File Name</th>
                                    <th scope="col">File</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @if($audio)
                               @foreach($audio as $key => $value)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$value['audio']}}</td>
                                    <td>
                                        <audio id="audio" controls>
                                        <source src="{{ URL::asset('uploads/audio_file/'. $value['file'])}}" type="audio/mp3">
                                        <source src="{{ URL::asset('uploads/audio_file/'. $value['file'])}}" type="audio/mp3">
                                        </audio>
                                    </td>
                                    <td><button class="btn btn-primary" onclick="getlength()">Get Length</button></td>
                                </tr>
                                @endforeach
                                @else   
                                <tr>
                                    <td colspan="3" style="text-align:center;">No Record Found</td>
                                </tr>
                               @endif
                            </tbody>
                        </table>
                    </div>
                    <p style="float:left;" id="details"></p>
                </div>
            </div>
            <!-- Recent Sales End -->
            
<script>
function getlength() {
  var length = document.getElementById("audio").duration;
  document.getElementById("details").innerHTML = "The Length of Audio file is "+length;
}
</script>

@include('footer')