import {apiService} from '../../_services/apiService'

export default {
    props: ["programme", 'programmes'],
    data() {
        return {
            dialog: false,
            snackbar: false,
            text: '',
            timeout: 2000,
        }
    },
    methods: {
        getId(e) { console.log(this.programme.name)},
        valider() {
            apiService.delete('/api/programmes/' + this.programme.id
            ).then(({data}) => {
                if (data === "ok") {
                    this.snackbar = true;
                    this.text = 'Le programme a bien été supprimé'
                    this.$emit('programmeToDelete', this.programme.id)
                    
                }

            })
                .catch(error => {
                    this.snackbar = true;
                    this.text = 'Une erreur est survenue'
                })
        }
    },
}