<template>
    <Head title="Welcome" />

    <div class="relative flex items-top justify-center min-h-screen bg-green-100 dark:bg-gray-900 sm:items-center sm:pt-0">
        <div v-if="canLogin" class="hidden fixed top-3 right-3 rounded px-6 py-4 sm:block bg-green-400">
            <Link v-if="$page.props.auth.user" :href="route('dashboard')" class="text-sm text-white underline">
                Dashboard
            </Link>

            <template v-else>
                <Link :href="route('login')" class="text-sm text-white underline">
                    Log in
                </Link>

                <Link v-if="canRegister" :href="route('register')" class="ml-4 text-sm text-white underline">
                    Register
                </Link>
            </template>
        </div>

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="flex rounded shadow bg-white">
                <div class="w-96 p-6 m-10">
                    <h1 class="text-green-400 font-semibold text-2xl mb-5">Trippy Trips</h1>

                    <div class="mb-10 py-3 font-bold">
                        Wishlist for your traveling needs!
                    </div>

                    <a href="/login" class="rounded shadow hover:shadow-lg bg-blue-600 hober:bg-blue-300 px-5 py-3 mt-10">
                        <span class="text-white">Get Started!</span>
                    </a>
                </div>

                <div class="w-96 p-6 m-10">
                    <img src="/img/intro.png"/>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3';

export default {
    components: {
      Head,
      Link,
    },
    props: {
        canLogin: Boolean,
        canRegister: Boolean,
        laravelVersion: String,
        phpVersion: String,
    },
}
</script>
