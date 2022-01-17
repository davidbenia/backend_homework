<template>
    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12 w-full h-full">
            <div class="mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200 flex">
                        <div class="w-2/3 h-full border-right">
                            <h1>World Map</h1>
                            <div
                                id="worldMap"
                                style="position: relative; width: 500px; height: 300px;"
                            >
                            </div>
                        </div>

                        <div class="w-1/3">
                            <div class="shadow rounded">
                                <h1 class="text-green-400 text-xl p-2">I wish to visit</h1>

                                <div class="flex">
                                    <Select2
                                        class="w-72 px-3"
                                        v-model="toVisitValue"
                                        :settings="{
                                            width: '50%',
                                            ajax: {
                                                url: '/api/countries/list',
                                                dataType: 'json',
                                            }
                                        }"
                                        @select="selectToVisit($event)"
                                    />
                                    <a href="javascript:void(0)" @click="addToVisit" class="px-3 rounded bg-green-400 hover:bg-green-200 shadow hover:shadow-lg ml-4 text-sm font-semibold pt-1">
                                        {{ toVisitText }}
                                    </a>
                                </div>

                                <div class="w-full p-3">
                                    <div v-for="country in countriesToVisit" :key="country.id">
                                        <div class="px-1 mb-3 font-semibold border-b-2 border-gray-200 relative">
                                            {{ country.name }}
                                            <a href="javascript:void(0)" @click="() => deleteToVisit(country.id)" class="absolute right-0 text-red-700">
                                                DEL
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="shadow rounded mt-10">
                                <h1 class="text-green-400 text-xl p-2">I already visited</h1>

                                <div class="flex">
                                    <Select2
                                        class="w-72 px-3"
                                        v-model="visitedValue"
                                        :settings="{
                                            width: '50%',
                                            ajax: {
                                                url: '/api/countries/list',
                                                dataType: 'json',
                                            }
                                        }"
                                        @select="selectVisited($event)"
                                    />
                                    <a href="javascript:void(0)" @click="addVisited" class="px-3 rounded bg-green-400 hover:bg-green-200 shadow hover:shadow-lg ml-4 text-sm font-semibold pt-1">
                                        {{ visitedText }}
                                    </a>
                                </div>

                                <div class="w-full p-3">
                                    <div v-for="country in visitedCountries" :key="country.id">
                                        <div class="px-1 mb-3 font-semibold border-b-2 border-gray-200 relative">
                                            {{ country.name }}
                                            <a href="javascript:void(0)" @click="() => deleteVisited(country.id)" class="absolute right-0 text-red-700">
                                                DEL
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { Head } from '@inertiajs/inertia-vue3';
import Select2 from 'vue3-select2-component';

export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
        Select2,
    },
    data() {
        return {
            toVisitValue: '',
            visitedValue: '',
            visitedCountries: [],
            countriesToVisit: [],
            toVisitText: 'ADD',
            visitedText: 'ADD',
            map: null,
            visitedObject: {},
            toVisitObject: {},
        }
    },
    methods: {
        selectVisited({id, text}){

        },
        selectToVisit({id, text}){

        },
        getVisitedCountries()
        {
            axios.get("/api/countries/visited")
            .then((response) => {
                this.visitedCountries = response.data;
            })
            .catch((e) => console.log(e));
        },
        getCountriesToVisit()
        {
            axios.get("/api/countries/to-visit")
            .then((response) => {
                this.countriesToVisit = response.data;
            })
            .catch((e) => console.log(e));
        },
        addVisited()
        {
            if(this.visitedValue !== ''){
                this.visitedText = "Loading";

                axios.post('/api/add-visited', {
                    id: this.visitedValue
                })
                .then(() => {
                    this.getVisitedCountries();
                    this.fillMap();
                    this.visitedText = "ADD"
                })
            }
        },
        addToVisit()
        {
            if(this.toVisitValue !== ''){
                this.toVisitText = "Loading";

                axios.post('/api/add-to-visit', {
                    id: this.toVisitValue
                })
                .then(() => {
                    this.getCountriesToVisit();
                    this.fillMap();
                    this.toVisitText = "ADD"
                });
            }
        },
        deleteVisited(id)
        {
            axios.delete('/api/delete-visited', {
                data: {
                    id: id
                }
            })
            .then(() => {
                this.getVisitedCountries();
                this.fillMap();
            });
        },
        deleteToVisit(id)
        {
            axios.delete('/api/delete-to-visit', {
                data: {
                    id: id
                }
            })
            .then(() => {
                this.getCountriesToVisit();
                this.fillMap();
            });
        },
        loadMap()
        {
            this.map = new Datamap({
                element: document.getElementById("worldMap"),
                projection: 'mercator',
                fills: {
                    defaultFill: "#C1C1C1",
                    visitedFill: "#51F33B",
                    toVisitFill: "#6FA8DC",
                },
                data: {

                }
            });
        },
        fillMap()
        {
            axios.get("/api/countries/visited")
            .then((response) => {
                response.data.forEach(country => {
                    this.visitedObject[country.code] = {fillKey: "visitedFill"}
                });
            })
            .then(() => {
                this.map.updateChoropleth(this.visitedObject);
            })

            axios.get("/api/countries/to-visit")
            .then((response) => {
                response.data.forEach(country => {
                    this.toVisitObject[country.code] = {fillKey: "toVisitFill"}
                });
            })
            .then(() => {
                this.map.updateChoropleth(this.toVisitObject);
            })
        }
    },
    created() {

    },
    mounted() {
        this.loadMap();
        this.getCountriesToVisit();
        this.getVisitedCountries();
        this.fillMap();
    }
}
</script>

