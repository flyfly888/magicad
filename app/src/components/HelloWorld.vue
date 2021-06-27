<template>
  <div class="hello">
    {{test}}
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'HelloWorld',
  data:() => ({
    axiosObj: null,
    test: ''
  }),
  props: {
    
  },
  created: function(){
    this.axiosObj = axios.create({
      baseURL: 'http://192.168.99.100:8080/api/',
      headers: {
      },
      //responseType: 'json' //default is json
    })
  },
  mounted: function(){
    let vm = this;
    this.axiosObj.get('test').then(function(response){
      console.log(response);
      vm.test = response.data;
    }).catch(function(error){
      console.log(error);
    })
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h3 {
  margin: 40px 0 0;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
</style>
