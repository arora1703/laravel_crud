@include('header')
<div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Basic Form</h6>
                    <form action="/add" method="post" enctype="multipart/form-data">
                    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" id="name" class="form-control" id="name" name="name" aria-describedby="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" required>
                            <div id="emailHelp" class="form-text">We will never share your email with anyone else.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="phone" minlength="10" maxlength="10" name="phone" aria-describedby="phone" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="exampleInputPassword1" required>
                        </div>
                        <div class="mb-3">
                            <label for="file" class="form-label">Profile Pic</label>
                            <input class="form-control bg-dark" type="file" name="image" id="formFile" required>
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