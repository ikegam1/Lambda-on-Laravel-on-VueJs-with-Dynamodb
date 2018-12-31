<template>
    <div class="container">
      <div class="row">
        <div class="col-md-12 jumbotron">
           <h1>温度と湿度を表示するLambda on Laravel</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 float-right">
          <div class="gtn-group">
            <span class="group-btn">
              <button class="btn btn-success" type="button" @click="getAll()">読みこむ </button>
            </span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <table class="table table-striped">
            <thead class="thead-dark">
              <tr>
                <th>id</th>
                <th>expire</th>
                <th>温度</th>
                <th>湿度</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="data in datas" v-bind:key="data.id">
                <td>{{data.id}}</td>
                <td>{{data.expire | moment("YYYY/MM/DD h:mm:ss a")}}</td>
                <td>{{data.d1}}℃</td>
                <td>{{data.d2}}%</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
</template>

<script>
    Vue.use(require('vue-moment'));

    export default {
        data(){
            return {
               datas: []
            }
        },
        methods:{
            getAll: function () { 
                axios.get('/api/dht22').then((res)=>{
                    let _datas = res.data
                    this.datas=[]
                    for (let d of _datas) {
                        if ('payload' in d){
                            console.log(d.payload);
                            this.datas.push(d.payload)
                        }
                    }
                })
            }
        },
        created(){
            const self = this
            self.getAll()
            setInterval(function() {self.getAll()}, 60*1000)
        }
    }
</script>
