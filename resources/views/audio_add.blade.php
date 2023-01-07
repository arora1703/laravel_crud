@include('header')
<div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Basic Form</h6>
                    <form action="/add_audio" method="post" enctype="multipart/form-data">
                    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                        <div class="mb-3">
                            <label for="audio" class="form-label">Audio</label>
                            <input class="form-control bg-dark" accept="audio/*" type="file" name="audio" id="formFile" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Audio</button>
                    </form>
                </div>
            </div>
        </div>
</div>

@include('footer')