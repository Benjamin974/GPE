import { apiService } from '../../_services/apiService'
export default {
    data: () => ({
        valid: true,
        nom: '',
        nameRules: [
            v => !!v || 'Le nom est requis',
            v => (v && v.length <= 10) || 'Name must be less than 10 characters',
        ],
        prenom: '',
        firstnameRules: [
            v => !!v || 'Le prénom est requis',
            v => (v && v.length <= 10) || 'Name must be less than 10 characters',
        ],
        email: '',
        emailRules: [
            v => !!v || "E-mail requis",
            v => /.+@.+\..+/.test(v) || "Ce champ doit être un email"
        ],
        pwdRules: [v => !!v || "Mot de passe requis"],
        message: '',
        lazy: false,

        clients: [],
        client: '',
        sameClient: ''
    }),

    created() {
        this.getClients();
    },

    methods: {
        validate() {
            if (this.message == '') {
                this.sameClient = 'Vous avez oublié votre message';
            } else {
                apiService.post('/api/contact', { nom: this.nom, prenom:this.prenom, email: this.email, message: this.message }).then(({ data }) => {
                    if (data == 'l\'utilisateur est déjà dans la salle de sport') {
                        this.sameClient = data;
                        console.log(this.sameClient)
                    } else {
                        this.sameClient = 'Email envoyé au client et le client a été rajouté à la salle de sport'
                        console.log(data);
                    }
                })
            }


        },

        getClients() {
            apiService.get('/api/gerant/clients').then(({ data }) => {
                data.forEach(_data => {
                    this.clients.push(_data)
                })

            })
        },

        choiceClient(client) {
            this.name = client.name;
            this.email = client.email;
        }
    },
}