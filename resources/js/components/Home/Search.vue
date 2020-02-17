<template>
  <div>
    <div class="input-group pb-2">
      <div class="input-group-prepend">
        <span class="input-group-text">
          <font-awesome-icon :icon="faSearch"/>
        </span>
      </div>
      <input :value="value" @input="onInput" type="text"
             class="form-control" :placeholder="$t('home.search')">
    </div>
    <hr class="my-0">
  </div>
</template>

<script>
  import {faSearch} from "@fortawesome/free-solid-svg-icons";

  export default {
    name: "Search",
    props: ['value'],
    computed: {
      faSearch: () => faSearch,
    },
    methods: {
      onInput(x) {
        this.$emit('input', x.target.value);
      },
    }
  }
</script>

<style scoped lang="scss">
  svg {
    color: var(--secondary);
    font-size: 1.4rem;
  }

  .input-group-text {
    background-color: transparent;
    border: none;
  }

  input {
    margin-top: -.2rem;
    width: calc(100% - 1.7em);
    border: none;
    box-shadow: none !important;
  }

  hr {
    border-color: var(--secondary);
  }
</style>
