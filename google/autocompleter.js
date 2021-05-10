Vue.component('v-autocompleter', {
  props: ['options'],
  template: `
  <div v-autocompleter class="search_space">
        <div class="search">
            <div class="search_in">
                <img class="loupe" src="loupe.png" alt="loupe_img">
                <input v-model ="googleSearch" v-on:click="ustaw()" class="type_space" type="text" maxlenght="2048"  title="Szukaj" ref ="first">
                <img class="tia" src="tia.png" alt="tia_png">
            </div>
            <div class="space_under_search"></div>
                <div class="autocomplete" :class = "[googleSearch.length != 0 && filteredCities.length != 0 ? 'autocompleter' : 'bez']">
                    <ul class = "miasta" >
                        <li class="pojedynczy" v-for="city in filteredCities" v-on:click="zmiana(city.name)" role="listbox">
                            <img class="loupe" src="loupe.png" alt="loupe_img">
                            <div class="kazdy" v-html="pogrubienie(city.name)"></div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>`,
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
    filteredCities: function(){
        if(this.googleSearch.length > 0 ){
            let result = this.cities.filter(city => city.name.includes(this.googleSearch));
            if(result.length > 10){
                return result.slice(0, 10);
            }
            return result;
        }
    }
},
methods:{
    zmiana: function(a)
    {
        if(this.isActive == 0)
        {
            this.isActive = 1;
            this.googleSearch = a;
            el2 = document.getElementById("autocom");
            el2.blur();
            this.control = 0;
        }
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
    ustaw: function()
    {
        this.control = 1;
    }
}
})
