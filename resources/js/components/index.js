import Button from "primevue/button"
import InputText from 'primevue/inputtext';
import AutoComplete from 'primevue/autocomplete';
import Calendar from 'primevue/calendar';
import CascadeSelect from 'primevue/cascadeselect';
import Checkbox from 'primevue/checkbox';
import Dropdown from 'primevue/dropdown';
import Password from 'primevue/password';
import RadioButton from 'primevue/radiobutton';
import Textarea from 'primevue/textarea';
import ToggleButton from 'primevue/togglebutton';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import ConfirmDialog from 'primevue/confirmdialog';
import Dialog from 'primevue/dialog';
import FileUpload from 'primevue/fileupload';
import Toast from 'primevue/toast';
import Message from 'primevue/message';
import ProgressSpinner from 'primevue/progressspinner';
import Carousel from 'primevue/carousel';
import MultiSelect from 'primevue/multiselect';
import Tree from "primevue/tree";
import Card from 'primevue/card';
import ConfirmPopup from 'primevue/confirmpopup';
import SplitButton from 'primevue/splitbutton';
import Tag from 'primevue/tag';
import SelectButton from 'primevue/selectbutton';
import Toolbar from 'primevue/toolbar';
import InputNumber from 'primevue/inputnumber';

import FormGroup from './FormGroup.vue';

export default function addGlobalComponents(app) {
    app
        .component('Button', Button)
        .component('InputText', InputText)
        .component('AutoComplete', AutoComplete)
        .component('Calendar', Calendar)
        .component('CascadeSelect', CascadeSelect)
        .component('Checkbox', Checkbox)
        .component('Dropdown', Dropdown)
        .component('Password', Password)
        .component('RadioButton', RadioButton)
        .component('Textarea', Textarea)
        .component('ToggleButton', ToggleButton)
        .component('DataTable', DataTable)
        .component('Column', Column)
        .component('ConfirmDialog', ConfirmDialog)
        .component('Dialog', Dialog)
        .component('FileUpload', FileUpload)
        .component('Toast', Toast)
        .component('Message', Message)
        .component('ProgressSpinner', ProgressSpinner)
        .component('Carousel', Carousel)
        .component('MultiSelect', MultiSelect)
        .component('ConfirmPopup', ConfirmPopup)
        .component('Tree', Tree)
        .component('Card', Card)
        .component('SplitButton', SplitButton)
        .component('Tag', Tag)
        .component('SelectButton', SelectButton)
        .component('Toolbar', Toolbar)
        .component('InputNumber', InputNumber)
        .component('FormGroup', FormGroup)
}