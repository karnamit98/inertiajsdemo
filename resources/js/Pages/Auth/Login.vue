<template>
    
    <h1>LOGIN</h1>

    <form @submit.prevent="submit">

        Email:<input v-model="form.email" type="email" name="email" placeholder="Email"/>
       <div v-if="form.errors.email" v-text="form.errors.email"></div><br />
    <br/>
        Password:<input  v-model="form.password" type="password" name="password" >
           <div v-if="form.errors.password" v-text="form.errors.password"></div><br />
    <br/>
        <button type="submit" :disabled="form.processing" >Login</button>

    </form>

</template>

<script>
import { useForm } from '@inertiajs/inertia-vue3';
export default{
    layout:null
};
</script>

<script setup>

let form = useForm({
    email:'',
    password: ''
})

let submit = () => {
    form.post('/login');
}

</script>

