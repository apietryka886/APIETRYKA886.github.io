var app = new Vue({
    el: "#app",
    data: {
        googleSearch: "",
        cities: window.cities
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
    computed: {
        filtredCities: function(){
            let result = this.cities.filter(city => city.name.includes(this.googleSearch));
            if(result.length > 10){
                return result.slice(0, 10);
            }
            return result;
        }
    }
});