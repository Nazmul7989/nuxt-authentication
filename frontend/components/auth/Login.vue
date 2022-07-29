<template>
  <main class="d-flex w-100 h-100">
    <div class="container d-flex flex-column">
      <div class="row vh-100">
        <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
          <div class="d-table-cell align-middle">

            <div class="text-center mt-4">
              <h1 class="h2">Welcome back</h1>
              <p class="lead">
                Sign in to your account to continue
              </p>
            </div>

            <div class="card">
              <div class="card-body">
                <div class="m-sm-4">
                  <div class="text-center">
                    <img src="~/assets/img/avatars/avatar.jpg" alt="Charles Hall"
                         class="img-fluid rounded-circle" width="132" height="132" />
                  </div>
                  <form @submit.prevent="login">
                    <div class="mb-3">
                      <label class="form-label">Email</label>
                      <input class="form-control form-control-lg"
                             type="email" v-model="formData.email" name="email"
                             placeholder="Enter your email" />
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Password</label>
                      <input class="form-control form-control-lg"
                             type="password" v-model="formData.password"
                             name="password"
                             placeholder="Enter your password" />
                    </div>
                    <div>
                      <label >
                        Don't have an Account?
                        <NuxtLink :to="{name : 'register'}" class="form-check-label">
													 Register Here...
												</NuxtLink>
                      </label>
                    </div>
                    <div class="text-center mt-3">
                       <button type="submit" class="btn btn-lg btn-primary">Sign in</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </main>
</template>

<script>
export default {
  name: "Login",
  data (){
    return {
      formData: {
        email: 'nazmul.ns7989@gmail.com',
        password: '12345678',
      }
    }
  },
  methods: {
    async login(){
      try {
        let response = await this.$auth.loginWith('local', { data: this.formData })
        this.$toast.success('Logged In!')
      } catch (err) {
        console.log(err)
      }
    }
  }
}
</script>

<style scoped>

</style>
