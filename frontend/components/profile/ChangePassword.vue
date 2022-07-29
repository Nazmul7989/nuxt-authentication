<template>
  <div class="container-fluid p-0">

    <h1 class="h3 mb-3">Change Password</h1>

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

            <h5 class="card-title mb-0">Update Password</h5>
          </div>
          <div class="card-body h-100">
            <form>
              <div class="row">
                <div class="col-md-12">
                  <div class="mb-3">
                    <label class="form-label">Enter Your Current
                      Password</label>
                    <input type="password" class="form-control"
                           placeholder="************">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="mb-3">
                    <label class="form-label">Enter Your New
                      Password</label>
                    <input type="password" class="form-control"
                           placeholder="************">
                  </div>
                </div>

              </div>

              <hr />
              <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Change
                  Password</button>
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
  name: "ChangePassword"
}
</script>

<style scoped>

</style>
