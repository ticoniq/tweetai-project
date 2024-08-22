<template>
  <div>
    <h2>Total Autobots: {{ count }}</h2>
  </div>
</template>

<script>
import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

export default {
  data() {
    return {
      count: 0
    }
  },
  mounted() {
    this.fetchInitialCount();
    this.listenForUpdates();
  },
  methods: {
    async fetchInitialCount() {
      try {
        const response = await axios.get('http://127.0.0.1:8000/api/autobots/count');
        this.count = response.data.count;
      } catch (error) {
        console.error('Error fetching initial count:', error);
      }
    },
    listenForUpdates() {
      window.Echo = new Echo({
        broadcaster: 'pusher',
        key: process.env.VUE_APP_WEBSOCKETS_KEY,
        cluster: process.env.VUE_APP_WEBSOCKETS_CLUSTER,
        forceTLS: true
      });

      window.Echo.channel('autobots')
        .listen('AutobotCountUpdated', (e) => {
          this.count = e.count;
        });
    }
  }
}
</script>