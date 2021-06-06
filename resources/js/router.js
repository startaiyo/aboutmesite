import VueRouter from "vue-router";
import Router from 'vue-router';
import Home from './views/Home.vue';
import NotFound from './views/NotFound.vue';
import Blogs from './views/Blogs.vue';
import BlogsDetail from './views/BlogsDetail.vue';
import BlogsEdit from './views/BlogsEdit.vue';

export default new Router({
    mode: 'history',
    routes: [
      {
        path: '*',
        component: NotFound
      },
      {
        path: '/',
        name: 'home',
        component: Home
      },
      {
        path: '/blogs',
        name: 'blogs',
        component: Blogs
      },
      {
        path: '/blogs/:id',
        name: 'blogs_detail',
        component: BlogsDetail
      },
      {
        path: '/blogs/:id/edit',
        name: 'blogs_edit',
        component: BlogsEdit
      },
    ]
  });