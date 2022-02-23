<template>
    <Head title="Users" />

    <!-- <Layout> -->

    <h1>Users</h1>

    <!-- </Layout> -->

    <Link v-if="can.createUser"  href="/users/create">New User</Link>

    <div>
        <input
            v-model="search"
            type="text"
            name="search"
            placeholder="Search..."
        />

        <ul>
            <li
                v-for="user in users.data"
                :key="user.id"
                v-text="user.name"
            ></li>
        </ul>
    </div>

    <!-- <div>
    <template v-for="link in users.links"   :key="link.label" >
    <Link 
        v-if="link.url"
        :href="link.url"
        v-html="link.label">
    </Link>
    <span v-else v-html="link.label" ></span>
    </template>
</div> -->

    <!-- Could be extracted in a reusable vue component -->
    <!-- <div>
    <Component  :is="link.url ? 'Link' : 'span'"
        :class="link.url ? '' : 'text-muted'"
        v-for="link in users.links"   :key="link.label" 
        :href="link.url"
        v-html="link.label"
        style="margin-right:10px;font-weight:bold"
    />
</div> -->

    <Pagination :links="users.links" />

    <div style="margin-top: 499px">
        <p>The current time is {{ time }}.</p>

        <Link href="/users" preserve-scroll>Refresh</Link>
    </div>
</template>

<script setup>
// import Layout from './Shared/Layout';
import Pagination from "../../Shared/Pagination";
import { ref, watch } from "vue";
import { Inertia } from "@inertiajs/inertia";
// import throttle from "lodash/throttle";
import debounce from "lodash/debounce";

// defineProps({
//     time: String
// });

let props = defineProps({
    time: String,
    users: Object,
    filters: Object,
    can:Object
});

let search = ref(props.filters.search);

// watch(search, throttle( function (value)  {
//     console.log("changed: " + value);

//     Inertia.get(
//         "/users",
//         { search: value },
//         {
//             preserveState: true,
//             replace: true,
//         }
//     );
// }, 1000));

watch(search, debounce( function (value)  {
    console.log("changed: " + value);

    Inertia.get(
        "/users",
        { search: value },
        {
            preserveState: true,
            replace: true,
        }
    );
}, 300));

</script>

<style></style>
