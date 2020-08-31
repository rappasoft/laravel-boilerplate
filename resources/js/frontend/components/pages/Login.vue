<template>
    <div>
        <b-container>
            <b-form @submit.stop.prevent="onSubmit">
                <b-form-group id="inputGroupEmail">
                    <b-form-input
                        id="inputEmail"
                        v-model="email"
                        type="email"
                        required
                        placeholder="EMAIL ADDRESS"
                    ></b-form-input>
                </b-form-group>

                <b-form-group id="inputGroupPassword">
                    <b-form-input
                        id="inputPassword"
                        v-model="password"
                        type="password"
                        required
                        placeholder="PASSWORD"
                    ></b-form-input>
                </b-form-group>

                <b-button type="submit" variant="primary">SIGN IN</b-button>    
            </b-form>

            <b-card class="border-0">
                <b-card-text>Don't have an account? <b-link href="/register">Join</b-link></b-card-text>
            </b-card>
        </b-container>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Login mounted.')
        },
        props : {
            promoter : Object
        },
        data(){
            return {
                email : "customer@2mm.io",
                password : "secret"
            }
        },
        methods : {
            onSubmit(e){
                e.preventDefault()
                if (this.password.length > 0) {
                    this.$http.post(`${process.env.MIX_API_URL}/oauth/token`, {
                        username: this.email,
                        password: this.password,
                        grant_type: 'password',
                        client_id: process.env.MIX_CLIENT_ID,
                        client_secret: process.env.MIX_CLIENT_SECRET
                    })
                    .then(response => {
                        localStorage.setItem('access_token', response.body.access_token)
                        this.$router.push('/')
                    })
                    .catch(function (error) {
                        console.error(error.response);
                    });
                }
            },            
        }
    }
</script>
