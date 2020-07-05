import { apiService } from '../../_services/apiService'
export default {
    data: () => ({
        valid: true,
        name: '',
        nameRules: [
            v => !!v || 'Name is required',
            v => (v && v.length <= 10) || 'Name must be less than 10 characters',
        ],
        email: '',
        emailRules: [
            v => !!v || 'E-mail is required',
            v => /.+@.+\..+/.test(v) || 'E-mail must be valid',
        ],
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
                console.log(this.name + ', ' + this.email)
                apiService.post('/api/contact', { client: this.client.id, email: this.email, name: this.name, message: this.message }).then(({ data }) => {
                    if (data == 'l\'utilisateur est déjà dans la salle de sport') {
                        this.sameClient = data;
                        console.log(this.sameClient)
                    } else {
                        this.sameClient = 'Demande envoyé au client'
                    }
                })
            }


        },
        reset() {
            this.$refs.form.reset()
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