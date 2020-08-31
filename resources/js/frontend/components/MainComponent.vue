<template>
    <div id="app">
        <component :is="layout">
            <router-view></router-view>
        </component>
    </div>
    
</template>

<script>
    import PublicPromoter from "../../models/PublicPromoter";

    const default_layout = "default";
    
    export default {
        mounted() {
            console.log('Main mounted.')            
            this.getPromoter();
        },
        computed : {
            layout() {
                return (this.$route.meta.layout || default_layout);
            }
        },
        data() {
            return {
                promoter_id: 71, //TODO: to environment variable
                per_page: 4,       
            };
        },
        methods: {
            async getPromoter() {
                await PublicPromoter.find(this.promoter_id).then(
                    (response) => (this.$store.dispatch('promoter/storePromoter', response))
                );
            },
        }
    }
</script>
