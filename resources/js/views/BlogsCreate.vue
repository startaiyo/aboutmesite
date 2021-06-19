<template>
<div>
	<div>
	<h1>ブログ作成</h1>
	<form @submit.prevent="createBlogs">
		<div class="form-group">
			<label for="title">Title:</label>
			<v-col
			cols="12"
			sm="6"
			md="3"
			>
			<v-text-field
				label="タイトル"
				filled
				v-model="blog.title"
			></v-text-field>
			</v-col>
		</div>
		<div class="form-group">
			<label for="text">Text:</label>
			  <v-container fluid>
				<v-textarea
				name="input-7-1"
				filled
				label="本文入力"
				auto-grow
				v-model="blog.text" style="height:200px; width:300px;"
				></v-textarea>
			</v-container>
			
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