import AddProgramme from './AddProgramme.vue';
import DeleteProgramme from '../programmes/DeleteProgramme.vue';
import { apiService } from '../../_services/apiService';

export default {

    components: {
        AddProgramme,
        DeleteProgramme,
    },
    
    data() {
        return {
            programmes: [],
            headers: [{
                text: "Programmes",
                align: "start",
                sortable: false,
                value: "programmes"
            },
            { text: "difficulte", value: "difficulte" },
            { text: "seance", value: "seance.exercice" },
            { text: "image", value: "image.lien" },
            { text: "actions", value: "actions" },
    
            ],
           
        }

    },
    methods: {
        getDatas() {
            apiService.get('/api/programmes/coach/' + this.$route.params.id)
                .then(({ data }) => {
                    data.data.forEach(_data => {
                        this.programmes.push(_data);
                    })
                    
                })
                .catch();
        },

        update(item, programme) {

            console.log('update', programme);
            const index = _.findIndex(this.programmes, {id: programme.id});
            this.programmes.splice(index, 1, programme);
            
        },

        add(programme) {
            const index = _.findIndex(this.programmes, {id: programme.id});
            this.programmes.push(programme);
        }
    },

    created() {
        this.getDatas();
        console.log('toto');
    }
}