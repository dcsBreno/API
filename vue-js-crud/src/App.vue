<template>
  <div id="app">
    <div class="ui fixed inverted menu vue-color">
      <div class="ui container">
        <a href="#" class="header item center">REST API - Controle de estoque</a>
      </div>
    </div>

    <div class="ui main container">
      <MyForm :form="form" @onFormSubmit="onFormSubmit" />
      <Loader v-if="loader" />
      <CustomerList
        :customers="customers"
        @onDelete="onDelete"
        @onEdit="onEdit"
      />
    </div>
  </div>
</template>

<script>
import axios from "axios";
import MyForm from "./components/MyForm";
import CustomerList from "./components/CustomerList";
import Loader from "./components/Loader";

export default {
  name: "App",
  components: {
    MyForm,
    CustomerList,
    Loader
  },
  data() {
    return {
      url: "http://127.0.0.1:8000/api/customers",
      customers: [],
      form: { nome: "", descricao: "", unidadeMedida: "", quantidade: "", isEdit: false },
      loader: false
    };
  },
  methods: {
    getCustomers() {
      this.loader = true;

      axios.get(this.url).then(data => {
        this.customers = data.data;
        this.loader = false;
      });
    },
    deleteCustomer(id) {
      this.loader = true;

      axios
        .delete(`${this.url}/${id}`)
        .then(() => {
          this.getCustomers();
        })
        .catch(e => {
          alert(e);
        });
    },
    createCustomer(data) {
      this.loader = true;

      axios
        .post(this.url, {
          nome: data.nome,
          descricao: data.descricao,
          unidadeMedida: data.unidadeMedida,
          quantidade: data.quantidade
        })
        .then(() => {
          this.getCustomers();
        })
        .catch(e => {
          alert(e);
        });
    },
    editCustomer(data) {
      this.loader = true;

      axios
        .put(`${this.url}/${data.id}`, {
          nome: data.nome,
          descricao: data.descricao,
          unidadeMedida: data.unidadeMedida,
          quantidade: data.quantidade
        })
        .then(() => {
          this.getCustomers();
        })
        .catch(e => {
          alert(e);
        });
    },
    onDelete(id) {
      this.deleteCustomer(id);
    },
    onEdit(data) {
      this.form = data;
      this.form.isEdit = true;
    },
    onFormSubmit(data) {
      if (data.isEdit) {
        this.editCustomer(data);
      } else {
        this.createCustomer(data);
      }
    }
  },
  created() {
    this.getCustomers();
  }
};
</script>

<style>
.vue-color {
  background: #0018F9 !important;
}

.main.container {
  margin-top: 60px;
}

.submit-button {
  margin-top: 24px !important;
  float: right;
}

.data {
  margin-top: 15px;
}

thead tr th {
  background: #e0e0e0 !important;
}

.ui.inverted.dimmer {
  background-color: rgba(255, 255, 255, 0) !important;
}
</style>
