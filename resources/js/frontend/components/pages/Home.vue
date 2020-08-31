<template>
  <div v-if="promoter">
    <b-container fluid>
      <div v-if="lives.length > 0">
        <h1>Live Events</h1>
        <b-row>
          <b-col cols xs="12" sm="6" md="3" v-for="channel in lives" :key="channel.id">
						<tall-card :channel="channel"></tall-card>
          </b-col>
        </b-row>
      </div>

      <div v-if="vods.length > 0">
        <h1>Vods</h1>
        <b-row>
          <b-col cols xs="12" sm="6" md="3" v-for="channel in vods" :key="channel.id">
						<tall-card :channel="channel"></tall-card>
          </b-col>
        </b-row>
      </div>

      <div v-if="qnas.length > 0">
        <h1>Q&As</h1>
        <b-row>
          <b-col cols xs="12" sm="6" md="3" v-for="channel in qnas" :key="channel.id">
						<tall-card :channel="channel"></tall-card>
          </b-col>
        </b-row>
      </div>

      <div v-if="highlights.length > 0">
        <h1>Video Highlights</h1>
        <b-row>
          <b-col cols xs="12" sm="6" md="3" v-for="channel in highlights" :key="channel.id">
						<tall-card :channel="channel"></tall-card>
          </b-col>
        </b-row>
      </div>
    </b-container>		
  </div>
</template>

<script>
import PublicChannel from "../../../models/PublicChannel";
import PublicPromoter from "../../../models/PublicPromoter";
import PublicHighlight from "../../../models/PublicHighlight";

export default {
  mounted() {
    console.log("Home mounted.");
    this.getPromoter();
    this.getChannels("vod", 1).then((response) => (this.vods = response.data));
    this.getChannels("qna", 1).then((response) => (this.qnas = response.data));
    this.getChannels("live", 1).then(
      (response) => (this.lives = response.data)
    );
    this.getHighlights().then((response) => (this.highlights = response.data));
  },
  data() {
    return {
      promoter_id: 71, // Change this as needed
      per_page: 4, // Change this as needed
      vods: [],
      lives: [],
      qnas: [],
      highlights: [],
      promoter: null,
    };
  },
  methods: {
    async getChannels(type = "vod", page = 1) {
      let query = PublicChannel.where("promoter_id", this.promoter_id).where(
        "type",
        type
      );
      query.params({
        page: page,
        per_page: this.per_page,
      });
      return await query.get();
    },
    async getPromoter() {
      await PublicPromoter.find(this.promoter_id).then(
        (response) => (this.promoter = response)
      );
    },
    async getHighlights(page = 1) {
      let query = await PublicHighlight.where("promoter_id", this.promoter_id);
      query.params({
        page: page,
        per_page: this.per_page,
      });
      return await query.get();
    },
  },
};
</script>
