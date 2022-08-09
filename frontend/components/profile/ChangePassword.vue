<template>
  <div class="container-fluid p-0">

    <h1 class="h3 mb-3">Change Password</h1>

    <div class="row">
      <div class="row">
        <div class="col-md-4 col-xl-3">
          <div class="card mb-3">
            <div class="card-header">
              <h5 class="card-title mb-0">Profile Details</h5>
            </div>
            <div class="card-body text-center">

              <img v-if="user.profile_picture != null"
                   :src="imageURL + user.profile_picture"
                   class="rounded-circle border mb-2" width="128"
                   height="128" alt=""/>
              <img v-else src="~/assets/img/avatars/user.jpg"
                   class="img-fluid rounded-circle border mb-2" width="128"
                   height="128" alt=""/>
              <h5 class="card-title mb-0">{{ user.name }}</h5>
              <div class="text-muted mb-2">{{ user.email }}</div>

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
              <form  @submit.prevent="changePassword"
                     @keydown="form.onKeydown($event)">
                <div class="row">
                  <div class="col-md-12">
                    <div class="mb-3">
                      <label for="current_password" class="form-label">Enter Your Current
                        Password</label>
                      <input type="password" v-model="form.current_password" id="current_password"
                             class="form-control" placeholder="Current Password"/>
                      <div class="text-danger" v-if="form.errors.has('current_password')" v-html="form.errors.get('current_password')"></div></div>
                  </div>
                  <div class="col-md-12">
                    <div class="mb-3">
                      <label for="new_password" class="form-label">Enter Your New Password</label>
                      <input type="password" v-model="form.new_password" id="new_password"
                             class="form-control" placeholder="New Password"/>
                      <div class="text-danger" v-if="form.errors.has('new_password')" v-html="form.errors.get('new_password')" ></div>
                    </div>
                  </div>
                  <hr />
                  <div class="col-md-12">
                    <button type="submit" :disabled="form.busy" class="btn btn-primary">Change Password</button>
                  </div>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>

    </div>


  </div>
</template>

<script>
export default {
  name: "ChangePassword",
  data (){
    return {
      form: this.$vform({
        current_password: '',
        new_password: '',
      }),
      imageURL: this.$config.imageUrl,
    }
  },
  computed: {
    user(){
      return this.$store.state.auth.user
    }
  },
  methods : {
    changePassword(){
      this.form.post('/change-password').then((res)=>{
        if (res.data.status === true){
          this.form.current_password = '';
          this.form.new_password = '';

          Toast.fire({
            icon: 'success',
            title: 'Password Changed Successfully.'
          })

        }else {
          Toast.fire({
            icon: 'error',
            title: res.data.message
          })
        }

      }).catch((error)=>{
        Toast.fire({
          icon: 'error',
          title: error.response.data.message
        })
      })
    },

  },

}
</script>

<style scoped>

</style>
