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
            today: '2019-01-08',
            events: [
                {
                    name: 'Weekly Meeting',
                    start: '2019-01-07 09:00',
                    end: '2019-01-07 10:00',
                },
                {
                    name: 'Thomas\' Birthday',
                    start: '2019-01-10',
                },
                {
                    name: 'Mash Potatoes',
                    start: '2019-01-09 12:30',
                    end: '2019-01-09 15:30',
                },
            ],
        }
    },

    methods: {
        getDatas() {
            apiService.get('/api/gerant/' + this.$route.params.id).then(({ data }) => {
                data.forEach(_data => {
                    this.salle.push(_data);
                })
            })
        }
    },

    created() {
        this.getDatas();
    }
}