<template>
    <div>
        <h1>Create A Post</h1>
        <form @submit.prevent="addPost">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Title:</label>
                        <input type="text" class="form-control" v-model="post.title">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Subtitle:</label>
                        <input type="text" class="form-control" v-model="post.subtitle">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Image URL:</label>
                        <input type="text" class="form-control" v-model="post.image_url">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Body:</label>
                        <textarea class="form-control" v-model="post.body" rows="5"></textarea>
                    </div>
                </div>
            </div><br />
            <div class="form-group">
                <button class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
</template>

<script>
  import axios from 'axios';

  export default {
    data() {
      return {
        post: {}
      }
    },
    methods: {
      addPost(){
        let uri = '/api/post/create';
        axios.post(uri, this.post).then((response) => {
          this.$router.push({name: 'posts'});
        });
      }
    }
  }
</script>