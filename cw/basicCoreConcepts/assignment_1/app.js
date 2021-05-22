const app = Vue.createApp({
    data(){
        return{
            myName: 'Anna',
            myAge: 21,
            myImg: 'https://etutor-images-common.s3.eu-central-1.amazonaws.com/blog/content/ZgrHaRiSPnerhQ1UI8O5b.png'
        }
    },
    methods: {
        calculateAge(){
            return this.myAge + 5;
        }
    }
});

app.mount('#assignment');