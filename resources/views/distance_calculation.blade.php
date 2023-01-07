@include('header')

<div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Basic Form</h6>
                        <div class="mb-3">
                            <label for="distance1" class="form-label">From Location</label>
                            <input type="number" id="name" class="form-control" id="name" name="name" aria-describedby="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">To Location</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit Data</button>
                </div>
            </div>
        </div>
</div>


@include('footer')