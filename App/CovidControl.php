<?php

namespace App;

use App\Observer\AObserver;

class CovidControl extends AObserver
{
    private $countries;

    public function setCountries(array $countries): CovidControl
    {
        $this->countries = $countries;
        return $this;
    }

    public function get()
    {
        //Получаем информацию по всем загруженным странам
        foreach ($this->countries as $countryСode) {
            $response = $this->getCountryInfo($countryСode);
            $this->notify('getCountryInfo', $countryСode, $response);
        }
    }

    public function getCountryInfo(string $countryСode)
    {

        $data = [
            "cId" => $countryСode,
            "infected" => 235074,
            "sick" => 24273,
            "recovered" => 201616,
            "dead" => 9185,
            "sickLast7" => 7383,
            "condition" => "Flattening",
            "lastUpdated" => 1598313600000,
            "start" => 1580256000000,
            "cases" => [
                235074,
                235074,
                234045,
                233710,
                232744,
                231068,
                229289,
                228914,
                228914,
                228914,
                228914,
                228914,
                222116,
                220727,
                218730,
                218481,
                217297,
                216819,
                215555,
                212249,
                212249,
                212249,
                211675,
                211457,
                211032,
                210467,
                208940,
                208199,
                207899,
                206920,
                206635,
                205928,
                205267,
                205090,
                204433,
                203787,
                203495,
                202888,
                202495,
                202013,
                201286,
                200825,
                200566,
                200218,
                199905,
                199665,
                199379,
                199222,
                198499,
                198369,
                198239,
                197852,
                197598,
                197317,
                196945,
                196469,
                195957,
                195529,
                195152,
                194839,
                194520,
                193937,
                193468,
                192706,
                191814,
                191487,
                190698,
                190542,
                190239,
                189515,
                189062,
                189062,
                189062,
                188232,
                188168,
                187730,
                187243,
                186938,
                186722,
                186480,
                186135,
                185944,
                185825,
                185825,
                185825,
                185825,
                185825,
                183758,
                183018,
                183018,
                181819,
                181388,
                181003,
                180662,
                180345,
                179706,
                179135,
                178433,
                177891,
                177315,
                176851,
                176352,
                175637,
                174824,
                173697,
                173278,
                172658,
                172073,
                171295,
                170134,
                168852,
                167665,
                166523,
                166061,
                165608,
                164797,
                163674,
                160577,
                159600,
                159103,
                158247,
                157431,
                155597,
                153643,
                151177,
                149005,
                147328,
                145680,
                143986,
                141457,
                138423,
                135073,
                132278,
                130162,
                127932,
                125811,
                122332,
                118215,
                110355,
                106573,
                103483,
                99788,
                94915,
                89923,
                83986,
                77177,
                70759,
                64937,
                62373,
                54268,
                49039,
                42467,
                37723,
                35740,
                31370,
                27151,
                24790,
                21724,
                17736,
                15320,
                12327,
                9360,
                7248,
                5741,
                4535,
                3674,
                2722,
                1953,
                1517,
                1112,
                847,
                684,
                534,
                354,
                240,
                186,
                148,
                115,
                64,
                51,
                24,
                19,
                16,
                14,
                14,
                14,
                14,
                14,
                14,
                14,
                12,
                11,
                10,
                8,
                7,
                5,
                4
            ],
            "news" => [
                [
                    "title" => "Germany Faces a ‘Roller Coaster’ as Schools Reopen Amid Coronavirus",
                    "date" => 1598432400000,
                    "pub" => "The New York Times",
                    "link" => "https://www.nytimes.com/2020/08/26/world/europe/germany-schools-virus-reopening.html"
                ],
                [
                    "title" => "Covid-19 Live Updates",
                    "date" => 1598458050000,
                    "pub" => "The New York Times",
                    "link" => "https://www.nytimes.com/2020/08/26/world/covid-19-coronavirus.html"
                ],
                [
                    "title" => "Germany Boosts Already Hefty Coronavirus Stimulus",
                    "date" => 1598440140000,
                    "pub" => "The Wall Street Journal",
                    "link" => "https://www.wsj.com/articles/germany-boosts-already-hefty-coronavirus-stimulus-11598440184"
                ],
                [
                    "title" => "European stocks close higher as Germany extends COVID-19 relief package",
                    "date" => 1598434380000,
                    "pub" => "MarketWatch",
                    "link" => "https://www.marketwatch.com/story/european-stocks-climb-as-germany-extends-covid-19-relief-package-11598434381"
                ],
                [
                    "title" => "Germany's confirmed coronavirus cases rise by 1,576 to 236,429 => RKI",
                    "date" => 1598415300000,
                    "pub" => "Reuters",
                    "link" => "https://www.reuters.com/article/us-health-coronavirus-germany-cases/germanys-confirmed-coronavirus-cases-rise-by-1576-to-236429-rki-idUSKBN25M0B3"
                ],
                [
                    "title" => "German Concert Experiment Tests How Big Gatherings Spread COVID-19  => Coronavirus Live Updates",
                    "date" => 1598306773000,
                    "pub" => "NPR",
                    "link" => "https://www.npr.org/sections/coronavirus-live-updates/2020/08/24/905534790/german-experiment-tests-how-coronavirus-spreads-at-a-concert"
                ],
                [
                    "title" => "Coronavirus => Germany to ramp up quarantine checks on travelers returning from high-risk areas",
                    "date" => 1598438604000,
                    "pub" => "DW (English)",
                    "link" => "https://www.dw.com/en/coronavirus-germany-to-ramp-up-quarantine-checks-on-travelers-returning-from-high-risk-areas/a-54702157"
                ],
                [
                    "title" => "Coronavirus => Germany weighs curbs on parties as infections rise",
                    "date" => 1598221800000,
                    "pub" => "DW (English)",
                    "link" => "https://www.dw.com/en/coronavirus-germany-weighs-curbs-on-parties-as-infections-rise/a-54667706"
                ],
                [
                    "title" => "Germany’s New Coronavirus Infections Close to Four-Month High",
                    "date" => 1598334420000,
                    "pub" => "Bloomberg",
                    "link" => "https://www.bloomberg.com/news/articles/2020-08-25/germany-s-new-coronavirus-infections-close-to-four-month-high"
                ],
                [
                    "title" => "These German stocks are rising after the country extended coronavirus relief",
                    "date" => 1598450340000,
                    "pub" => "MarketWatch",
                    "link" => "https://www.marketwatch.com/story/these-german-stocks-are-rising-after-the-country-extended-coronavirus-relief-11598450393"
                ]
            ],
            "name" => "Germany",
            "recoveriesEstimated" => false,
            "lockdownInfo" => [
                "lockdown" => "No",
                "details" => "Nationwide, Germany has been gradually reopening and easing many lockdown restrictions. Although there is no nationwide stay-home order, people are advised to follow social distancing and required to wear a face mask on public transport and in shops. A minimum interpersonal distance of 1.5 metres must be maintained.\n\nAll shops have been allowed to reopen. Hospitals and care homes with no active coronavirus cases are allowed to start receiving visitors, with limitations. Essential stores such as grocery stores, supermarkets, drug stores, pharmacies and banks remain open. The only business that remains closed are cinemas, clubs, theaters, concert halls and opera houses, spas and saunas.\n",
                "lockdownInfoSource" => "https://de.usembassy.gov/covid-19-information/",
                "lockdownStartDate" => "2020-03-21",
                "touristEntry" => "Partially Allowed",
                "touristInfoSource" => "https://www.auswaertiges-amt.de/en/coronavirus/2317268",
                "touristInfo" => "Germany’s borders are open for travel within the EU, and domestic restrictions are being lifted. Citizens and residents of the following countries can travel to Germany =>\nEU countries, Switzerland, Norway, Liechtenstein, United Kingdom, Australia, Canada, Georgia, New Zealand, Thailand, Tunisia, and Uruguay.\n\nNon-German family members of German citizens and residents can also enter Germany, including unmarried partners, after providing the following: An invitation from the person residing in Germany; A jointly signed statement on the existence of the relationship; Proof of previous meetings with passport stamps, travel documents, or plane tickets.\n\nAll international arrivals will be required to self-quarantine for 14 days. This does not apply to permitted countries. Arrivals from high-risk countries will be tested. Random health test are also in place upon arrival.",
                "touristBanStart" => "2020-03-16",
                "events" => "Partially Allowed",
                "touristAttractions" => "Open",
                "lastUpdated" => "2020-08-24",
                "eventMoreInfo" => "Large-scale events are prohibited",
                "transportMoreInfo" => "Operational with restrictions",
                "shopping" => "Open",
                "restaurantsAndBars" => "Open with restrictions",
                "reg" => "Published 26.08.2020\n1. Passengers are not allowed to enter.\nThis does not apply to:\n- nationals of EEA Member States and Switzerland;\n- British nationals;\n- passengers arriving from Austria, Belgium, Bulgaria, Croatia, Cyprus, Czechia, Denmark, Estonia, Finland, France, Greece, Hungary, Iceland, Ireland (Rep.), Italy, Latvia, Liechtenstein, Lithuania, Luxembourg, Malta, Netherlands, Norway, Poland, Portugal, Romania, Slovakia, Slovenia, Spain, Sweden, Switze....",
                "regInt" => "1"
            ]
        ];

        return $data;
    }

    public static function get2()
    {
        $ch  = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => "https://prod.greatescape.co/api/travel/countries/DE/corona",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => [
                'method' => 'GET',
                'origin' => 'https://covidcontrols.co',
                'authorization' => 'bca2bb72bde384ebd3683bb0fe6e88a53ae6d097808170165d0c8d2a2e4086e5'
            ]
        ]);
        $response = curl_exec($ch);
        return $response;
    }
}
