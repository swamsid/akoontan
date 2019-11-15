import select2 from 'select2';
import 'select2/dist/css/select2.min.css';
import 'select2-bootstrap-theme/dist/select2-bootstrap.min.css';

export default {

	props: ['name', 'id', 'title', 'options', 'disabled', 'search', 'value', 'styles', 'classes', 'placeholders'],

    mounted: function(){
    	var vm = this;

        if(!this.search){
            this.$select2 = $(this.$el).select2({
                theme: "bootstrap",
                dropdownAutoWidth: true,
                minimumResultsForSearch: Infinity,
                width: '100%',
                placeholder: this.placeholders,
                data: this.options
            }).on('change', function(e){
                vm.$emit('option-change', $(e.target).val())
            })

            // if(this.value){
            //     // alert(this.value);
                $(this.$el).val(this.value).trigger('change.select2');
            // }
        }else{
            this.$select2 = $(this.$el).select2({
                theme: "bootstrap",
                dropdownAutoWidth: true,
                width: '100%',
                placeholder: this.placeholders,
                data: this.options
            }).on('change', function(e){
                vm.$emit('option-change', $(e.target).val())
            });

            // if(this.value){
            //     // alert(this.value);
                $(this.$el).val(this.value).trigger('change.select2');
            // }
        }
    },

    watch: {
    	options: function(newOpts){
            if(!this.search){
                this.$select2.empty().select2({
                    theme: "bootstrap",
                    dropdownAutoWidth: true,
                    minimumResultsForSearch: Infinity,
                    width: '100%',
                    placeholder: this.placeholders,
                    data: newOpts
                })

                // if(this.value){
                //     // alert(this.value);
                    $(this.$el).val(this.value).trigger('change.select2');
                // }
            }else{
                this.$select2.empty().select2({
                    theme: "bootstrap",
                    dropdownAutoWidth: true,
                    width: '100%',
                    placeholder: this.placeholders,
                    data: newOpts
                })

                // if(this.value){
                //     // alert(this.value);
                    $(this.$el).val(this.value).trigger('change.select2');
                // }
            }
    	}
    },
    methods: {
        closed: function(e){
            alert('aa');
        }
    },
    template: `
      	<select :class="'form-control form-control-sm'+classes" :name="name" :id="id" :title="title" :disabled="disabled" :style="styles"></select>
    `,
};