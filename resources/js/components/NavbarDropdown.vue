<template>
   <div class="flex items-center justify-center">
        <div class="relative">
            <div v-if="open" @click="open = false" class="fixed inset-0"></div>
            <button @click="open = !open" class="relative flex items-center focus:outline-none">
                <span class="ml-2 font-medium text-white">{{ user.name }}</span>
                <svg class="ml-1 h-5 w-5 fill-current text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M15.3 9.3a1 1 0 0 1 1.4 1.4l-4 4a1 1 0 0 1-1.4 0l-4-4a1 1 0 0 1 1.4-1.4l3.3 3.29 3.3-3.3z"/>
                </svg>
            </button>
            <transition
              enter-active-class="transition-all transition-fastest ease-out-quad"
              leave-active-class="transition-all transition-faster ease-in-quad"
              enter-class="opacity-0 scale-70"
              enter-to-class="opacity-100 scale-100"
              leave-class="opacity-100 scale-100"
              leave-to-class="opacity-0 scale-70"
            >
                <div v-if="open" class="origin-top-right absolute right-0 mt-2 w-64 bg-white rounded-lg border shadow-md py-2">
                    <ul>
                        <li v-for="link in links">
                            <a :href="link.url" class="block px-4 py-2 hover:bg-indigo-500 hover:text-white">{{ link.name }}</a>
                        </li>
                        <li>
                            <a :href="logoutUrl" class="block px-4 py-2 hover:bg-indigo-500 hover:text-white" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign out</a>
                        </li>
                    </ul>
                </div>
            </transition>
        </div>
    </div>
</template>

<script>
   // imports

export default {
  props: {
    user: {
      type: Object,
      required: true
    },

    links: {
      type: Array,
      required: true
    },

    logoutUrl: {
      type: String,
      required: true
    }
  },

  mounted() {
    //
  },

  data() {
    return {
      open: false
    }
  }
}
</script>
