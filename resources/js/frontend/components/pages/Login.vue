<template>
    <div>
        <h4>Login</h4>
        <form>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" v-model="email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" v-model="password">
            </div>
            <button @click="handleSubmit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Login mounted.')
        },
        data(){
            return {
                email : "customer@2mm.io",
                password : "secret"
            }
        },
        methods : {
            handleSubmit(e){
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
            }
        }
    }
</script>
