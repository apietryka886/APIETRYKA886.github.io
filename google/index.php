<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8"/>
        <title>Google_Zadanie_TI</title>
        <link rel="stylesheet" href="search_style.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="autocompleter.css">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
        <script src="https://unpkg.com/vue"></script>
        <script src="https://cdnjs.com/libraries/jquery-throttle-debounce"></script>
    </head>
    <body>     
        <div class="all" id="app" :class="[ googleSearch.length != 0 && isActive == 1 ? 'results' : isActive = 0 ]" >  
            <div class="top"> 
                <div class="top_box">
                    <div class="top_items">
                        <a class="it_top" href="https://mail.google.com/mail/&ogbl">Gmail</a>
                        <a class="it_top" href="https://www.google.pl/imghp?h1=pl&ogbl">Grafika</a>
                        <div class="dots">
                            <img class="dots_img" src="aplication_dots.jpg" alt="dots_aplication">
                        </div>
                        <button class="blue_login" type="button">Zaloguj się</button>
                    </div>
                </div>
            </div>
            <div class="center">
                <div class="logo_google">
                    <img class="google" src="googlelogo_color_272x92dp.png" alt="logo_google_img">
                </div>
                <div class="search_space">
                    <v-autocompleter 
                        v-model = "googleSearch"
                        :options="cities"
                        ref="first"
                        @input="googleSearch = $event"
                        @enter="zmien">
                    </v-autocompleter>
                    <div class="search_buttons">
                        <div class="buttons">
                            <button class="button_st" type="button">Szukaj w Google</button> 
                            <button class="button_nd" type="button">Szczęśliwy traf</button>
                        </div>
                    </div>
                    <div class="empty-space"></div>   
                </div>
            </div>
            <div class="bottom">
                <div class="country">Polska</div>
                <div class="other">
                    <div class="line_2">
                        <a class="other_tekst" href="https://about.google/?utm_source=google-PL&utm_medium=referral&utm_campaign=hp-footer&fg=1">O nas</a>
                        <a class="other_tekst" href="https://www.google.com/intl/pl_pl/ads/?subid=ww-ww-et-g-awa-a-g_hpafoot1_1!o2&utm_source=google.com&utm_medium=referral&utm_campaign=google_hpafooter&fg=1">Reklamuj się</a>
                        <a class="other_tekst" href="https://www.google.com/services/?subid=ww-ww-et-g-awa-a-g_hpbfoot1_1!o2&utm_source=google.com&utm_medium=referral&utm_campaign=google_hpbfooter&fg=1">Dla firm</a>
                        <a class="other_tekst" href="https://google.com/search/howsearchworks/?fg=1">Jak działa wyszukiwarka</a>
                    </div>
                    <div class="line_1">
                        <a class="extra" href="https://sustainability.google/intl/pl/commitments-europe/?utm_source=googlehpfooter&utm_medium=housepromos&utm_campaign=bottom-footer&utm_content=">
                            <img class="leaf" src="leaf.png" alt="carbon_neutrality_img">
                            <span class="leaf_tekst">Neutralność węglowa od 2007 roku</span>
                        </a>
                    </div>
                    <div class="line_3">
                        <a class="other_tekst" href="https://policies.google.com/privacy?hl=pl&fg=1">Prywatność</a>
                        <a class="other_tekst" href="https://policies.google.com/terms?hl=pl&fg=1">Warunki</a>
                        <a class="other_tekst" href="https://pl.search.yahoo.com/search?fr=mcafee_uninternational&type=E211PL850G0&p=ustawienia+google">Ustawienia</a>
                    </div>
                </div>
            </div>
            <div class="first-line">
                <img class="logo" src="googlelogo_color_272x92dp.png" alt="Google" height="30" width="92">       
                <div class="serch-space">
                    <v-autocompleter 
                        :value = "googleSearch"
                        :options="cities"
                        @input="googleSearch = $event"
                        @enter="zmien"
                        ref="second"
                        >
                    </v-autocompleter>
                    <input v-model="googleSearch" v-on:click="ustaw()" type="text" class="search-text" maxlength="2048" title="Szukaj" value="jakiś wynik wyszukiwania" aria-label="Szukaj" ref="second"> 
                    <div class="icons">
                        <img src="x.png" width="14" height="14" alt="cross photo" class="cross-item">
                        <span class="horizontal-line"></span>
                        <img src="tia.png"  alt="keybord photo" class="keybord">
                        <img src="microphone.png" width="14px" alt="microphone photo" class="microphone">
                        <img src="lupe_blue.jpg" width="18px" alt="blue lupe photo" class="lupe-blue">
                    </div> 
                </div>
                <img src="aplication_dots.jpg" width = "17px" height="17px" alt="apication dots" class="menu_dots">
                <a href="https://accounts.google.com/signin/v2/identifier?hl=pl&passive=true&continue=https%3A%2F%2Fwww.google.com%2Fsearch%3Fq%3Djaki%25C5%259B%2Bwynik%2Bwyszukiwania%26ei%3D3QdnYLzPGNak3AO25pqgAg%26oq%3Djaki%25C5%259B%2Bwynik%2Bwyszukiwania%26gs_lcp%3DCgdnd3Mtd2l6EAM6BwgAEEcQsAM6BwghEAoQoAE6BQghEKABUPYFWKYQYIwRaAFwAngAgAGXAYgBrASSAQMyLjOYAQCgAQGqAQdnd3Mtd2l6yAEIwAEB%26sclient%3Dgws-wiz%26ved%3D0ahUKEwj8sYj-wd_vAhVWEncKHTazBiQQ4dUDCA0%26uact%3D5&ec=GAZAAQ&flowName=GlifWebSignIn&flowEntry=ServiceLogin" class="log-button">Zaloguj się</a>
            </div>
            <div class="second-line">
                <div class="mark-text">
                    <div class="wszystko styl">
                            <svg class="lupka" focusable="false" viewBox="0 0 24 24">
                                <path fill="#34a853" d="M10 2v2a6 6 0 0 1 6 6h2a8 8 0 0 0-8-8"></path>
                                <path fill="#ea4335" d="M10 4V2a8 8 0 0 0-8 8h2c0-3.3 2.7-6 6-6"></path>
                                <path fill="#fbbc04" d="M4 10H2a8 8 0 0 0 8 8v-2c-3.3 0-6-2.69-6-6"></path>
                                <path fill="#4285f4" d="M22 20.59l-5.69-5.69A7.96 7.96 0 0 0 18 10h-2a6 6 0 0 1-6 6v2c1.85 0 3.52-.64 4.88-1.68l5.69 5.69L22 20.59"></path>
                            </svg>
                        Wszystko</div>
                    <div class="widomosci styl">
                        <svg class="wido-photo" focusable="false" viewBox="0 0 24 24">
                            <path d="M12 11h6v2h-6v-2zm-6 6h12v-2H6v2zm0-4h4V7H6v6zm16-7.22v12.44c0 1.54-1.34 2.78-3 2.78H5c-1.64 0-3-1.25-3-2.78V5.78C2 4.26 3.36 3 5 3h14c1.64 0 3 1.25 3 2.78zM19.99 12V5.78c0-.42-.46-.78-1-.78H5c-.54 0-1 .36-1 .78v12.44c0 .42.46.78 1 .78h14c.54 0 1-.36 1-.78V12zM12 9h6V7h-6v2"></path>
                        </svg>
                        Wiadomości</div>
                    <div class="grafika styl">
                        <svg class="grafika-photo" focusable="false" viewBox="0 0 24 24">
                            <path d="M14 13l4 5H6l4-4 1.79 1.78L14 13zm-6.01-2.99A2 2 0 0 0 8 6a2 2 0 0 0-.01 4.01zM22 5v14a3 3 0 0 1-3 2.99H5c-1.64 0-3-1.36-3-3V5c0-1.64 1.36-3 3-3h14c1.65 0 3 1.36 3 3zm-2.01 0a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h7v-.01h7a1 1 0 0 0 1-1V5"></path>
                        </svg>
                        Grafika</div>
                    <div class="wideo styl">
                        <svg class="wideo-photo" focusable="false" viewBox="0 0 24 24">
                            <path d="M10 16.5l6-4.5-6-4.5v9zM5 20h14a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1zm14.5 2H5a3 3 0 0 1-3-3V4.4A2.4 2.4 0 0 1 4.4 2h15.2A2.4 2.4 0 0 1 22 4.4v15.1a2.5 2.5 0 0 1-2.5 2.5"></path>
                        </svg>
                        Wideo</div>
                    <div class="mapy styl ">
                        <svg class="mapy-photo" focusable="false" viewBox="0 0 16 16">
                            <path d="M7.503 0c3.09 0 5.502 2.487 5.502 5.427 0 2.337-1.13 3.694-2.26 5.05-.454.528-.906 1.13-1.358 1.734-.452.603-.754 1.508-.98 1.96-.226.452-.377.829-.904.829-.528 0-.678-.377-.905-.83-.226-.451-.527-1.356-.98-1.959-.452-.603-.904-1.206-1.356-1.734C3.132 9.121 2 7.764 2 5.427 2 2.487 4.412 0 7.503 0zm0 1.364c-2.283 0-4.14 1.822-4.14 4.063 0 1.843.86 2.873 1.946 4.177.468.547.942 1.178 1.4 1.79.34.452.596.99.794 1.444.198-.455.453-.992.793-1.445.459-.61.931-1.242 1.413-1.803 1.074-1.29 1.933-2.32 1.933-4.163 0-2.24-1.858-4.063-4.139-4.063zm0 2.734a1.33 1.33 0 11-.001 2.658 1.33 1.33 0 010-2.658"></path>
                        </svg>
                        Mapy</div>
                    <div class="wiecej styl">
                        <svg class="wiecej-photo" focusable="false" viewBox="0 0 24 24">
                            <path d="M12 8c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm0 2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"></path>
                        </svg>
                        Więcej</div>
                    <div class="ustawienia styl">Ustawienia</div>
                    <div class="narzedzia styl">Narzędzia</div>
                </div>
            </div>
            <div class="three-line">
                <div class="search-time">Około 8 340 000 wyników (0,43 s)</div>
            </div>
            <div class="wyszukiwania" id = "probuje">
                <div class="w">
                    <div class="link">https://www.pozycjonusz.pl> rodzaje-wynikow-wyszukiw...</div>
                    <h3 class="naglowek-wyszukiwania">Rodzaje wyników wyszukiwania Google - ponad 20 ...</h3>
                    <div class="opis">7) Wewnętrzna wyszukiwarka. Rodzaje wyników wyszukiwania Google wzbogacono jakiś czas temu o funkcję wewnętrznej wyszukiwarki. To rozwiązanie, bez ...</div>
                </div>
                <div class="w">
                    <div class="link">https://support.google.com > websearch > answer</div>
                    <h3 class="naglowek-wyszukiwania">Sprawdzanie wyników wyszukiwania podróży przez Gmiala ...</h3>
                    <div class="opis">Prywatność wyników wyszukiwania. Wyniki z Twoich usług Google są prywatne. Twoich informacji nie zobaczy w swoich wynikach nikt inny, chyba że na to ...</div>
                </div>
                <div class="w">
                    <div class="link">https://support.google.com > websearch > answer</div>
                    <h3 class="naglowek-wyszukiwania">Zawężanie wyników wyszukiwania - Wyszukiwarka Google ...</h3>
                    <div class="opis">Możesz zwiększyć precyzję wyników wyszukiwania, używając w zapytaniu słów i symboli. Wyszukiwarka Google zwykle ignoruje znaki interpunkcyjne, które nie ...</div>
                </div>
                <div class="w">
                    <div class="link">https://widoczni.com › blog › jak-wyszukiwac-w-google
                        </div>
                    <h3 class="naglowek-wyszukiwania">14 sposobów wyszukiwania w Google, których 95% z Was nie ...</h3>
                    <div class="opis">Szukanie fraz w adresie url. Możemy ograniczyć wyniki wyszukiwania tylko do stron, które zawierają określone słowo w adresie url. Można to wykorzystać na ...</div>
                </div>
                <div class="w">
                    <div class="link"> https://wiwi.pl › Blog
                        </div>
                    <h3 class="naglowek-wyszukiwania">Wyniki wyszukiwania Google: 10 przykładów - Agencja ...</h3>
                    <div class="opis">10 wrz 2020 — A jest tego dużo, dużo więcej. Poznaj przykłady, w jaki sposób Google pomaga użytkownikom Internetu odnaleźć potrzebne wiadomości. Spis ...</div>
                </div>
                <div class="w">
                    <div class="link">https://verseo.pl › Blog</div>
                    <h3 class="naglowek-wyszukiwania">Wyniki wyszukiwania - rodzaje - Blog Verseo</h3>
                    <div class="opis">23 sie 2018 — Wyniki wyszukiwania widoczne w Google - i ich rodzaje - to ... otwarcia, informacją o dystansie, jaki nas dzieli od siedziby danej firmy.</div>
                </div>
                <div class="w">
                    <div class="link">https://www.telepolis.pl › Artykuły › Akcje partnerskie
                        </div>
                    <h3 class="naglowek-wyszukiwania">Wyszukiwarka Google powie więcej o wynikach wyszukiwania ...</h3>
                    <div class="opis">2 lut 2021 — Szczegóły wyników wyszukiwania w Google ... „Od jutra pracujesz z domu” – część z nas te słowa usłyszało jakiś rok temu, inni nadal siedzą w ...</div>
                </div>
                <div class="w">
                    <div class="link">https://www.empressia.pl › blog › 115-rozne-wyniki-w...
                        </div>
                    <h3 class="naglowek-wyszukiwania">Wyniki wyszukiwań Google – skąd takie rozbieżności?</h3>
                    <div class="opis">P21 lut 2019 — Język, platforma i lokalizacja to 3 czynniki, które personalizują wyniki wyszukiwania użytkownikom Google. Danny Sullivan z siedziby giganta ...</div>
                </div>
                <div class="w">
                    <div class="link">https://marketingdlaludzi.pl › rozszerzone-wyniki-wysz...
                        </div>
                    <h3 class="naglowek-wyszukiwania">Inne typy wyników wyszukiwania | Marketing dla Ludzi</h3>
                    <div class="opis">2 paź 2018 — Wyszukiwarka Google to nie tylko wyniki organiczne i Google Ads ... czy i w jaki sposób uzupełnione są opisy alternatywne oraz w jaki sposób ...</div>
                </div>
                <div class="w">
                    <div class="link">https://www.google.com › howsearchworks › algorithms</div>
                    <h3 class="naglowek-wyszukiwania">Jak działa wyszukiwarka Google | Algorytmy wyszukiwania</h3>
                    <div class="opis">Dowiedz się, w jaki sposób algorytmy wyszukiwania Google znajdują najbardziej trafne wyniki za pomocą metod takich jak analiza słów w wyszukiwanym haśle ...</div>
                </div>
                <div class="podobne-wyszukiwania">Podobne wyszukiwania</div>
                <div class="tabelka">
                    <div class="tabelka-col">
                        <div class="el b"><div class="mark"></div>
                        <b>Bezpłatna wyszukiwarka osób</b></div>
                        <div class="el b"><div class="mark"></div><b>Wyniki wyszukiwania</b></div>
                        <div class="el b"><div class="mark"></div><b>Najczęstsze wyszukiwania Google</b></div>
                        <div class="el b"><div class="mark"></div><b>Zaawansowane wyszukiwania</b></div>
                    </div>
                    <div class="tabelka-col">
                        <div class="el b"><div class="mark"></div><b>Google Trends</b></div>
                        <div class="el b"><div class="mark"></div><b>Sposoby wyszukiwania informacji w Internecie</b></div>
                        <div class="el b"><div class="mark"></div><b>Oto niektóre wyniki wyszukiwania</b></div>
                        <div class="el b"><div class="mark"></div><b>Otot niektóre wyniki wyszukiwania z Internetu</b></div>
                    </div>
                </div>
            </div>
            <footer class="last_line">
                <div class="country">
                    <div class="country-text">
                        <span class="pl">Polska</span>
                        <div class="town">
                            <span class="big-dot"></span>
                            <span class="city-name">Czechowice-Dziedzice</span>
                            <span class="char"> - </span>
                            <span class="interenet">Z Twojego adresu internetowego</span>
                            <span class="char"> - </span>
                            <span class="lokalizacja">Użyj dokładnej lokalizacji</span>
                            <span class="char"> - </span>
                            <span class="wiedza">Dowiedz się więcej</span>
                        </div>
                    </div>
                </div>
                <div class="inne">
                    <div class="inne-text">
                        <a href="#" class="fi">Pomoc</a>
                        <a href="#" class="fi">Prześlij opinię</a>
                        <a href="#" class="fi">Prywatność</a>
                        <a href="#" class="fi">Warunki</a>
                    </div>
                </div>
            </footer>     
        </div>
        <script src="autocompleter.js"></script>
        <script src="vue.js"></script>
    </body>
</html>