<template>
    <div>
        <h1>UserId: {{blog.id}}</h1>
        <form @submit.prevent="updateBlog">
            <div>
                <label for="title">title:</label>
                <input v-model="blog.title">
            </div>
            <div>
                <label for="text">text:</label>
                <input v-model="blog.text">
            </div>
            <button type="submit">edit</button>
        </form>
    </div>
</template>
<script>
export default {
    data() {
        return{
            id:this.$route.params.id,
            blog:{
                id:'',
                title:'',
                text:''
            }
        }    
    },
    methods:{
        updateBlog(){
            console.log(this.blog)
            axios.patch('/api/blogs/'+this.blog.id,{
                blog: this.blog
            })
            .then(res =>{
                this.blog=res.data.blog;
                // readを呼び出す
                this.$router.push({name: 'blogs_detail',params:{id: this.$route.params.id}})
            })
            .catch(e=>console.log(e));
        },
    },
    created(){
        axios.get('/api/blogs/'+this.id)
        .then(res=>this.blog=res.data.blog)
        .catch(e=>console.log(e));
    }
    
}
</script>