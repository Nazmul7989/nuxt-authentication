<template>
  <nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
      <nuxt-link to="/" class="sidebar-brand">
					<span class="sidebar-brand-text align-middle">
						Strise MVP
					</span>
        <svg class="sidebar-brand-icon align-middle" width="32px" height="32px" viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="1.5"
             stroke-linecap="square" stroke-linejoin="miter" color="#FFFFFF" style="margin-left: -3px">
          <path d="M12 4L20 8.00004L12 12L4 8.00004L12 4Z"></path>
          <path d="M20 12L12 16L4 12"></path>
          <path d="M20 16L12 20L4 16"></path>
        </svg>
      </nuxt-link>

      <div class="sidebar-user">
        <div class="d-flex justify-content-center">
          <div class="flex-shrink-0">
            <img v-if="user.profile_picture != null" :src="imageURL + user.profile_picture" class="avatar img-fluid rounded me-1" alt="" />
            <img v-else src="~/assets/img/avatars/user.jpg"
                 class="avatar img-fluid rounded me-1" alt="" />
          </div>
          <div class="flex-grow-1 ps-2">
            <a class="sidebar-user-title dropdown-toggle" v-if="loggedIn"
               data-bs-toggle="dropdown">
              {{ user.name }}
            </a>
            <div class="dropdown-menu dropdown-menu-start">
              <NuxtLink :to="{name : 'profile'}"  class="dropdown-item" >
                <i class="align-middle me-1" data-feather="user"></i>
                Profile
              </NuxtLink>
              <NuxtLink :to="{name : 'change-password'}" class="dropdown-item">
                <i class="align-middle me-1" data-feather="key"></i>
                Change Password
              </NuxtLink>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="pages-settings.html"><i class="align-middle me-1" data-feather="settings"></i> Settings &
                Privacy</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" @click.prevent="logout">Log out</a>
            </div>

            <div class="sidebar-user-subtitle">Designer</div>
          </div>
        </div>
      </div>

      <ul class="sidebar-nav">
        <li class="sidebar-header">
          Pages
        </li>
        <li class="sidebar-item active">
          <NuxtLink :to="{name: 'index'}" class="sidebar-link">
            <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboards</span>
          </NuxtLink>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link">
            <i class="align-middle" data-feather="users"></i> <span
            class="align-middle">Users</span>
          </a>
        </li>
      </ul>


    </div>
  </nav>
</template>

<script>
export default {
  name: "Sidebar",
  data(){
    return{
      imageURL: this.$config.imageUrl,
    }
  },
  computed: {
    user(){
      return this.$store.state.auth.user
    },
    loggedIn(){
      return this.$store.state.auth.loggedIn
    }
  },
  methods: {
    async logout(){
      await this.$auth.logout().then((res)=>{
        this.$router.push({name: 'login'})

        Toast.fire({
          icon: 'success',
          title: 'Logout successfully'
        })

      });
    }
  }
}
</script>

<style scoped>

</style>
