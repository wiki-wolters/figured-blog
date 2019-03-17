<template>
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="#">Figured Blog</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <router-link :to="{name: 'post.create'}" class="nav-link">Create Post</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link :to="{name: 'posts'}" class="nav-link">Posts</router-link>
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="#" @click.prevent="logout">Log out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<style>
    .navbar {
        margin-bottom: 15px;
    }
</style>

<script>
  export default{
    methods: {
      logout:function(){
        axios.post('/admin/logout').then(response => {
          window.location.reload();
        });
      },
    }
  }
</script>