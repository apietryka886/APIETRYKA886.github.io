const app = Vue.createApp({
    // wszytsko co użyje w data() bedzie kontrolowane prze vue w html'u
    // {{ }} -> ta skałdnia to iterpolacja
    data (){
        return{ // it always returs OBJECT
            courseGoal: 'Finish the coure and lear Vue!',
            vueLink: 'https://vuejs.org/v2/guide/installation.html'
        };  
    },
    methods: {
        outputGoals(){
            const RandomNumber  = Math.random();
            if(RandomNumber <0.5){
                return 'Lear Vue!!';
            }else{
                return 'Finish the course!';
            }
        }
    }
});

app.mount('#user-goal');