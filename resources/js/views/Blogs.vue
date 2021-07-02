<template>
<div>
    <h1>startaiyoのblog</h1>
        <v-btn
          class="mx-2"
          fab
          dark
          large
          color="cyan"
          to="/blogs/create"
          v-if = "role==5"
        >
          <v-icon dark>
            mdi-pencil
          </v-icon>
        </v-btn>
    
    <v-layout class="row" style="margin-top:10px">
    <div v-for="blog in blogs"
        v-bind:key="blog.id">
    <v-flex xs4>        
    <v-card
        class="mx-auto"
        min-width="344"
    >

        <v-card-title>
        {{blog.title}}
        </v-card-title>

        <v-card-subtitle style="overflow:hidden; white-space:nowrap; text-overflow:ellipsis">
        {{blog.text}}
        </v-card-subtitle>
        <v-card-subtitle style="font-size:5px;">
            作成日時:{{formatDate(blog.created_at)}}
        </v-card-subtitle>

        <v-card-actions>
        <router-link :to ="`/blogs/${blog.id}`"><v-btn>detail</v-btn></router-link>
        <router-link :to ="`/blogs/${blog.id}/edit`" v-if = "role==5"><v-btn>edit</v-btn></router-link>
        <span class="btn btn-danger" @click="blogsDelete(index, blog.id)" v-if = "role==5">削除</span>
        <v-spacer></v-spacer>

        <v-btn
            icon
            @click="showDetail(blog.id)"
            v-if="show!=blog.id"
        >
            <v-icon>{{'mdi-chevron-up'}}</v-icon>
        </v-btn>
        <v-btn
            @click="closeDetail(blog.id)" 
            v-if="show==blog.id"
        >
            <v-icon>{{'mdi-chevron-down'}}</v-icon>
        </v-btn>
        </v-card-actions>

        <v-expand-transition>
        <div v-show="show==blog.id">
            <v-divider></v-divider>

            <v-card-text>
            {{blog.text}}
            </v-card-text>
        </div>
        </v-expand-transition>
    </v-card>
    </v-flex>
    </div>
    </v-layout>
    
</div>
</template>
<script>
import moment from "moment"
import Vue from "vue";
export default {
    props:{
        role: String,
    },
    data(){
        return{
            blogs:[],
            show:false
        }
    },
    methods:{
        blogsDelete(index,id){
            axios.delete('/api/blogs/'+id)
            .then(res=>{
                this.blogs.slice(id,1)
                this.$router.go('blogs')
            })
            .catch(e=>{console.log(e)});
        },
        formatDate(date){
            if (!!date) return moment(date).format("YYYY年MM月DD日 dddd hh:mm:ss")
        },
        showDetail(id){
            this.show=id
        },
        closeDetail(){
            this.show=false
        }
    },
    created(){
        axios.get('/api/blogs')
        .then(res=>{this.blogs = res.data.blogs})
        .catch(e=>{console.log(e);});
    },
}
Vue.component('blog-card',{
    data: function(){
        return{
            show:false,
        }
    },
    template:''
},
)
</script>
