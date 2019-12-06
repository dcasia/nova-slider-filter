<template>
    <div>
        <h3 class="text-sm uppercase tracking-wide text-80 bg-30 p-3">
            {{ filter.name }}
        </h3>

        <div class="p-2 pt-6 flex flex-row items-center">
            <div class="text-xs flex-shrink-0 mr-2">{{ filter.min }}{{ filterLabel }}</div>
            <vue-slider v-model="sliderValue"
                        :min="filter.min"
                        :max="filter.max"
                        :processStyle="processStyle"
                        :railStyle="railStyle"
                        :dotStyle="dotStyle"
                        :tooltipStyle="tooltipStyle"
                        :dotSize="20"
                        :contained="true"
                        :enable-cross="false"
                        tooltip="always"
                        :clickable="false"
                        :tooltipFormatter="val => `${val}${filterLabel}`"
                        @drag-end="handleChange"
                        width="100%"
                        class="slider"
                        :duration="0"></vue-slider>
            <div class="text-xs flex-shrink-0 ml-2">{{ filter.max }}{{ filterLabel }}</div>
        </div>
    </div>
</template>

<script>
    import VueSlider from 'vue-slider-component'

    export default {
        data() {
            return {
                sliderValue: [ 0, 300 ],
                processStyle: {
                    backgroundColor: 'var(--primary)'
                },
                railStyle: {
                    backgroundColor: '#DADEE1',
                    borderRadius: '3px'
                },
                dotStyle: {
                    border: '1px solid #E7E8E9',
                    boxShadow: '0 2px 5px 0 rgba(234,234,234,0.50)'
                },
                tooltipStyle: {
                    backgroundColor: '#191919',
                    padding: '4px 5px',
                    fontFamily: 'Gotham-Medium',
                    fontSize: '10px',
                    marginBottom: '-5px',
                    color: '#FFFFFF'
                }
            }

        },
        mounted() {
            if (this.value === '') {
                return this.sliderValue = [ this.filter.min, this.filter.max ]
            }
            this.sliderValue = this.value
        },
        components: {
            VueSlider
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
            handleChange() {
                this.$store.commit(`${ this.resourceName }/updateFilterState`, {
                    filterClass: this.filterKey,
                    value: this.sliderValue
                })

                this.$emit('change')
            }
        },

        computed: {
            filter() {
                return this.$store.getters[ `${ this.resourceName }/getFilter` ](
                    this.filterKey
                )
            },

            value() {
                return this.filter.currentValue
            },

            filterLabel(){
                return this.filter.label ??  ''
            }

        }
    }
</script>

<style scoped lang="scss">
    .flex-shrink-0 {
        flex-shrink: 0;
    }
    .ml-2 {
        margin-left: .5rem;
    }
    .mr-2 {
        margin-right: .5rem;
    }
    .slider {
        max-width: 312px;
    }
</style>

<style lang="scss">
    $tooltipArrow: 0px;
    @import '~vue-slider-component/lib/theme/default.scss';
</style>