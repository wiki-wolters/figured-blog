<template>
    <div>
        <Nav />
        <div class="container">
            <transition name="fade">
                <router-view></router-view>
            </transition>
        </div>
    </div>
</template>

<style>
    .dashboard-container {

    }
</style>

<script>
  import Nav from './Nav.vue';

  export default{
    components: {
      Nav
    }
  }
</script>