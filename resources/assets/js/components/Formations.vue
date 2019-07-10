<template>
    <section class="pv4 bg--light-blue">
        <div class="mw8 center ph3-ns">
            <div class="w-100 center">
                <h1 class="tc text--blue fw4 f2">Busca una actividad de interés</h1>
                <p class="lh-copy f5 silver ma4 w-80 tc center">
                    A continuación se muestra un motor de búsqueda diseñado especialmente para facilitar la identificación de cursos, talleres, programas, encuentros u otras actividades implementadas a nivel de la región, que puedan resultar de interés en el fortalecimiento del área de derechos humanos.
                </p>
                <input type="text" class="pa2 input-reset ba dib bg-transparent b--light-silver br1 bw1 w-25-l w-100 ma0" placeholder="Palabra Clave" v-model="keyword">
                <select class="pa2 input-reset dib ba bg-transparent b--light-silver br1 bw1 w-25-l w-100 text--light-blue-50 ma0" v-model="modality">
                    <option value="" class="text--light-blue-50">Seleccione una Modalidad</option>
                    <option :value="modality.id" class="text--light-blue-50" v-for="modality in modalities">{{ modality.name }}</option>
                </select>
                <select class="pa2 input-reset dib ba bg-transparent b--light-silver br1 bw1 w-20-l w-100 text--light-blue-50 ma0" v-model="type">
                    <option value="" class="text--light-blue-50">Tipo de Formación</option>
                    <option :value="type.id" class="text--light-blue-50" v-for="type in types">{{ type.name }}</option>
                </select>
                <select class="pa2 input-reset dib ba bg-transparent b--light-silver br1 bw1 w-20-l w-100 text--light-blue-50 ma0" v-model="country_id">
                    <option value="" class="text--light-blue-50">Seleccione un País</option>
                    <option :value="country.id" class="text--light-blue-50" v-for="country in countries">{{ country.name }}</option>
                </select>
                <a @click="get" class="f5 bo--purple fw4 db link ba bw1 pv2 ph3-l text--purple hover-bg--purple hover-white bg-animate tc di-l"><span class="icon-search"></span></a>
            </div>
            <div v-if="formations.length">
            <div class="cf ph2-ns pa2 ">
                <div class="tr right pt4 pr3">
                    <a class="link" :class="grid ? 'text--blue' : 'light-silver'" @click="toggle('grid')"><span class="icon-grid f4 pa2"></span></a>
                    <a class="link" :class="list ? 'text--blue' : 'light-silver'" @click="toggle('list')"><span class="icon-list f4"></span></a>
                </div>
                    <div v-for="formation in formations" v-show="grid">
                        <div class="fl w-100 w-50-m w-third-l pa1">
                            <div class="ba bg-white b--black-10 mv4 w-100 mw6 center pa4 h6 shadow-5">
                                <h4 class="fw6 text--blue f5 h2">{{ formation.title }}</h4>
                                <p class="lh-copy f6 h3-l h4 mb4">{{ formation.description | truncate(125, '...') }}</p>
                                <p class="text--light-blue-50 f6"><span :class="formation.modality.icon"></span> {{ formation.modality.name }}</p>
                                <div class="mv4">
                                    <a :href="'/formaciones/' + formation.id" class="f5 fw4 db tc bo--purple link ba bw1 pv2 text--purple hover-bg--purple hover-white bg-animate">Ir a Capacitación</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div v-for="formation in formations" v-show="list">
                        <div class="ba bg-white b--black-10 mv4 w-100 center pa4 h6 shadow-5">
                            <p class="fw6 text--blue f5">{{ formation.title }}</p>
                            <p class="text--light-blue-50 f6"><span :class="formation.modality.icon"></span> {{ formation.modality.name }}</p>
                            <p class="lh-copy f6">{{ formation.description }}</p>
                            <a :href="'/formaciones/' + formation.id" class="f5 fw4 db tc bo--purple link ba bw1 pv2 text--purple hover-bg--purple hover-white bg-animate">Ir a Capacitación</a>
                        </div>
                    </div>
            </div>
            <div class="center tc">
                    <paginate   :page-count="meta.last_page"
                                :page-range="per_page"
                                :next-class="'dib tc mh2'"
                                :next-link-class="'link'"
                                :prev-class="'dib tc mh2'"
                                :click-handler="clickCallback"
                                :prev-link-class="'link'"
                                :page-link-class="'link silver hover-text--purple f4'"
                                :page-class="'dib tc mh2'"
                                :container-class="'center tc dib list'">
                        <span slot="prevContent" class="icon-left-arrow f4 silver hover-text--purple"></span>
                        <span slot="nextContent" class="icon-right-arrow f4 text--blue hover-text--purple"></span>
                    </paginate>
            </div>
        </div>
        <div v-else class="tc mt4">
            <p class="f4">No se encontraron coincidencias.</p>
        </div>
        </div>
    </section>
</template>

<script>
    export default {
        props: ['modalities', 'types'],
        data() {
            return {
                formations: [],
                modality: '',
                type: '',
                keyword: null,
                grid: true,
                list: false,
                meta: [],
                page: 1,
                per_page: 6,
                countries: [],
                country_id: ''
            }
        },
        mounted() {
            this.get()
            this.getCountries()
        },
        methods: {
            get() {
                axios.get('/api/formations',{
                    params: {
                        "filter[q][active|eq]": 1,
                        "filter[q][modality_id|eq]": this.modality,
                        "filter[q][type_id|eq]": this.type,
                        "filter[q][country_id|eq]": this.country_id,
                        "filter[q][title|cont]": this.keyword,
                        "filter[per_page]": this.per_page,
                        "filter[page]": this.page,
                    }
                }).then((response) => {
                    this.formations = response.data.data
                    this.meta = response.data.meta
                });
            },
            toggle(type) {
                if (type == 'grid') {
                    this.grid = true
                    this.list = false
                }
                else if(type == 'list') {
                    this.grid = false
                    this.list = true
                }
            },
            getCountries() {
                axios.get('/api/countries', {
                    params: {
                        "filter[q][iso|in][]": ['SV', 'GT', 'HN', 'CR', 'PA', 'NI'],
                        "filter[q][DefaultSort|scp]": 1
                    }
                }).then( (response) => {
                    this.countries = response.data.data
                })
            },
            clickCallback (pageNum) {
                this.page = pageNum
                this.get()
            }
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
</style>
