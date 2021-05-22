const app = Vue.createApp({
    data() {
        return{
            googleSearch: '',
            cities: window.cities,
        }

    },
    computed : {
        changeStyle() {
            return {
                results: this.googleSearch.length > 0
            }
        },
        filteredCities() {
            if (this.googleSearch.length === 0) {
                return [];
            }
            let returnedCities = [];
            let searchLowerCase = this.googleSearch.toLowerCase();

            this.cities.forEach((cityData) => {
                if (returnedCities.length === 10 || !cityData.nameLowerCase.includes(searchLowerCase)) {
                    return;
                }
                returnedCities.push({
                    name: cityData.name,
                    nameHtml: cityData.nameLowerCase.replace(searchLowerCase, (match) => {
                        return '<span class="bold">' + match + '</span>';
                    })
                })
            });

            return returnedCities;
        }
    }
});

app.mount('#vue-app');