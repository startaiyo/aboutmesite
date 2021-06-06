<template>
<div>
    <h1>blogだよ</h1>
    <ul>
        <router-link  class="btn btn-primary" to="/blogs/create">作成</router-link>
        <li
        v-for="blog in blogs"
        v-bind:key="blog.id">{{blog.text}}
        <router-link :to ="`/blogs/${blog.id}`">detail</router-link>
        <router-link :to ="`/blogs/${blog.id}/edit`">edit</router-link>
        <span class="btn btn-danger" @click="blogsDelete(index, blog.id)">削除</span>
        </li>
    </ul>
</div>
</template>
<script>
export default {
    data(){
        return{
            blogs:[],
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
        }
    },
    created(){
        axios.get('/api/blogs')
        .then(res=>{this.blogs = res.data.blogs})
        .catch(e=>{console.log(e);});
    },
}
</script>
