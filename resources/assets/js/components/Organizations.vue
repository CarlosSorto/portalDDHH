
<template>
    <section class="pv4">
        <div class="center tc">
            <h1 class="text--blue f2 fw4">Inicia tu Búsqueda</h1>
            <div class="w-100 center">
                <select class="pa2 input-reset ba bg-transparent b--silver silver w-20-l w-100 text--light-blue-50 mh0" v-model="workarea">
                    <option value="" class="text--light-blue-50">Áreas de especialización</option>
                    <option :value="workarea.id" class="text--light-blue-50" v-for="workarea in workareas">{{ workarea.name }}</option>
                </select>
                <select class="pa2 input-reset ba bg-transparent b--silver silver w-20-l w-100 text--light-blue-50 mh0" v-model="classification_id">
                    <option value="" class="text--light-blue-50">Clasf. Contemporanea</option>
                    <option :value="classification.id" class="text--light-blue-50" v-for="classification in classifications">{{ classification.name }}</option>
                </select>
                <select class="pa2 input-reset ba bg-transparent b--silver silver w-20-l w-100 text--light-blue-50 mh0" v-model="organization">
                    <option value="" class="text--light-blue-50">Nombre de la Organización</option>
                    <option :value="organization.id" class="text--light-blue-50" v-for="organization in list_organizations">{{ organization.name }}</option>
                </select>
                <select class="pa2 input-reset ba bg-transparent b--silver silver w-20-l w-100 mb2 text--light-blue-50 mh0" v-model="country">
                    <option value="" class="text--light-blue-50">Seleccione un País</option>
                    <option :value="country.iso" class="text--light-blue-50" v-for="country in countries">{{ country.name }}</option>
                </select>
                <a class="f5 bo--purple fw4 db link ba bw1 pv2 ph3-l text--purple hover-bg--purple hover-white bg-animate tc di-l" @click="get"><span class="icon-search"></span></a>
            </div>
            <div class="cf w-90-l w-100 mt4">
                <div class="fl w-70 dn db-l pl6">
                    <div id="vmap" style="width: 650px; height: 450px"></div>
                </div>
                <div class="fl w-100 w-30-l overflow-auto h6" >
                    <div class="flex flex-column flex-row-ns shadow-4 bg-white mb2" v-for="organization in organizations">
                        <div class="w-100 w-40-ns">
                            <img :src="'storage/' + organization.logo" alt="" class="h4 pa2">
                        </div>
                        <div class="mb4 mb0-ns w-100 w-60-ns">
                            <a :href="organization.website" target="_blank" class="link">
                                <p class="f6 fw6 text--blue h3" v-text="organization.name"></p>
                            </a>
                            <a :href="'/directorio-organizaciones/'+ organization.id" class="f6 fw4 tc center link ba bw1 white bo--purple text--purple pv2 w-100 ph4 hover-white hover-bg--purple">Más Información</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        props: ['workareas', 'classifications'],
        data() {
            return {
                organizations: [],
                classification_id: '',
                list_organizations: [],
                organization: '',
                country: '',
                workarea: '',
                meta: [],
                mapEl: null,
                isos: [],
                countries: [],
                queryCountry: {
                    "filter[q][iso|in][]": ['SV', 'GT', 'HN', 'CR', 'PA', 'NI'],
                    "filter[q][DefaultSort|scp]": 1
                },
                queryOrganization: {
                    "filter[q][active|eq]": 1,
                },
            }
        },
        mounted() {
            this.getOrganizations()
            this.get()
            this.initialize()
            this.getCountries()
            this.setVmapFocusRegion()
        },
        methods: {
            get() {
                axios.get('/api/organizations', {
                    params: {
                        "filter[q][active|eq]": 1,
                        "filter[q][country_id|eq]": this.country != null && this.country != ''  ? this.countries.find(d => d.iso == this.country).id : null,
                        "filter[q][id|eq]": this.organization,
                        "filter[q][classification_id|eq]": this.classification_id,
                        "filter[q][WorkArea|scp]": this.workarea
                    }
                }).then((response) => {
                    this.organizations = response.data.data
                    this.meta = response.data.meta
                });
            },
            getOrganizations() {
                axios.get('/api/organizations', {
                    params: {
                        "filter[q][active|eq]": 1,
                    }
                }).then((response) => {
                    this.list_organizations = response.data.data
                    this.meta = response.data.meta
                });
            },
            initialize()
            {
                this.mapEl = $('#vmap');
                this.mapEl.vectorMap({
                  backgroundColor: "#F5F9FF",
                  regionStyle: {
                    initial: {
                      fill: 'rgb(153, 153, 153)',
                      "fill-opacity": 1,
                      stroke: 'none',
                      "stroke-width": 0,
                      "stroke-opacity": 1
                    },
                    hover: {
                      "fill-opacity": 0.8,
                      fill: 'rgb(82, 109, 208)',
                      cursor: 'pointer'
                    },
                    selected: {
                      fill: 'rgb(82, 109, 208)'
                    },
                  },
                  map: 'world_mill',
                  zoomOnScroll: true,
                  regionsSelectable: true,
                  regionsSelectableOne: true,
                  onRegionSelected: this.regionSelected
                });
                return this.vmap = this.mapEl.vectorMap('get', 'mapObject');
            },
            getCountries()
            {
                axios.get('/api/countries', {
                    params: this.queryCountry
                  }).then( (response) => {
                    this.countries = response.data.data
                    this.getIsos(response.data.data)
                })
            },
            getIsos(arr)
            {
                arr.forEach((element) => {
                    this.isos.push(element.iso)
                })
            },
            setVmapFocusRegion(value){
              if (value == null) { value = 'GT'; }
              return this.mapEl.vectorMap('set', 'focus', {region: value});
            },
            selectVmapRegion(e){
                var value = this.country;
                if (value == null || value == '') {
                    this.vmap.clearSelectedRegions()
                }
                else {
                    this.vmap.clearSelectedRegions();
                    return this.vmap['regions'][value].element.setSelected(true);
                    this.get()
                }
            },
            regionSelected(event, code, isSelected, selectedRegions) {
                if (isSelected) {
                    if (this.isos.indexOf(code) >= 0) {
                        this.country = code
                        this.get()
                    }
                }
            },
        }
    }
</script>
<style media="screen">
    /* Enter and leave animations can use different */
    /* durations and timing functions.              */
    .slide-fade-enter-active {
        transition: all .3s ease;
    }
    .slide-fade-leave-active {
        transition: all .8s cubic-bezier(1.0, 0.5, 0.8, 1.0);
    }
    .slide-fade-enter, .slide-fade-leave-to
    /* .slide-fade-leave-active below version 2.1.8 */ {
        transform: translateX(10px);
        opacity: 0;
    }
    .active > a {
        color: #33425b;
        font-weight: 600;
    }

    .h6 {
        height: 25rem;
    }
</style>
