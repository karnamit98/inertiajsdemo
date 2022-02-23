<template>
    <Head title="Create User"></Head>

    <h1>Create User</h1>

    <form @submit.prevent="submit">

        Name: <input v-model="form.name" type="text" name="name" id="name" />
        <div v-if="$page.props.errors.name" v-text="$page.props.errors.name"></div>
        <br />
        Email: <input v-model="form.email"  type="email" required  name="email" id="email" />
          <div v-if="form.errors.email" v-text="errors.email"></div><br />
        Password: <input  v-model="form.password" type="password"  required name="password" id="password" /><br />
        Confirm Password: <input type="password" required  name="password_confirmation" id="password_confirmation" /><br />

        <!-- <button type="submit"
        :disabled="processing"
        >Submit</button> -->
        <button type="submit"
        :disabled="form.processing"
        >Submit</button>

    </form>

</template>

<script setup>

    // import {ref, reactive} from "vue";

    import {Inertia} from "@inertiajs/inertia";

    import { useForm } from "@inertiajs/inertia-vue3"

    // let form = reactive({
    //     name:'',
    //     email:'',
    //     password:'',
    // });
    let form = useForm({
        name:'',
        email:'',
        password:'',
    });

    setTimeout(() => {
        form.reset();
    }, 3000)

    defineProps({
        errors:Object
    })

    // let processing = ref(false);


    // let submit = () => {
    //     // processing.value = true;
    //      Inertia.post('/users/store',form, {
    //          onStart: () => {
    //              processing.value = true
    //          },
    //          onFinish: () => {
    //              processing.value = false
    //          }
    //      });
    // }


   let submit = () => {
        // processing.value = true;
        form.post('/users/store');
    }
 

</script>
