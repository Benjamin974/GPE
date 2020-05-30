import { apiService } from '../../_services/apiService';
import ModalProgramme from '../../components/clients/ProgrammeComplet.vue'
import { authenticationService } from '../../_services/authentication.service'
export default {
    components: {
        ModalProgramme
    },

    data() {
        return {
            programmes: [],
            programmeChoisi: {},
            clients: [],
            donneeAdd: false,
            snackbar: false,
            text: "",
            timeout: 3000
        }
    },

    created() {
        this.getDatas();
        authenticationService.currentUser.subscribe(x => (this.currentUser = x));
        this.getClient();
    },
    methods: {
        getDatas() {
            apiService.get('/api/client/programmes').then(({ data }) => {
                data.data.forEach(_programmes => {
                    this.programmes.push(_programmes)
                })
            });
        },

        getClient() {
            apiService.get('/api/users/' + this.currentUser.id).then(({ data }) => {
                data.data.forEach(_clients => {
                    this.clients.push(_clients)
                })
            })
        },

        choixProgramme() {
            this.donneeAdd = true
            apiService.post('/api/client/programmes', {
                id: this.programmeChoisi.id,
                user: this.currentUser.id

            }).then(({ data }) => {
                this.donneeAdd = true;
                this.snackbar = true; 
                this.text = "Vous avez opté pour le" + ' ' + this.programmeChoisi.name;
            }).catch((error) => {
                console.log(error)
            })
        },

        recupProgrammes(items) {
            let programmes = [];
            items.forEach(item => {
                programmes.push((item.name))
            })
            return programmes.join(', ');
        },

        deletePrograme() {
            apiService.post('/api/client/programmes/delete', {
                user: this.currentUser.id

            }).then(({ data }) => {
                this.programmeChoisi = [];
            })
        }
    }
}