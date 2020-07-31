<template>
  <b-card
    :title="channel.channel_title"
    :img-src="channel.thumbnail"
    :img-alt="channel.slug"
    img-top
    tag="article"
    style="max-width: 20rem;"
    class="mb-2"
  >
    <b-card-text>{{ channel.sub_title }}</b-card-text>

    <b-button href="#" variant="primary">Go somewhere</b-button>
  </b-card>
</template>

<script>
export default {
  data() {
    return {};
  },
  props: {
    channel: Object,
  },
  methods: {},
};
</script>
