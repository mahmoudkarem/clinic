<template>
    <div>
        <div class="form-group" v-for="(input, index) in inputs" v-bind:key="index">
            <input type="text" name="medicine[]" class="form-control">
            <span>
                <a href="" @click.prevent="add(index)" v-show="index == inputs.length-1" style="color: green;">Add More</a>
                &nbsp;
                <a href="" @click.prevent="remove(index)" v-show="index||(!index && inputs.length > 1)" style="color: red;">Remove</a>
            </span>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                inputs: [{}]
            }
        },

        methods: {
            add(){
                this.inputs.push({
                    medicine: ''
                })
            },
            remove(index) {
                this.inputs.splice(index, 1)
            }
        }
    }

</script>