var app = new Vue({
    el: "#app",
    data: {
        googleSearch: '',
        isActive: false,
        cities: window.cities,
    },
    methods : {
        zmien(name) {
            this.googleSearch = name;
            this.isActive =  true;
        }
    },
    updated() {
        // this.$nextTick(() => {
        //     if (this.googleSearch.length > 0) {        
        //         this.$refs.second.focus();
        //     } else {
        //         this.$refs.first.focus();
        //     }
        // });
    },
});

/* PRZED WYŁĄCZENIEM KODU DO AUTOCOMPLETERA */
/*var app = new Vue({
    el: "#app",
    data: {
        googleSearch: '',
        cities: window.cities,
        isActive: 0,
        autocompleterIsActive: false,
        filteredCities: [],
        activeResult: 0
    },
    updated() {
        this.$nextTick(() => {
        if (this.googleSearch.length > 0) {        
        this.$refs.second.focus();
        } else {
        this.$refs.first.focus();
        }
        });
    },
    watch:{
        googleSearch(){
            if(this.autocompleterIsActive){
                return;
            }
            if(this.googleSearch.length === 0){
                filteredCities = [];
                return;
            }
            let returnedCities = [];

            this.cities.forEach((cityData) =>{
                if(returnedCities.length === 10 || !cityData.name.includes(this.googleSearch)){
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
        zmiana: function(a)
        {
            this.isActive = 1;
        },
        pogrubienie: function(a)
        {
            wyszukaj = this.googleSearch;
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
            this.googleSearch = this.filteredCities[index].name;
        }
    }
});*/