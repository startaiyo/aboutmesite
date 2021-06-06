<template>
<div>
	<div>
	<h1>ブログ作成</h1>
	<form @submit.prevent="createBlogs">
		<div class="form-group">
			<label for="title">Title:</label>
			<input v-model="blog.title">
		</div>
		<div class="form-group">
			<label for="text">Text:</label>
			<input v-model="blog.text">
		</div>
		<button type="submit">作成</button>
	</form>
	</div>
</div>
</template>
<script>
	export default {
		data(){
			return {
				blog:{
					title: '',
					text:'',
				}
			}
		},
		methods:{
			createBlogs(){
				axios.post('/api/blogs',{
					blog: this.blog
				})
				.then(response => {
					this.blog = response.data.blog;
					this.$router.push({ name: 'blogs'})
				})
				.catch(error => console.log(error));
			},
		}
	}
</script>