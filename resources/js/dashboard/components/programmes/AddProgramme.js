import { apiService } from '../../_services/apiService';
export default {
    props: ["programmes"],

    data() {
        return {
            valeurSeance: {},
            selectSeance: {},
            itemsSeance: [],

            valeurSdsport: {},
            selectSdsport: {},
            itemsSdsport: [],

            valeurImg: {},
            selectImg: {},
            itemsImg: [],

            dialog: false,
            snackbar: false,
            text: '',
            timeout: 3000,
            id_salle_de_sport: '',
            id_salle_de_sportRules: [
                v => !!v || 'Une salle de sport est requise',
            ],
            id_seance: '',
            id_seanceRules: [
                v => !!v || 'Une seance est requise',
            ],
            name: '',
            nameRules: [
                v => !!v || 'Un nom de circuit est requis',
                v => (v && v.length <= 25) || 'Le nom ne doit pas être supérieure à 25 Caractères',
            ],
            difficulte: '',
            difficulteRules: [
                v => !!v || 'Une difficulte est requise',
            ],
            nbre_seance_semaine: '',
            nbre_seance_semaineRules: [
                v => !!v || 'Un nombre de séance par semaine est requis',
            ],
            prix: '',
            prixRules: [
                v => !!v || 'Un prix est requise',
            ],
            image: '',
            imageRules: [
                v => !!v || 'Une image est requise',
            ],

        }
    },
    methods: {
        ajout() {
            apiService.post('/api/programmes/', {
                id_user: this.$route.params.id,
                id_salle_de_sport: this.selectSdsport.id,
                id_seance: this.selectSeance.id,
                name: this.name,
                difficulte: this.difficulte,
                nbre_seance_semaine: this.nbre_seance_semaine,
                prix: this.prix,
                id_image: this.selectImg.id

            }).then(response => {
                    this.dialog = false;
                    console.log(response.data.data);
                    this.$emit('addProgramme', response.data.data)
                    this.snackbar = true;
                    this.text = 'Le programme a bien été ajouté'
            }).catch()
        },

        recupId() {
            apiService.get('/api/programmes')
                .then(({ data }) => {
                    data.data.forEach(_programmes => {
                        this.valeurSdsport = Object.create({}, { name: { value: _programmes.salleDeSport.name }, id: { value: _programmes.salleDeSport.id } });
                        this.itemsSdsport.push(this.valeurSdsport);

                        this.valeurSeance = Object.create({}, { name: { value: _programmes.seance.name }, id: { value: _programmes.seance.id } });
                        this.itemsSeance.push(this.valeurSeance);

                        this.valeurImg = Object.create({}, { name: { value: _programmes.image.lien }, id: { value: _programmes.image.id } });
                        this.itemsImg.push(this.valeurImg);
                    })

                })
                .catch();

        }


    },

    created() {
        this.recupId();
    }
}