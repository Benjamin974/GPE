import { apiService } from '../_services/apiService'
import router from "../routes";
export default {
    data: () => ({
        valid: true,
        name: '',
        surname: '',
        nameRules: [
            v => !!v || 'Le champs est requis',
            v => (v && v.length <= 15) || 'Le nom doit contenir moins de 15 characters',
        ],
        email: '',
        emailRules: [
            v => !!v || 'L\'email est requis',
            v => /.+@.+\..+/.test(v) || 'E-mail doit être valide',
        ],
        password: '',
        passwordRules: [
            v => !!v || 'veuillez choisir un mot de passe',
            v => (v && v.length <= 15) || 'le mot de passe ne peut contenir plus de 15 characters',
        ],
        checkbox: false,
        snackbar: false,
        text: "",
    }),

    methods: {
        validate() {
            if (this.name != '' && this.surname != '' && this.password != '' && this.email != '') {
                apiService.post('/api/register/', { name: this.name, surname: this.surname, email: this.email, password: this.password }).then(response => {
                    console.log(response);
                    this.snackbar = true;
                    this.text = "Felicitation, vous êtes un nouveau client !";

                })
            } else {
                console.log('manque de champ')
            }
            this.$refs.form.validate()
        },
        reset() {
            this.$refs.form.reset()
        },
        resetValidation() {
            this.$refs.form.resetValidation()
        },

        redirection() {
            router.push("/login");
        }
    },
    
    created() {
        if(this.timeout == 0) {
            router.push("/login");
        }
    }
}