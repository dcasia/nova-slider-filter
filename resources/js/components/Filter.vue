<template>

    <div>

        <h3 class="text-sm uppercase tracking-wide text-80 bg-30 p-3">
            {{ filter.name }}
        </h3>

        <div class="p-2 pt-6 flex flex-row items-center">

            <div class="text-xs flex-shrink-0 mr-2">{{ filter.min }}{{ filterLabel }}</div>

            <VueSlider class="slider"
                       v-model="value"
                       width="100%"
                       :lazy="true"
                       :min="filter.min"
                       :max="filter.max"
                       :process-style="processStyle"
                       :rail-style="railStyle"
                       :dot-style="dotStyle"
                       :tooltip-style="tooltipStyle"
                       :dot-size="20"
                       :contained="true"
                       :enable-cross="false"
                       tooltip="always"
                       :clickable="false"
                       :tooltip-formatter="tooltipFormatter"
                       :duration="0"/>

            <div class="text-xs flex-shrink-0 ml-2">{{ filter.max }}{{ filterLabel }}</div>

        </div>

    </div>

</template>

<script>

    import VueSlider from 'vue-slider-component'

    export default {
        name: 'NovaSliderFilter',
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
        data() {

            return {
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
                    fontSize: '10px',
                    marginBottom: '-5px',
                    color: '#FFFFFF'
                }
            }

        },
        computed: {
            filter() {

                return this.$store.getters[ `${ this.resourceName }/getFilter` ](
                    this.filterKey
                )

            },
            value: {
                get() {

                    return this.filter.currentValue || [ this.filter.min, this.filter.max ]

                },
                set(sliderValue) {

                    this.$store.commit(`${ this.resourceName }/updateFilterState`, {
                        filterClass: this.filterKey,
                        value: sliderValue
                    })

                    this.$emit('change')

                }
            },
            filterLabel() {

                return this.filter.label ?? ''

            }
        },
        methods: {
            tooltipFormatter(value) {
                return `${ value }${ this.filterLabel }`
            }
        }
    }

</script>

<style scoped lang="scss">

    .flex-shrink-0 {
        flex-shrink: 0;
    }

    .slider {
        max-width: 312px;
    }

</style>

<style lang="scss">

    $tooltipArrow: 0px;

    @import '~vue-slider-component/lib/theme/default.scss';

</style>
