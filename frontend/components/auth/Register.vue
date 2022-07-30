<template>
  <main class="d-flex w-100 h-100">
    <div class="container d-flex flex-column">
      <div class="row vh-100">
        <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
          <div class="d-table-cell align-middle">

            <div class="text-center mt-4">
              <h1 class="h2">Get started</h1>
              <p class="lead">
                Start creating the best possible user experience for you customers.
              </p>
            </div>

            <div class="card">
              <div class="card-body">
                <div class="m-sm-4">
                  <form @submit.prevent="register" @keydown="form.onKeydown($event)">
                    <div class="mb-3">
                      <label class="form-label">Name</label>
                      <input class="form-control form-control-lg"
                             v-model="form.name"
                             type="text" name="name" placeholder="Enter your name" />
                      <div class="text-danger" v-if="form.errors.has('name')"
                            v-html="form.errors.get('name')" />

                    </div>

                    <div class="mb-3">
                      <label class="form-label">Email</label>
                      <input class="form-control form-control-lg"
                             v-model="form.email"
                             type="email" name="email" placeholder="Enter your email" />
                      <div class="text-danger" v-if="form.errors.has('email')"
                            v-html="form.errors.get('email')" />

                    </div>
                    <div class="mb-3">
                      <label class="form-label">Password</label>
                      <input class="form-control form-control-lg"
                             v-model="form.password"
                             type="password" name="password" placeholder="Enter password" />
                      <div class="text-danger" v-if="form.errors.has('password')"
                            v-html="form.errors.get('password')" />

                    </div>
                    <div class="mb-3">
                      <label class="form-label">Confirm Password</label>
                      <input class="form-control form-control-lg"
                             v-model="form.password_confirmation"
                             type="password" name="password"
                             placeholder="Enter confirm password" />
                      <div class="text-danger" v-if="form.errors.has('password_confirmation')"
                            v-html="form.errors.get('password_confirmation')" />

                    </div>
                    <div>
                      <label>
                        Already have an Account?
                        <NuxtLink :to="{name : 'login'}" class="form-check-label">
                          Login Here...
                        </NuxtLink>
                      </label>
                    </div>
                    <div class="text-center mt-3">
                       <button type="submit" :disabled="form.busy"
                               class="btn btn-lg btn-primary">Sign up</button>
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
  name: "Register",
  data (){
    return {
      form: this.$vform({
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
      })

    }
  },
  methods: {
    async register(){
      await this.form.post('/auth/register').then((res)=>{
        this.$router.push({name: 'login'})

        Toast.fire({
          icon: 'success',
          title: 'Sign Up successful'
        })

        //Login after Registration
        // this.$auth.setUserToken(res.data.access_token)

      })
    }
  }
}
</script>

<style scoped>

</style>
