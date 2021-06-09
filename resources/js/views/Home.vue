<template>
  <div>
    <h1>Startaiyo's Portfolio</h1>
    <div class = "history">
      <h2>My History</h2>
      <light-timeline :items="items"></light-timeline>
      <div id="overlay" v-show="showContent" v-on:click="closeModal">
        <div id="content">
          <p>これがモーダルウィンドウです。</p>
          <p><button v-on:click="closeModal">close</button></p>
        </div>
      </div>
    </div>
    <div class = "blogs">
      <h2>My Blogs</h2>
    </div>
    <div class = "works">
      <h2>My Works</h2>
    </div>
  </div>
</template>
<style>
#overlay{
  z-index:1;
  position:fixed;
  top:0;
  left:0;
  width:100%;
  height:100%;
  background-color:rgba(0,0,0,0.5);
  display: flex;
  align-items: center;
  justify-content: center;
}
#content{
  z-index:2;
  width:50%;
  padding: 1em;
  background:#fff;
}
</style>
<script>
import Vue from 'vue';
import LightTimeline from 'vue-light-timeline';
Vue.use(LightTimeline);
export default {
  data() {
    const example1 = {
      title: "Title1",
      htmlMode:true,
      content:
        `<button v-on:click="openModal">1998</button>`
    };
    const example2 = {
      title: "Title2",
      content:
        "テストテストテストテストテストテストテストテストテストテストテストテストテストテストテスト"
    };
    const example3 = {
      title: "Title3",
      content:
        "テストテストテストテストテストテストテストテストテストテストテストテストテストテストテスト"
    };
    const items = [example1, example2, example3];    
    return{
      showContent: false,
      items
      }
  },
  methods:{
    openModal: function(){
      this.showContent = true
    },
    closeModal: function(){
      this.showContent = false
    }
  },
}
</script>