<template>
<div>
<li v-bind:key="question.id" v-for="question in questions">{{question.question}}
 <div v-if="question.right_answer2==null">
<input type="radio" :id="question.id" :name="question.id" :value="question.answer1" v-model="radio" checked>
<label >{{question.answer1}}</label>
 <input type="radio" :id="question.id" :name="question.id" :value="question.answer2" v-model="radio">
<label>{{question.answer2}}</label>
 <input type="radio" :id="question.id" :name="question.id" :value="question.answer3" v-model="radio">
<label >{{question.answer3}}</label>
<button :id="question.id" v-on:click="checkRadio" type="button" >Ответить</button>

 </div>

<div v-else>

 
  <input type="checkbox" :id="question.id" :name="1" :value="question.answer1" v-model="checkedNames">
<label >{{question.answer1}}</label>
 <input type="checkbox" :id="question.id" :name="2" :value="question.answer2" v-model="checkedNames">
<label >{{question.answer2}}</label>
 <input type="checkbox" :id="question.id" :name="question.id" :value="question.answer3" v-model="checkedNames">
<label >{{question.answer3}}</label>

<button  :id="question.id" v-on:click="checkChecked" type="button" >Ответить</button>

 </div>
 </li>

 </div>
 </template>

<script>
 export default {
  
 data: function () {
 return {
    questions:null,
    checkedNames: [],
 
 }
 },
 mounted() {
    axios
      .get('/api/v1/companies/index')
      .then(response => (this.questions = response.data));
  },

 methods: {
checkRadio:
function(event){

 
  let id=event.target.id;
  let rightAnswer1=this.findId(id,"right_answer1");
  return   this.radio==rightAnswer1 ?   alert("правильный ответ") : alert("Неправильный ответ");
    

},
findId:
function(id,right_answer) {
   for (var i = 0; i < this.questions.length; i++) {
      if (this.questions[i].id == id) {
        if(right_answer=="right_answer1"){
          return this.questions[i].right_answer1;
        }
        else{
          return this.questions[i].right_answer2;
        }
        }
         
    }
},
checkChecked:
function(event) {
let id=event.target.id;
let rightAnswer1=this.findId(id,'right_answer1');
let rightAnswer2=this.findId(id,'right_answer2');
return   this.checkedNames[0]==rightAnswer1 || rightAnswer2 && this.checkedNames[1]==rightAnswer1 || rightAnswer2 ? alert("Правильный ответ") : alert("Неправильный ответ");
}
}
 }
</script>