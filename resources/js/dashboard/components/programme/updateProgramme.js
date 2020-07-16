import { apiService } from '../../_services/apiService';
export default {
    
    props: ["_seance"],

    data() {
        return {
            modalSeance: [],
            seance: {},
            params: {
                exercice: {
                    type: 'text'
                },
                quantite_serie: {
                    type: 'textarea'
                },
                temps_recuperation: {
                    type: 'text'
                },
                nombre_jours: {
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
            if (this._seance[item.key] != item.value) {
                let datas = this.getUpdatedSeance(item);
                apiService.post('/api/programmes/seance/' + this._seance.id, datas)
                    .then(resp => {
                        if (_.isObject(resp.data)) {
                            this._seance[item.key] = resp.data.data[item.key];
                        }
                        this.prepareDisplay();
                    }).catch(error => {
                        console.log(error);
                    });

            } else {
                item.editBool = false;
            }
        },
        getUpdatedSeance(item) {
            this.prepareLocalSeance();
            if (this.seance.hasOwnProperty(item.key)) {
                this.seance[item.key] = item.value;
            }
            return this.seance;
        },
        prepareDisplay() {
            this.modalSeance = [];
            for (const property in this._seance) {
                if (this.params.hasOwnProperty(property)) {
                    this.modalSeance.push({
                        key: property,
                        value: this._seance[property],
                        editBool: false,
                        type: this.params[property].type
                    })
                }
            }
        },

        prepareLocalSeance() {
            this.seance = {};
            for (const property in this._seance) {
                if (property != 'id') {
                    this.seance[property] = this._seance[property];
                }
            }

        }
    },
}