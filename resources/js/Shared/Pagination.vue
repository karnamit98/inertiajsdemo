<template>
    <div>
         <!-- :class="link.url ? '' : 'text-muted'" -->
        <Component  :is="link.url ? 'Link' : 'span'"
           
            v-for="link in links"   :key="link.label" 
            :href="link.url"
            v-html="link.label"
            style="margin-right:10px;font-weight:bold"
            :class="{'text-muted': !link.url, 'fw-bolder':link.active}"
        />
    </div>
</template>

<script>

export default ({
    props: {
        links: Array
    }
})
</script>
