<template>
  <div class="form-group"
       :class="{'in-focus': hasFocus, error: (!!error && hadBlurred)}">
    <label :for="id" :class="{visited: !!value}">{{label}}*</label>
    <input :id="id" :type="type" :value="value"
           @input="onInput" @focus="onFocus" @blur="onBlur"
           class="form-control">
    <p v-if="!!error && hadBlurred" class="input-error">{{error}}</p>
  </div>
</template>

<script>
  export default {
    name: "IFTAInput",
    props: ['id', 'value', 'label', 'type', 'error'],
    data: () => ({
      hasFocus: false,
      hadBlurred: false,
    }),
    methods: {
      onInput(x) {
        this.$emit('input', x.target.value);
      },
      onFocus() {
        this.hasFocus = true;
      },
      onBlur() {
        this.hasFocus = false;
        this.hadBlurred = true;
      }
    }
  }
</script>

<style lang="scss" scoped>
  @import "../../sass/variables";

  .form-group {
    background-color: white;
    border: 1px solid #ced4da;

    &.in-focus {
      border-color: #1899FA;
      box-shadow: 0 0 0 0.1rem #1899FA;

      label {
        color: #1899FA;
      }
    }

    &.error {
      border-color: $primary-red;
      box-shadow: 0 0 0 0.1rem $primary-red;

      label {
        color: $primary-red;
      }
    }

    label {
      font-size: .9rem;
      padding-left: .75rem;
      margin-bottom: 0;

      &.visited {
        color: #1899FA;
      }
    }

    .form-control {
      border: none;
      height: auto;
      padding-top: .3rem;
      padding-bottom: .2rem;

      &:focus {
        box-shadow: none;
      }
    }

    .input-error {
      margin-top: .25rem;
      margin-bottom: 0;
      padding-left: .75rem;
      font-size: 80%;
      color: $primary-red;
    }
  }
</style>
