const app = Vue.createApp({
    data (){
        return{ 
            counter: 0,
            name: '',
            confirmName: '',
            fullname: '',
            lastName: ''
        };  
    },
    // computed: {
    //     fullname(){
    //         console.log('Running again...');
    //         if(this.name === ''){
    //             return '';
    //         }
    //         return this.name + ' ' + 'Kowlska';
    //     }
    // },
    watch:{
        name(value){
            this.fullname = value + ' ' + 'Kowlaska';
        }
    },
    methods:{
        otputFullName(){
            console.log('Running again...');
            if(this.name === ''){
                return '';
            }
            return this.name + ' ' + 'Kowlska';
        },
        confirmInput(){
            this.confirmName = this.name;
        },
        setName(event, lastName){
            this.name = event.target.value;
        },
        add(num){
            this.counter = this.counter + num;
        },
        reduce(num){
            this.counter = this.counter - num;
        },
        resetInput(){
            this.name = '';
        }
        
    }
});
app.mount('#events');