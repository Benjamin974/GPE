import { apiService } from '../../_services/apiService'
export default {
    props: {
        salle: {
            default: function () {
                return {}
            }
        },
    },
    data() {
        return {
            dialog: false,
            name: '',
            lieu: '',
            horaire: '',
        }
    },

    methods: {
        updateDatas() {
            this.name = this.salle.name
            this.lieu = this.salle.lieu
            this.horaire = this.salle.horaire
        },

        updateRoom() {
            apiService.post('/api/gerant/' + this.salle.id, {name: this.name, lieu: this.lieu, horaire: this.horaire}).then(({data}) => {
                console.log(data)
                this.dialog = false
            })
        }
    }
}