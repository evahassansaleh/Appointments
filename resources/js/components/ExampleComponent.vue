<template>
    <div class="container">

        <form>
            <center><h2>  Appointments </h2> </center>

            <p><strong>  Select</strong> Appointment Date: .</p>

            <div class="form-group">
                <label for="calender"> <Strong>Calendar</Strong> </label>
                <input type="date" id="calender"  class="form-control" v-model="date" name="calender">
            </div>

            <div class="form-group">
                <label for="sel1"><Strong>Duration</Strong></label>
                <select class="form-control" v-model="duration" @change="onChange($event)" id="sel1">
                    <option v-for="x in [15, 30, 45, 60]" v-bind:key="x" :value="x">{{x}} mins</option>
                </select>
                <br>

            </div>
            <div class="form-group">
                <label for="sel1"><Strong> Time slot </Strong></label>
                <select class="form-control" id="sel11" v-model="slot" >
                    <option v-for="x in slots" v-bind:key="x" :value="x">{{formatTime(x)}}</option>
                </select>
                <br>
            </div>
        </form>
        <div v-if="date != ''">
            <p class="text"><strong>Your appointment will be on</strong> </p>
            <p class="text"> <strong> {{dateFormat(date)}} </strong> </p>
            <p class="text"> <strong> from {{formatTime(slot)}} to {{formatTime(slot + duration)}} </strong> </p>
        </div>

    </div>
</template>

<script>
    export default {
        props: {
            ip: String,
            id: Number,
        },
        data() {
          return {
              date: '',
              exoffset: 0,
              start: 6 * 60,
              end: 10 * 60,
              email: '',
              duration: 15,
              slots: [],
              slot: '',
              experts: [
                  {
                      name: 'William Jordan',
                      start: 6*60,
                      end: 17*60,
                      timeZoneOffSet: 12*60,
                  },
                  {  name: 'Quasi Shawa',
                      start: 6*60,
                      end: 12*60,
                      timeZoneOffSet: 3*60,
                  },
                  {  name: 'Shimaa Badawy',
                      start: 13*60,
                      end: 14*60,
                      timeZoneOffSet: 2*60,
                  }
              ]
          }
        },
        mounted() {
            this.exoffset = this.experts[this.id].timeZoneOffSet;
            this.start = this.experts[this.id].start;
            this.end = this.experts[this.id].end;
            this.slots = this.getSlots();
            console.log('Component mounted.')
        },
        methods: {
            getTime(h) {
                let date = new Date();
                date.setHours(5);
                return date;
            },
            getSlots() {
                let slots = [];
                const now = new Date();
                let userOffset = -1 * now.getTimezoneOffset();
                console.log(userOffset);
                for(let t = this.start; t <= this.end; t += this.duration) {
                    let offset = userOffset - this.exoffset;
                    let newTime = (t + offset + 24 * 60 ) % (24 * 60);
                    slots.push(newTime);
                }
                return slots;
            },
            onChange(event) {
                this.slots = this.getSlots();
          //      console.log(event.target.value)
            },
            dateFormat(dateString) {
                const date = new Date(dateString);
                const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
                return date.toLocaleDateString("en-US", options);
            },
            formatTime(newTime) {
                let h = parseInt((newTime / 60).toString() );
                let m = newTime % 60;
                return h.toString()+":"+m.toString();
            }
        },
    }
</script>


<style>
    .text{
        color: blue;
    }
</style>
