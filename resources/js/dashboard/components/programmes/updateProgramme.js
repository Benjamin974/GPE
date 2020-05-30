
import { apiService } from '../../_services/apiService';

export default {
    props: ["programme"],

    data() {
        return {
            modalProgramme: [],
            _programme: {},
            params: {
                id_user: {
                    type: 'text'
                },
                id_salle_de_sport: {
                    type: 'text'
                },
                id_seance: {
                    type: 'text'
                },
                name: {
                    type: 'text'
                },
                difficulte: {
                    type: 'text'
                },
                nbre_seance_semaine: {
                    type: 'text'
                },
                prix: {
                    type: 'text'
                },
                image: {
                    type: 'text'
                }
            }
        }
    },

    created() {
        this.prepareDisplay();
    },
    methods: {

        updateData(item) {
            if (this.programme[item.key] != item.value) {
                let datas = this.getUpdatedProgramme(item);
                apiService.post('/api/programmes/' + this.programme.id, datas)
                    .then(resp => {
                        if (_.isObject(resp.data)) {
                            this.programme[item.key] = resp.data.data[item.key];
                        }
                        this.prepareDisplay();
                    }).catch(error => {
                        console.log(error);
                    });

            } else {
                item.editBool = false;
            }
        },
        getUpdatedProgramme(item) {
            this.prepareLocalProgramme();
            if (this._programme.hasOwnProperty(item.key)) {
                this._programme[item.key] = item.value;
            }
            return this._programme;
        },
        prepareDisplay() {
            this.modalProgramme = [];
            for (const property in this.programme) {
                if (this.params.hasOwnProperty(property)) {
                    this.modalProgramme.push({
                        key: property,
                        value: this.programme[property],
                        editBool: false,
                        type: this.params[property].type
                    })
                }
            }
        },

        prepareLocalProgramme() {
            this._programme = {};
            for (const property in this.programme) {
                if (property != 'id') {
                    this._programme[property] = this.programme[property];
                }
            }

        }
    },
}
