<template>
    <div>
        <h1 v-if="!id">Create Post</h1>
        <h1 v-if="id">Edit Post</h1>
        <form @submit.prevent="savePost">
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label>Post Title:</label>
                        <input type="text" class="form-control" v-model="post.title">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label>Subtitle:</label>
                        <input type="text" class="form-control" v-model="post.subtitle">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label>Image URL:</label>
                        <input type="text" class="form-control" v-model="post.image_url">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Post Body:</label>
                        <div class="editor-wrapper">
                            <VueEditor v-model="post.body" :editorToolbar="customToolbar"></VueEditor>
                        </div>
                    </div>
                </div>
            </div><br />
            <div class="form-group">
                <button v-if="id" class="btn btn-primary">Update</button>
                <button v-if="!id" class="btn btn-primary">Create</button>
                <router-link :to="{name: 'posts'}" class="btn btn-light">Cancel</router-link>
            </div>
        </form>
    </div>
</template>

<style>
    .editor-wrapper {
        background: #fff;
    }
</style>

<script>
  import axios from 'axios';
  import { VueEditor } from 'vue2-editor';

  export default {
    components: {
      VueEditor
    },
    props: {
      id: {
        type: String
      }
    },
    data() {
      return {
        post: {},
        customToolbar: [
          ['bold', 'italic', 'underline'],
          [{ 'list': 'ordered'}, { 'list': 'bullet' }],
          ['code-block']
        ]
      }
    },
    created() {
      this.loadPost();
    },
    updated() {
      //ensure form empties if route changes from edit to create
      if (this.id !== this.post._id) {
        this.loadPost();
      }
    },
    methods: {
      loadPost() {
        if (this.id) {
          let uri = `/api/post/${this.id}`;
          this.axios.get(uri).then((response) => {
            this.post = response.data;
          });
        } else {
           this.post = {};
        }
      },
      savePost() {
        if (this.id) {
          let uri = `/api/post/${this.id}`;
          axios.put(uri, this.post).then((response) => {
            this.$router.push({name: 'posts'});
          });
        } else {
          let uri = `/api/post/create`;
          axios.post(uri, this.post).then((response) => {
            this.$router.push({name: 'posts'});
          });
        }
      }
    }
  }
</script>