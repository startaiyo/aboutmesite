<template>
  <div>

    <div class = "profile">
      <h2>My Profile</h2>
    </div>
    <div class = "history">
      <h2>My History</h2>
      <ul class="timeline">
        <li>
          <p class="timeline-date">2007年2月</p>
          <div class="timeline-content">
            <button v-on:click="openModal()">1998</button>
            <p>ワーホリビザで渡加。アクセサリーショップ等でバイト。カナダ生活を満喫。</p>
          </div>
        </li>
        <li>
          <p class="timeline-date">2008年3月</p>
          <div class="timeline-content">
            <h3>Webの専門学校に入学</h3>
            <p>有給インターンシップ付きの一年プログラムを受講。HTML、CSS、JavaScript、PHP等のコーディングやWebデザインの基礎を学ぶ。</p>
          </div>
        </li>
        <li>
          <p class="timeline-date">2009年2月</p>
          <div class="timeline-content">
            <h3>バンクーバーのWeb制作会社でWebデザイナーとして働く</h3>
            <p>私以外全員カナダ人という環境で英語やWebの技術を学びながら必死に働く</p>
          </div>
        </li>
      </ul>
      <div id="overlay" v-show="showContent" v-on:click="closeModal">
        <div id="content">
          <p>これがモーダルウィンドウです。</p>
          <p><button v-on:click="closeModal">close</button></p>
        </div>
      </div>
    </div>
    <div class = "blogs">
      <h2>My Blogs</h2>
  <v-carousel 
    cycle
    :show-arrows="false"
    style="width:50%">
    <v-carousel-item
      v-for="(item,i) in items"
      :key="i"
      :src="item.src"
      reverse-transition="fade-transition"
      transition="fade-transition"
    ></v-carousel-item>
  </v-carousel>
    </div>
    <div class = "works">
      <h2>My Works</h2>
      <works></works>
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
.timeline {
  list-style: none;
}
.timeline > li {
  margin-bottom: 60px;
}

/* for Desktop */
@media ( min-width : 640px ){
  .timeline > li {
    overflow: hidden;
    margin: 0;
    position: relative;
  }
  .timeline-date {
    width: 110px;
    float: left;
    margin-top: 20px;
  }
  .timeline-content {
    width: 75%;
    float: left;
    border-left: 3px #e5e5d1 solid;
    padding-left: 30px;
  }
  .timeline-content:before {
    content: '';
    width: 12px;
    height: 12px;
    background: #6fc173;
    position: absolute;
    left: 106px;
    top: 24px;
    border-radius: 100%;
  }
}
</style>
<script>
export default {
  data() { 
    return{
      showContent: false,
      items: [
          {
            src: 'https://cdn.vuetifyjs.com/images/carousel/squirrel.jpg'
          },
          {
            src: 'https://cdn.vuetifyjs.com/images/carousel/sky.jpg'
          },
          {
            src: 'https://cdn.vuetifyjs.com/images/carousel/bird.jpg'
          },
          {
            src: 'https://cdn.vuetifyjs.com/images/carousel/planet.jpg'
          }
        ]
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