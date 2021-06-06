<template>
    <div>
        <p>{{blog.id}}</p>
        <p>{{blog.title}}</p>
        <p>{{blog.text}}</p>
    </div>
</template>
<script>
export default {
    data() {
        return{
            id: this.$route.params.id,
            blog:''
        }
    },
    created(){
        axios.get('/api/blogs/' + this.id)
		.then(response => this.blog = response.data.blog)
		.catch(erorr => console.log(error));
    }
}
</script>