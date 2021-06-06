<template>
<div>
    <h1>blogだよ</h1>
    <ul>
        <li
        v-for="blog in blogs"
        v-bind:key="blog.id">{{blog.text}}
        <router-link :to ="`/blogs/${blog.id}`">detail</router-link>
        <router-link :to ="`/blogs/${blog.id}/edit`">edit</router-link>
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
    created(){
        axios.get('/api/blogs')
        .then(res=>{this.blogs = res.data.blogs})
        .catch(e=>{console.log(e);});
    },
}
</script>
