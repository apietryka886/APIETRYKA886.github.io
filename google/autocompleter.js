Vue.component("v-autocompleter",{
    data(){
        return{
            cities: window.cities,
            isActive: 0,
            autocompleterIsActive: false,
            filteredCities: [],
            activeResult: 0
        };
    },
    props:[
        'options',
        'value'
    ],
    /*props: {
        options:{
            type: Array,
            default: []
        },
        value: {
          type: String,
          default: ""
        }
    },*/
    template: `
    <div class="v-autocompleter">
        <div class="search_in">
            <img class="loupe" src="loupe.png" alt="loupe_img">
            <input 
                :value="value" 
                @keyup.down="goTo(activeResult + 1)"
                @keyup.up="goTo(activeResult - 1)"
                @input="metodaInput($event)"
                @keyup.enter="$emit('enter', value)"
                class="type_space" 
                type="text" 
                maxlenght="2048"  
                title="Szukaj"
                ref ="first"/>
            <img class="tia" src="tia.png" alt="tia_png">
        </div>
        <div class="space_under_search"></div>
            <div class="autocomplete" :class = "[value.length != 0 && filteredCities.length != 0 ? 'autocompleter' : 'bez']">
                <ul class = "miasta" >
                    <li class="pojedynczy" 
                        v-for="(city, index) in filteredCities" 
                        :class="{active : autocompleterIsActive && activeResult === index}"
                        
                        @click="$emit('enter', city.name)"
                        
                        role="listbox">
                        <img class="loupe" src="loupe.png" alt="loupe_img">
                        <div class="kazdy" v-html="pogrubienie(city.name)"></div>
                    </li>
                </ul>
            </div>
        </div>
    </div>`,
    watch:{
        value(){
            if(this.autocompleterIsActive){
                return;
            }
            if(this.value.length === 0){
                filteredCities = [];
                return;
            }
            let returnedCities = [];

            this.cities.forEach((cityData) =>{
                if(returnedCities.length === 10 || !cityData.name.includes(this.value)){
                    return;
                }
                returnedCities.push({
                    name: cityData.name,
                })
            });

            this.filteredCities = returnedCities;
        }
    },
    methods:{
        metodaInput(event) {
            this.$emit('input', event.target.value);
        },
        zmiana: function(a)
        {
            this.isActive = 1;
        },
        pogrubienie: function(a)
        {
            wyszukaj = this.value;
            var pom = a.split(wyszukaj);
            for(i = 0; i < pom.length; i++)
            {
                a = a.replace(pom[i], pom[i].bold());
            }
            return a;
        },
        goTo(index){
            if(!this.autocompleterIsActive){
                index = 0;
            }
            if(index > this.filteredCities.length - 1){
                index = 0;
            } else if(index < 0){
                index = this.filteredCities.length -1;
            }

            this.autocompleterIsActive = true;
            this.activeResult = index;
            this.$emit('input', this.filteredCities[index].name);
            // this.value = this.filteredCities[index].name;
        },
        enter(){
            this.$emit(my-enter)
        }
    }
})