Vue.component('vue-mask', {

    props: ['placeholder', 'name', 'id', 'disabled', 'css', 'value', 'mask'],

    mounted: function () {
      var vm = this
      $(this.$el).mask(vm.mask, {
         
         placeholder: vm.placeholder

      }).on('keyup', function(e){
        vm.$emit('input', {val: $(e.target).val(), id: vm.id});
      });
    },

    template: `
        <input type="text" :name="name" class="form-control modul-keuangan" :id="id" :disabled="disabled" :style="css" :value="(value) ? value : ''">
    `,
});