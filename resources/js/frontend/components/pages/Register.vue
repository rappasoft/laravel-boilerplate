<template>
    <div>
        <b-container>
          <b-form @submit.stop.prevent="onSubmit" v-if=show>
            <b-form-group id="inputFirstName">
              <b-form-input
                id="inputGroupFirstName"
                v-model="form.firstName"                
                required
                placeholder="FIRST NAME"
              ></b-form-input>
            </b-form-group>

            <b-form-group id="inputGroupLastName">
              <b-form-input
                id="inputLastName"
                v-model="form.lastName"
                required
                placeholder="LAST NAME"
              ></b-form-input>
            </b-form-group>

            <b-form-group id="inputGroupEmail">
              <b-form-input
                id="inputEmail"
                v-model="form.email"
                type="email"
                required
                placeholder="EMAIL ADDRESS"
              ></b-form-input>
            </b-form-group>

            <b-form-group id="inputGroupPassword">
              <b-form-input
                id="inputPassword"
                v-model="form.password"
                type="password"
                required
                placeholder="PASSWORD"
              ></b-form-input>
            </b-form-group>

            <b-form-group id="inputGroupConfirmPassword">
              <b-form-input
                id="inputConfirmPassword"
                v-model="form.confirmPassword"
                type="password"
                required
                placeholder="CONFIRM PASSWORD"
                :state="passwordValidation"
              ></b-form-input>
              <b-form-invalid-feedback :state="passwordValidation">The password you entered do not match</b-form-invalid-feedback>
              <b-form-valid-feedback :state="passwordValidation"></b-form-valid-feedback>
            </b-form-group>

            <b-form-group id="inputGroupRegion" label="REGION" label-for="inputRegion">
              <b-form-select
                id="inputRegion"
                v-model="form.region"
                :options="regions"
                required
              ></b-form-select>
            </b-form-group>

            <b-form-group id="inputGroupDob" label="DATE OF BIRTH" label-for="inputDob">
              <b-form-datepicker id="inputDob" v-model="form.dob" locale="en-AU"></b-form-datepicker>
            </b-form-group>            

            <b-card class="border-0">
              <b-card-text>By clicking on Sign Up, you agree to Epicentre's term & conditions and privacy policy</b-card-text>
            </b-card>

            <b-button type="submit" variant="primary">Sign Up</b-button>
          </b-form>

          <b-card class="border-0">
              <b-card-text>Already have an account? <b-link href="/login">SIGN UP</b-link></b-card-text>
          </b-card>
        </b-container>
    </div>
</template>

<script>
  export default {
    data() {
      return {
        form: {
          firstName: '',
          lastName: '',
          email: '',
          password: '',
          confirmPassword: '',
          region: 'oceania', 
          dob: '',
        },
        regions: [{ text: 'OCEANIA', value: 'oceania' }, 
                  { text: 'ASIA' , value: 'asia'}, 
                  { text: 'NORTH AMERICA', value: 'northAmerica'}, 
                  { text:'SOUTH AMERICA', value: 'southAmerica'},
                  { text:'EUROPE', value: 'europe'},                  
                  { text:'AFRICA', value: 'africa'},
                  ],
        show: true
      }
    },
    methods: {
      onSubmit(e) {
        e.preventDefault()
        alert(JSON.stringify(this.form))
      }      
    },
    computed: {
      passwordValidation() {        
        return this.form.password === this.form.confirmPassword;
      }
    }
  }
</script>