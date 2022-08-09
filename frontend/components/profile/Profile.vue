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

            <h5 class="card-title mb-0">Profile Info</h5>
          </div>
          <div class="card-body h-100">
            <form  @submit.prevent="updateProfile" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" v-model="form.name" id="name" class="form-control" placeholder="Name">
                    <div class="text-danger" v-if="errorMessage">
                        {{ errorMessage }}
                    </div>

                </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="city" class="form-label">City</label>
                    <input type="text" v-model="form.city" id="city" class="form-control" placeholder="City">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="state" class="form-label">State</label>
                    <input type="text" v-model="form.state" id="state" class="form-control" placeholder="State">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="country" class="form-label">Country</label>
                    <input type="text" v-model="form.country" id="country" class="form-control" placeholder="Country">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="organization" class="form-label">Organization</label>
                    <input type="text" v-model="form.organization" id="organization" class="form-control" placeholder="Organization">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="profession" class="form-label">Profession</label>
                    <input type="text" v-model="form.profession" id="profession" class="form-control" placeholder="Profession">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-10">
                      <div class="mb-3">
                        <label for="profile_picture" class="form-label">Profile
                          Photo</label>
                        <input type="file" ref="imageField"
                               id="profile_picture"
                               class="form-control"
                               @change="onImageChange"/>
                      </div>
                    </div>
                    <div class="col-2">
                      <img v-if="imageShow != null" :src="imageShow"
                           style="width:
                      90%; height: 100px;" alt="">
                      <img v-else src="~/assets/img/avatars/noImage.jpg" style="width: 90%; height: 100px;" alt="">
                    </div>
                  </div>

                </div>
              </div>

              <hr />
              <div class="col-md-12">
                <button type="submit" :disabled="form.busy" class="btn btn-primary">Update
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
  name: "Profile",
  data (){
    return {
      form: {
        name: '',
        city: '',
        state: '',
        country: '',
        organization: '',
        profession: '',
        profile_picture: '',
      },

      imageShow: null,
      errorMessage: '',
      imageURL: this.$config.imageUrl,
    }
  },
  methods : {
    onImageChange(e){
      let file = e.target.files[0];
      this.form.profile_picture = file;

      let reader = new FileReader();
      reader.onload = (e)=>{
        this.imageShow = e.target.result
      };
      reader.readAsDataURL(file);
    },

    async updateProfile(){

      let formData = new FormData();

      formData.append('name',this.form.name)
      formData.append('city',this.form.city)
      formData.append('state',this.form.state)
      formData.append('country',this.form.country)
      formData.append('organization',this.form.organization)
      formData.append('profession',this.form.profession)
      formData.append('profile_picture',this.form.profile_picture)

      await this.$axios.post('/update-profile',formData).then((res)=>{
        this.form.profile_picture = null;
        this.$refs.imageField.value = null

        this.imageShow = null;

        this.$auth.fetchUser();

        Toast.fire({
          icon: 'success',
          title: res.data.message
        })

      }).catch((error)=>{
        this.errorMessage = error.response.data.message
        Toast.fire({
          icon: 'error',
          title: error.response.data.message
        })
      })
    },

  },
  computed: {
    user(){
      let userData =  this.$store.state.auth.user


      if (userData.name != null){
        this.form.name = userData.name;
      }
      if (userData.city != null){
        this.form.city = userData.city;
      }
      if (userData.state != null){
        this.form.state = userData.state;
      }
      if (userData.country != null){
        this.form.country = userData.country;
      }
      if (userData.organization != null){
        this.form.organization = userData.organization;
      }
      if (userData.profession != null){
        this.form.profession = userData.profession;
      }


      return this.$store.state.auth.user
    }
  },


}
</script>

<style scoped>

</style>
