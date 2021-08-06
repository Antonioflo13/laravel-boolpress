<template>
    <section class="container">
        <form @submit.prevent="sendForm">
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control"
                :class="{ 'is-invalid' : errors.name }"
                 id="name" v-model="name" placeholder="Inserisci il tuo nome">
                <small class="text-danger" v-for="(error,index) in errors.name" :key="`err-name-${index}`" >{{ error }}</small> 
            </div>
            <div class="mb-3">
                <label for="e-mail" class="form-label">Indirizzo Email</label>
                <input type="email" class="form-control"
                :class="{ 'is-invalid' : errors.email }" id="email" v-model="email" placeholder="Inserisci il tuo indirizzo e-mail">
                <small class="text-danger" v-for="(error,index) in errors.email" :key="`err-email-${index}`" >{{ error }}</small>
            </div>
            <div class="mb-3">
                <label for="message">Messaggio</label>
                <textarea class="form-control"
                :class="{ 'is-invalid' : errors.message }" name="message" id="message" v-model="message" rows="10"></textarea>
                <small class="text-danger" v-for="(error,index) in errors.message" :key="`err-message-${index}`" >{{ error }}</small>
            </div>
            
            <button type="submit" class="btn btn-primary" :disabled="sending">
                {{sending == true ? 'Invio in corso...' : 'Invia'}}
            </button>
        </form>
    </section>
</template>

<script>
export default {
    name: 'contact',
    data: function() {
        return {
            name: '',
            email: '',
            message: '',
            errors: {},
            success: false,
            sending: false
        }
    },
    methods: {
        sendForm() {

            this.sending = true;

            axios.post('http://127.0.0.1:8000/api/leads', {
                name: this.name,
                email: this.email,
                message: this.message,
            })
            .then(
                res => {

                    this.sending = false;

                    if (res.data.errors) {
                        this.errors = res.data.errors;
                        this.succes = false;
                    } else {
                        this.errors = {};
                        this.name = '';
                        this.email = '';
                        this.message = '';
                    }
                }
            )
            .catch(
                err => {
                    console.log(err);
                }
            )
        },
    },
}

</script>

<style>

</style>