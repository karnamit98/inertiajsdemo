<template>
 
  <nav>
      <ul>
            <li>
                <NavLink href="/home" :active="$page.url.startsWith('/home')" >Home</NavLink>
                <!-- <Link href="/home" :class="{'active-link':$page.url.startsWith('/home')}">
                    Home
                </Link> -->
            </li>
            <li>
                <NavLink href="/users" :active="$page.url==='/users'" >Users</NavLink>
                <!-- <Link href="/users" :class="{'active-link':$page.url==='/users'}">
                    Users
                </Link> -->
            </li>
            <li>
                <NavLink href="/settings" :active="$page.component==='Settings'" >Settings</NavLink>
                <!-- <Link href="/settings" :class="{'active-link':$page.component==='Settings'}">
                    Settings
                </Link> -->
            </li>
           <li>
               <Link  href="/logout" 
                    method="POST" 
                    as="button"
                    :data="{foo:'bar', var:'val'}">
                    Log Out
                </Link>
           </li>
      </ul>
  </nav>



</template>

<script>
import  NavLink  from './NavLink';

export default {
    components: {  NavLink },

}
</script>

<style>

</style>