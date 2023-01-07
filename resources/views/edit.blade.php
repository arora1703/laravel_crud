@include('header')
<div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Edit Data Form</h6>
                    <form action="{{url('update/'.$data->id)}}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" id="name" class="form-control" id="name" name="name" aria-describedby="name" required value={{$data->name}}>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" required value={{$data->email}}> 
                            <div id="emailHelp" class="form-text">We will never share your email with anyone else.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="phone" minlength="10" maxlength="10" name="phone" aria-describedby="phone" required value={{$data->phone}}>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="exampleInputPassword1" required>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select form-select-sm mb-3" aria-label=".form-select-sm example">
                                <option >Open this select menu</option>
                                <option value="0" {{ ( $data->status == 0) ? 'selected' : '' }}>Inactive</option>
                                <option value="1" {{ ( $data->status == 1) ? 'selected' : '' }}>Active</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="file" class="form-label">Profile Pic</label>
                            <input class="form-control bg-dark" type="file" name="image" id="formFile" required >
                        </div>
                        <button type="submit" class="btn btn-primary">Submit Data</button>
                    </form>
                </div>
            </div>
        </div>
</div>

@include('footer')
<script>
$("#name").keyup(function(e) {
  var regex = /^[a-zA-Z ]+$/;
  if (regex.test(this.value) !== true)
    this.value = this.value.replace(/[^a-zA-Z ]+/, '');
});
$("#phone").keyup(function(e) {
  var regex = /^[0-9]+$/;
  if (regex.test(this.value) !== true)
    this.value = this.value.replace(/[^0-9]+/, '');
});
</script>