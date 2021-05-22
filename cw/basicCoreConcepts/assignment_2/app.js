const app = Vue.createApp({
    data(){
        return{
            text: '',
            conform: ''
        }
    }, 
    methods:{
        showAlert(){
            alert('Alert!!!');
        },
        displayDown(event){
            this.text =  event.target.value;
        }, 
        confirmInput(){
            this.conform = this.text;
        }
    }

});

app.mount('#assignment');