<template>
    <div class="container">

        <form>
            <div class="form-group">
                <label for="sel1"><Strong>Duration</Strong></label>
                <select class="form-control" id="sel1">
                    <option>15 mins</option>
                    <option>30 mins</option>
                    <option>45 mins</option>
                    <option>1 hour</option>
                </select>
                <br>

            </div>
            <div class="form-group">
                <label for="sel1"><Strong> Time slot </Strong></label>
                <select class="form-control" id="sel1">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                </select>
                <br>

            </div>
        </form>
        {{slots}}
        {{ip}}
    </div>
</template>

<script>
    export default {
        props: {
          ip: String,
          expertOffset: Number,
            start: Number,
           end: Number,
        },
        data() {
          return {
              email: '',
              duration: 15,
              slots: []
          }
        },
        mounted() {
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
                let userOffset = now.getTimezoneOffset();
                for(let t = start; t <= end; t += this.duration) {
                    let offset = userOffset - this.expertOffset;
                    let newTime = (t + offset + 24 * 60 ) % (24 * 60);
                    let h = newTime / 60;
                    let m = newTime % 60;
                    slots.push(h+":"+m);
                }
                return slots;
            }
        }
    }
</script>
