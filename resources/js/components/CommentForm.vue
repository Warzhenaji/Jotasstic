<template>
    <div class="bg-grey-lighter flex flex-between py-3 -mx-3 p-2">
        <img class="w-8 h-8 rounded-full" :src="user.avatar" :alt="user.name">
        <form class="w-full" :action="formUrl" method="POST" v-on:submit.prevent="submitComment()">
            <textarea v-model="comment_body" placeholder="Alright then, share your secrets..." class="w-full mx-2 bg-grey-lighter rounded-full border bg-white h-8 px-2 pt-2 text-xs"></textarea>
            <button type="submit" class="btn btn-secondary">Drop the Mic...</button>
        </form>
        <div class="for-testing" v-for="comment in comments">
          <div class="flex items-start mb-4 text-sm mt-6 bg-gray-400 shadow-xl rounded-t rounded-b">
    <img :src="comment.user.avatar" class="w-10 h-10 rounded mt-1 ml-1 mb-1 mr-3">
    <div class="flex-1 overflow-hidden">
        <div>
            <span class="font-bold">{{ comment.user.name }}</span>
            <span class="text-grey text-xs">{{ comment.created_at }}</span>
        </div>
        <p class="text-black leading-normal pr-2 pb-2">{{ comment.comment_body }}</p>
    </div>
</div>        
        </div>
    </div>
</template>

<script>

export default {
  props: {
    postId: {
      type: [String, Number],
      required: true
    },

    formUrl: {
      type: String,
      required: true
    },

    user: {
      type: Object,
      required: true
    }
  },

  data () {
    return {
      comment_body: '',
      comments: []
    }
  },

  methods: {
    submitComment () {
      let _self = this
      let payload = {
        comment_body: _self.comment_body
      }

      axios.post(_self.formUrl, payload)
        .then(function (resp) {
          console.log(resp.data)
          _self.comments.unshift(resp.data)
        })
        .catch(function (erro) {
          console.error(erro)
        })
    }
  }
}
</script>