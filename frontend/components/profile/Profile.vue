<template>
  <div class="container-fluid p-0">

    <h1 class="h3 mb-3">Profile</h1>

    <div class="row">
      <div class="col-md-4 col-xl-3">
        <div class="card mb-3">
          <div class="card-header">
            <h5 class="card-title mb-0">Profile Details</h5>
          </div>
          <div class="card-body text-center">
            <img src="~/assets/img/avatars/avatar-4.jpg" alt="Christina Mason"
                 class="img-fluid rounded-circle mb-2" width="128" height="128" />
            <h5 class="card-title mb-0">Christina Mason</h5>
            <div class="text-muted mb-2">Lead Developer</div>

            <div>
              <a class="btn btn-primary btn-sm" href="#">Follow</a>
              <a class="btn btn-primary btn-sm" href="#"><span data-feather="message-square"></span> Message</a>
            </div>
          </div>
          <hr class="my-0" />

        </div>
      </div>

      <div class="col-md-8 col-xl-9">
        <div class="card">
          <div class="card-header">

            <h5 class="card-title mb-0">Profile Info</h5>
          </div>
          <div class="card-body h-100">
            <form>
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" placeholder="Name">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label">City</label>
                    <input type="text" class="form-control" placeholder="City">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label">State</label>
                    <input type="text" class="form-control" placeholder="State">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label">Country</label>
                    <input type="text" class="form-control" placeholder="Country">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label">Organization</label>
                    <input type="text" class="form-control" placeholder="Organization">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label">Profession</label>
                    <input type="text" class="form-control" placeholder="Profession">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-10">
                      <div class="mb-3">
                        <label class="form-label">Profile Photo</label>
                        <input type="file" class="form-control"
                               placeholder="Profession">
                      </div>
                    </div>
                    <div class="col-2">
                      <img src="~/assets/img/avatars/avatar-4.jpg"
                           style="width: 90%; height: 100px;"
                           alt="">
                    </div>
                  </div>

                </div>
              </div>

              <hr />
              <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Update
                  Profile</button>
              </div>

            </form>

          </div>
        </div>
      </div>
    </div>

  </div>
</template>

<script>
export default {
name: "Profile"
}
</script>

<style scoped>

</style>
