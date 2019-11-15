import inputmask from 'inputmask';
import 'inputmask/dist/inputmask/jquery.inputmask.js';

export default {

    props: ['placeholder', 'name', 'id', 'disabled', 'css', 'value', 'minus', 'leading', 'types', 'classes'],

    mounted: function () {
      var vm = this; var radix = '.'; var separator = ','; var digit = 2;

      if(this.types == 'number')
        radix = separator = ''; digit = 2;

      $(this.$el).inputmask("currency", {
          radixPoint: radix,
          groupSeparator: separator,
          digits: digit,
          allowMinus: vm.minus,
          autoGroup: true,
          prefix: (vm.leading) ? vm.leading : '', //Space after $, this will not truncate the first character.
          rightAlign: false,
          oncleared: function () {  }
      }).on('keyup', function(e){
        vm.$emit('input', $(e.target).val());
      })
    },

    methods: {
      // handleInput (e) {
      //   this.$emit('input', 20000)
      // }
    },

    template: `
        <input type="text" :name="name" :class="'form-control text-right modul-keuangan '+classes" :id="id" :disabled="disabled" :style="css" :value="(value) ? value : ''">
    `,
};