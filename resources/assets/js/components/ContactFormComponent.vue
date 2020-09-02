<template>
    <div class="vld-parent">
        <loading :active.sync="isLoading" 
        :can-cancel="true"        
        :is-full-page="fullPage">
        </loading>

    <form @submit.prevent="submit" id="contact-form">        
        <div v-if="success" class="alert alert-success mt-3">
            Таны захиа амжилттай илгээгдлээ!
        </div>
        <div v-if="errors && errors.fatal" class="alert alert-warning mt-3">
            Захиа илгээх үйлдэл амжилтгүй боллоо. Та сайтын админтай холбогдоно уу!
        </div>
        <input v-model="contact.name" v-bind:class="{'required-error': errors && errors.name}" type="text" name="name" id="name" placeholder="Таны нэр*" class="input-bg">
                
        <input v-model="contact.email" v-bind:class="{'required-error': errors && errors.email}" type="text" name="email" id="email" placeholder="И-мэйл хаяг*" class="input-bg">
                
        <input v-model="contact.subject" type="text" name="subject" id="subject" placeholder="Агуулга" class="input-bg">
        
        <textarea v-model="contact.message" v-bind:class="{'required-error': errors && errors.message}" name="message" id="comment" placeholder="Таны захиа*" class="input-bg"></textarea>                                    
                
        <vue-recaptcha ref="recaptcha" 
                @verify="onCaptchaVerified"
                @expired="onCaptchaExpired"
                size="invisible"
                sitekey="6Lf3B8YZAAAAADWDBMFWmcNcGoMCzVdamaUJyajb" >          
        </vue-recaptcha>
        <button type="submit" class="btn btn-small border-radius-4 btn-black">Илгээх</button>
    </form>
    </div>
</template>

<script>    
    // Import component    
    // Import stylesheet
    import Loading from 'vue-loading-overlay';
    import 'vue-loading-overlay/dist/vue-loading.css';
    import VueRecaptcha from 'vue-recaptcha';    

    export default {
        name: "ContactFrom",
        data() {
            return {
                isLoading: false,
                fullPage: true,

                contact: {},
                success: false,                
                errors: {},
            }
        },
        components: {
            Loading,
            VueRecaptcha
        },
        methods: {
            submit: function () {   
                this.isLoading = true;         
                this.$refs.recaptcha.execute();
            },
            onCaptchaVerified: function (recaptchaToken) {                
                this.success = false;
                this.errors = {};          
                this.$refs.recaptcha.reset();
                axios.post('/contact', this.contact)
                .then(response => {
                    this.contact = {};
                    this.success = true;
                    this.isLoading = false;
                })
                .catch(error => {
                    this.isLoading = false;                    
                    if (error.response.status === 422) {
                        this.errors = error.response.data.errors || {};                            
                    }
                    else {
                        this.errors = {fatal: error.response.status};                        
                    }
                });                
            },
            onCaptchaExpired: function () {
                this.$refs.recaptcha.reset();
            }
        },
    }
</script>