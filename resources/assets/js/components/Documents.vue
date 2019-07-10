<template>
    <section class="pv4">
        <div class="center w-60-l w-80">
            <h1 class="tc text--blue fw4 f2">Inicia tu búsqueda</h1>
            <div>
                <input type="text" class="pa2 input-reset ba bg-transparent b--silver silver w-30-l w-100 mh0" placeholder="Palabra Clave" v-model="keyword">
                <select name="" id="" class="pa2 input-reset ba bg-transparent b--silver silver w-30-l w-100 text--light-blue-50 mh0" v-model="topic_id">
                    <option value="" class="text--light-blue-50">Categoría Temática</option>
                    <option :value="topic.id" class="text--light-blue-50" v-for="topic in topics" v-text="topic.name"></option>
                </select>
                <select name="" id="" class="pa2 input-reset ba bg-transparent b--silver silver w-30-l w-100 text--light-blue-50 mh0" v-model="country_id">
                    <option value="" class="text--light-blue-50">Seleccione un País</option>
                    <option :value="country.id" class="text--light-blue-50" v-for="country in countries" v-text="country.name"></option>
                </select>
                <a @click="get" class="f5 bo--purple fw4 db link ba bw1 pv2-l ph3-l text--purple hover-bg--purple hover-white bg-animate tc di-l"><span class="icon-search"></span></a>
            </div>
            <div v-if="documents.length">
                <div class="cf">
                    <div class="tr right pt4 pr3">
                        <a class="link" :class="grid ? 'text--blue' : 'light-silver'" @click="toggle('grid')"><span class="icon-grid f4 pa2"></span></a>
                        <a class="link" :class="list ? 'text--blue' : 'light-silver'" @click="toggle('list')"><span class="icon-list f4"></span></a>
                    </div>

                        <div v-for="document in documents" v-show="grid">
                            <div class="fl w-100 w-50-m w-third-l ph2">
                                <div class="ba bg-white b--black-10 mv4 ph3 pv2 w-100 mw6 h6 shadow-5">
                                    <div class="relative pl5">
                                        <span class="icon-pdf f1 silver ma1 absolute top-0 left-0"></span>
                                        <h3 class="f5 fw5 text--blue h4">{{ document.title }}</h3>
                                        <p class="silver f6 h2">{{ document.author }}, {{ document.published_date }}</p>
                                    </div>
                                    <div class="mv4">
                                        <a :href="'/repositorio-ddhh/' + document.id" class="f5 fw4 db tc bo--purple link ba bw1 pv2 text--purple hover-bg--purple hover-white bg-animate">Ver más</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div v-for="document in documents" v-show="list">
                            <div class="ba bg-white b--black-10 mv4 ph3 pv2 w-100 h6 shadow-5">
                                <div class="relative pl5">
                                    <span class="icon-pdf f1 silver ma1 absolute top-0 left-0"></span>
                                    <h3 class="f5 fw5 text--blue">{{ document.title }}</h3>
                                    <p class="silver f6">{{ document.author }}, {{ document.published_date }}</p>
                                </div>
                                <div class="mv4">
                                    <a :href="'/repositorio-ddhh/' + document.id" class="f5 fw4 db tc bo--purple link ba bw1 pv2 text--purple hover-bg--purple hover-white bg-animate">Ver más</a>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="center tc">
                    <paginate   :page-count="meta.last_page"
                                :page-range="per_page"
                                :next-class="'dib tc mh2'"
                                :next-link-class="'link'"
                                :prev-class="'dib tc mh2'"
                                :prev-link-class="'link'"
                                :click-handler="clickCallback"
                                :page-link-class="'link silver hover-text--purple f4'"
                                :page-class="'dib tc mh2'"
                                :container-class="'center tc dib list'">
                        <span slot="prevContent" class="icon-left-arrow f4 silver hover-text--purple"></span>
                        <span slot="nextContent" class="icon-right-arrow f4 text--blue hover-text--purple"></span>
                    </paginate>
                </div>
            </div>
            <div v-else class="tc">
                <p class="f4">No se encontraron coincidencias.</p>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        props: ['topics'],
        data() {
            return {
                documents: [],
                meta: [],
                grid: true,
                list: false,
                keyword: '',
                page: 1,
                country_id: '',
                topic_id: '',
                countries: [],
                per_page: 6
            }
        },
        mounted() {
            this.get()
            this.getCountries()
        },
        methods: {
            get() {
                axios.get('/api/documents', {
                    params: {
                        "filter[q][active|eq]": 1,
                        "filter[q][country_id|eq]": this.country_id,
                        "filter[q][title|cont]": this.keyword,
                        "filter[q][description|cont]": this.keyword,
                        "filter[per_page]": this.per_page,
                        "filter[page]": this.page,
                        "filter[q][Topic|scp]": this.topic_id
                    }
                }).then((response) => {
                    this.documents = response.data.data
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
