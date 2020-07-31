import { apiService } from '../../_services/apiService';
import AddSalle from '../../components/gerants/AddSalle.vue';
import AddUser from '../../components/gerants/AddUser.vue';
export default {
    components: {
        AddSalle,
        AddUser
    },

    data() {
        return {
            tab: null,
            salle: [],
            id_salle: '',
            horaire: '',
            horaireOuverture: '',
            horaireFermeture: '',

            snackbar: false,
            erreur: "",
            timeout: 3000,
        }
    },

    methods: {
        getDatas() {
            apiService.get('/api/gerant/' + this.$route.params.id).then(({ data }) => {
                data.forEach(_data => {
                    this.salle.push(_data);
                    this.id_salle = _data.id;
                })
            })
        },

        updateHoure() {

            if (!this.horaireOuverture == '' && !this.horaireFermeture == '') {
                this.horaire = this.horaireOuverture + ' - ' + this.horaireFermeture;

                apiService.post('/api/gerant/' + this.salle[0].id + '/houre', { horaire: this.horaire }).then(({ data }) => {
                    this.horaire = data.horaire;
                })
            } else if (this.horaireOuverture == '' && this.horaireFermeture == '') {
                this.snackbar = true;
                this.erreur = "Selectionner l'horaire d'ouverture et de fermeture"
            } else if (this.horaireOuverture == '') {
                this.snackbar = true;
                this.erreur = "Ajouter une horaire d'ouverture"
            } else if (this.horaireFermeture == '') {
                this.snackbar = true;
                this.erreur = "ajouter une horaire de fermeture"
            }

            this.horaireOuverture = ''
            this.horaireFermeture = ''
        }
    },

    created() {
        this.getDatas();
    }
}