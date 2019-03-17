<template>
    <div>
        <h1>Posts</h1>
        <div class="row">
            <div class="col-md-10"></div>
            <div class="col-md-2">
                <router-link :to="{ name: 'post.create' }" class="btn btn-primary">Create Post</router-link>
            </div>
        </div><br />

        <table class="table table-hover">
            <thead>
            <tr>
                <th>Title</th>
                <th colspan="2" class="actions">Actions</th>
            </tr>
            </thead>
            <tbody>
                <tr v-for="post in laravelData.data" :key="post._id">
                    <td>{{ post.title }}</td>
                    <td><router-link :to="{name: 'post.edit', params: { id: post._id }}" class="btn btn-primary">Edit</router-link></td>
                    <td><button class="btn btn-danger" @click.prevent="deletePost(post)">Delete</button></td>
                </tr>
            </tbody>
        </table>

        <pagination :data="laravelData" @pagination-change-page="getResults"></pagination>
    </div>
</template>

<style>
    table .actions {
        width: 10%;
        max-width: 80px;
    }
</style>

<script>
  import axios from 'axios';
  import pagination from 'laravel-vue-pagination';

  export default {
    components: {
      pagination
    },
    data() {
      return {
        laravelData: {}
      }
    },
    created() {
      this.getResults();
    },
    methods: {
      getResults(page = 1) {
        axios.get('/api/posts?page=' + page)
          .then(response => {
            this.laravelData = response.data;
          });
      },
      deletePost(post) {
        let uri = `/api/post/${post._id}`;
        axios.delete(uri).then(response => {
          this.laravelData.data.splice(this.laravelData.data.indexOf(post), 1);
        })
      }
    }
  }
</script>