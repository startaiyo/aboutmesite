<template>
  <div>

    <div class = "profile">
      <h2>My Profile</h2>
        <v-card
    class="mx-auto"
    max-width="434"
    tile
  >
    <v-img
      height="100%"
      src="https://cdn.vuetifyjs.com/images/cards/server-room.jpg"
    >
      <v-row
        align="end"
        class="fill-height"
      >
        <v-col
          align-self="start"
          class="pa-0"
          cols="12"
        >
          <v-avatar
            class="profile"
            color="grey"
            size="164"
            tile
          >
            <v-img src="/storage/IMG_0605.jpeg"></v-img>
          </v-avatar>
        </v-col>
        <v-col class="py-0">
          <v-list-item
            color="rgba(0, 0, 0, .4)"
            dark
          >
            <v-list-item-content>
              <v-list-item-title class="text-h6">
                Marcus Obrien
              </v-list-item-title>
              <v-list-item-subtitle>Network Engineer</v-list-item-subtitle>
            </v-list-item-content>
          </v-list-item>
        </v-col>
      </v-row>
    </v-img>
  </v-card>
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
      <h2>My Blogs (recent 4 contents)</h2>
  <v-sheet>
    <v-slide-group>
      <v-slide-item 
      v-for="blog in blogs" 
      v-bind:key="blog.id">
        <v-card style="margin: 0 20px 0 0; width: 320px; height: 240px;">
          <v-card-title>{{ blog.title }}</v-card-title>
          <v-card-text class="text--primary" style="overflow:hidden; white-space:nowrap; text-overflow:ellipsis">
          {{blog.text}}
          </v-card-text>
        </v-card>
      </v-slide-item>
    </v-slide-group>
  </v-sheet>
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
        ],
      blogs:[],
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
  created(){
    axios.get('/api/blogs')
    .then(res=>{this.blogs=res.data.blogs.slice(0,4)})
    .then(()=>{console.log(this.blogs)})
    .catch(e=>console.log(e));
  },
}
</script>