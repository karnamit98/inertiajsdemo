<template>

<Head>
    <title>Inertia App </title>
    <meta head-key="description" type="description"  content="Info about inertia app!">
</Head>

<section>
    <header>
        <h1>Inertia App</h1>

        <h3>Welcome, {{ $page.props.auth.user.username }}!</h3>
   
        <Nav />
    </header>
</section>

    
 

    <section>
        <slot />
    </section>
  

</template>

<script>
    import Nav from "./Nav";

    export default {
        components:{ Nav },
        props: {
            
        },

        computed: {
            username() {
                return $page.props.auth.user.username
            } 
        }
    }
</script>