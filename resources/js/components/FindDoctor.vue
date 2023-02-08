<template>
    <div>
        <div class="card">
            <div class="card-header">Find Doctors</div>
            <div class="card-body">
                <Datepicker
                    class="my-datepicker"
                    calendar-class="my-datepicker_calendar"
                    :inline="true"
                    :disabledDates="disabledDates"
                    monday-first="true"
                    @selected="dateSelected"
                >
                </Datepicker>
            </div>
        </div>

        <div class="card">
            <div class="card-header"><h5>Available Doctors {{time}}</h5></div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Photo</th>
                            <th>Department</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(d, index) in doctors" v-bind:key="d.id">
                            <td>{{index + 1}}</td>
                            <td>{{d.doctor.name}}</td>
                            <td><img :src="'upload/doctors/' + d.doctor.image" width="80"></td>
                            <td>{{d.doctor.department}}</td>
                            <td><a :href="'/new/appointment/' + d.user_id + '/' + d.date"><button class="btn btn-success">Book Appointment</button></a></td>
                        </tr>
                        <td v-if="doctors.length == 0">No doctors available for {{time}}</td>
                    </tbody>
                </table>
                <div class="text-center">
                    <pulse-loader :loading="loading" :color="color" :size="size"></pulse-loader>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Datepicker from 'vuejs-datepicker';
    import moment from 'moment';
    import PulseLoader from 'vue-spinner/src/PulseLoader.vue';

    export default {
        data() {
            return {
              time: '',
              doctors: [],
              loading: true,
              disabledDates: {
                  to: new Date(Date.now() - 86400000),
                  from: new Date(Date.now() + 1209600000)
              },
            }
        },
        components: {
            Datepicker,
            PulseLoader
        },
        methods: {
            dateSelected(date) {
                this.loading = true;
                this.time = moment(date).format('YYYY-MM-DD');
                axios.post('/api/find/doctors', {
                    date: this.time
                }).then(response => {
                    setTimeout(() => {
                        this.loading = false;
                        this.doctors = response.data;
                    }, 1000)
                }).catch(error => {
                    alert(error);
                    this.loading = false
                })
            }
        },
        mounted() {
            axios.get('/api/doctor/today').then(response => {
                this.time = moment(new Date()).format('YYYY-MM-DD');
                this.doctors = response.data;
                this.loading = false;
            })
        }
    }

</script>

<style scoped>
    .my-datepicker >>> .my-datepicker_calendar {
        width: 100%;
        height: auto;
    }
</style>
