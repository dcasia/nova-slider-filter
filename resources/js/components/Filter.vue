<template>

    <FilterContainer class="nova-slider-filter">

        <span>{{ filter.name }}</span>

        <template #filter>

            <div class="flex flex-row items-center justify-center"
                 :class="{
                    'pt-6': filter.tooltip !== 'never',
                    'p-2 pb-6': filter.marks !== undefined,
                 }">

                <div v-if="!filter.disableMinMaxLabels"
                     class="text-xs flex-shrink-0 mr-2"
                     @click="value = [ filter.min, value[ 1 ] ]">

                    {{ replaceTokens(filterLabel, { value: filter.min }) }}

                </div>

                <VueSlider
                    v-model="value"
                    width="100%"
                    :lazy="true"
                    :min="filter.min"
                    :max="filter.max"
                    :min-range="filter.minRange"
                    :max-range="filter.maxRange"
                    :contained="true"
                    :enable-cross="filter.enableCross || false"
                    :tooltip="filter.tooltip || 'always'"
                    :clickable="true"
                    :interval="filter.interval"
                    :tooltip-formatter="tooltipFormatter"
                    :marks="filter.marks"
                    :duration="0.2"/>

                <div v-if="!filter.disableMinMaxLabels"
                     class="text-xs flex-shrink-0 ml-2"
                     @click="value = [ value[ 0 ], filter.max ]">

                    {{ replaceTokens(filterLabel, { value: filter.max }) }}

                </div>

            </div>

        </template>

    </FilterContainer>

</template>

<script>

    import VueSlider from 'vue-slider-component'

    export default {
        name: 'NovaSliderFilter',
        components: {
            VueSlider,
        },
        props: {
            resourceName: {
                type: String,
                required: true,
            },
            filterKey: {
                type: String,
                required: true,
            },
        },
        computed: {
            filter() {

                return this.$store.getters[ `${ this.resourceName }/getFilter` ](
                    this.filterKey,
                )

            },
            value: {
                get() {

                    if (this.filter.mode === 'single') {
                        return this.filter.currentValue || this.filter.min
                    }

                    return Object.values(this.filter.currentValue || [ ...this.filter.values ])

                },
                set(sliderValue) {

                    if (sliderValue === this.filter.min) {
                        sliderValue = ''
                    }

                    if (
                        Array.isArray(sliderValue) &&
                        Object.values(this.filter.values).every((value, index) => sliderValue[ index ] === value)
                    ) {
                        sliderValue = ''
                    }

                    this.$store.commit(`${ this.resourceName }/updateFilterState`, {
                        filterClass: this.filterKey,
                        value: sliderValue,
                    })

                    this.$emit('change')

                },
            },
            filterLabel() {
                return this.filter.label ?? '{value}'
            },
        },
        methods: {
            replaceTokens(template, tokens) {

                for (const [ key, value ] of Object.entries(tokens)) {
                    template = template.replace(`{${ key }}`, value)
                }

                return template

            },
            tooltipFormatter(value) {
                return this.replaceTokens(this.filterLabel, { value: value })
            },
        },
    }

</script>

<style lang="scss">

    $tooltipArrow: 0px;

    @import '~vue-slider-component/lib/theme/default.scss';

    .dark .nova-slider-filter {

        .vue-slider-rail {
            background-color: rgba(var(--colors-gray-700));
        }

        .vue-slider-process {
            background-color: rgba(var(--colors-primary-500));
        }

        .vue-slider-dot-tooltip-inner {
            color: rgba(var(--colors-gray-400));
            background: rgba(var(--colors-gray-800));
        }

    }

    .nova-slider-filter {

        .vue-slider-dot-tooltip-inner {
            color: rgba(var(--colors-gray-500));
            font-size: 12px;
            margin-bottom: -5px;
            padding: 2px 5px;
            border-radius: 0.25rem;
            font-weight: bold;
            background-color: rgba(var(--colors-gray-200));
        }

    }

</style>
