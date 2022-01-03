<template>
    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200 flex">
                        <div class="w-1/2 border-right">
                            WORLD MAP - WIP
                        </div>

                        <div class="w-1/2">
                            <h1 class="text-green-400 text-xl p-2">I wish to visit</h1>

                            <Select2
                            v-model="myValue"
                            :options="myOptions"
                            :settings="{ width: '50%' }" />
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

let getCountries = async () => {
    let xhttp = new XMLHttpRequest();
    let data = [];
    let myResponse;

    xhttp.onreadystatechange = function () {
        myResponse = this.response;
        myResponse = JSON.parse(myResponse);

        myResponse.forEach(element => {
            data.push(element.name);
        });
    }

    xhttp.open("GET", "http://localhost:8000/api/countries", true);
    xhttp.send();

    return data;
}

let setCountries = async () => {
    let data = await getCountries();

    return data;
}

export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
        Select2,
    },
    data() {
        return {
            myValue: '',
            myOptions: setCountries(),
        }
    },
    methods: {
    },
    created() {

    }
}
</script>
