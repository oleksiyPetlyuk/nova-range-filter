<template>
    <div>
        <h3 class="text-sm uppercase tracking-wide text-80 bg-30 p-3">{{ filter.name }}</h3>

        <div class="p-2 pl-6 pr-6 pt-8">
            <vue-slider :value="value"
                        :lazy="true"
                        :tooltip="getOption('tooltip') || tooltip"
                        :min="getOption('min') || min"
                        :max="getOption('max') || max"
                        @change="handleChange"/>
        </div>
    </div>
</template>

<script>
    import VueSlider from 'vue-slider-component'
    import 'vue-slider-component/theme/default.css'

    export default {
        components: {
            VueSlider
        },

        data() {
            return {
                min: 0,
                max: 100,
                tooltip: 'always'
            }
        },

        props: {
            resourceName: {
                type: String,
                required: true
            },
            filterKey: {
                type: String,
                required: true
            }
        },

        methods: {
            handleChange(value) {
                this.$store.commit(`${this.resourceName}/updateFilterState`, {
                    filterClass: this.filterKey,
                    value: value
                })

                this.$emit('change')
            },

            getOption(name) {
                const option = this.filter.options.find(o => o.name === name)

                if (!option) {
                    return false
                }

                return option.value
            }
        },

        computed: {
            filter() {
                return this.$store.getters[`${this.resourceName}/getFilter`](this.filterKey)
            },

            value() {
                return this.filter.currentValue
            }
        }
    }
</script>
