<template>
    <div class="container">
      <div class="container">
        <img src="https://i.stack.imgur.com/34AD2.jpg"  style="width:25%;">
        <div>
          {{experts[id].name}}
        </div>
        <div>
         {{experts[id].job}}
       </div>
       <div style="border-style: solid; padding: 5px;">
         <div style="padding: 3px;">
            Country: {{experts[id].country}}
         </div>
         <div style="padding: 3px;">
             Working hours:  {{formatTime(experts[id].start) }} - {{formatTime(experts[id].end) }}
         </div>
       <div style="padding: 3px;" > Working hours on your local time: {{formatTime(toLocal(experts[id].start)) }} - {{formatTime(toLocal(experts[id].end)) }} </div>
       </div>
        <div style="padding: 3px;"><center><a class="btn btn-primary" type="button" :href="'http://appointments.algoroot.com/appointments/'+id"> Book now</a> </center></div>
      </div>
    </div>
</template>

<script>
    export default {
        name: 'expert-info',
        props: {
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
                      job: 'Doctor',
                      country: 'Anabar',
                      start: 6*60,
                      end: 17*60,
                      timeZoneOffSet: 12*60,
                  },
                  {   name: 'Quasi Shawa',
                      job: 'Civil Engineer',
                      country: 'Syria',
                      start: 6*60,
                      end: 12*60,
                      timeZoneOffSet: 3*60,
                  },
                  {   name: 'Shimaa Badawy',
                      job: 'Computer Engineer',
                      country: 'Egypt',
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
            toLocal(t){
                const now = new Date();
                let userOffset =  now.getTimezoneOffset();
                let offset =  this.exoffset + userOffset;
                let newTime = (t + offset + 24 * 60 ) % (24 * 60);
                return newTime;
            },
            getSlots() {
                let slots = [];
                const now = new Date();
                let userOffset =  now.getTimezoneOffset();
               // alert(userOffset);
                for(let t = this.start; t + this.duration <= this.end; t += this.duration) {
                    let offset =  this.exoffset + userOffset;
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
                const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', timeZoneName: 'short'};
                return date.toLocaleDateString("en-US", options);
            },
            formatTime(newTime) {
                let h = parseInt((newTime / 60).toString() );
                let m = newTime % 60;
                let mode = h >=12? " PM" : " AM";
                if(h > 12){
                 h -= 12;
                }
                return  ( h.toString().length != 2 ? ("0"+ h.toString()) : h.toString()) +":"+ (m.toString().length != 2 ? ("0" +m.toString()) : m.toString() ) + mode;
             //   return ( h.toString().length() != 2 ? ("0"+ h.toString()) : h.toString()) +":"+m.toString() + mode;
            }
        },
    }
</script>


<style>
    .text{
        color: blue;
    }

.btn{
 pading: 3px;
}

.container{
  padding: 5px;
}
</style>
