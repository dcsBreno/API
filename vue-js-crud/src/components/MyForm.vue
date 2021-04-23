<template>
  <div class="my-form">
    <form class="ui form">
      <div class="fields">
        <div class="six wide field">
          <label>Nome</label>
          <input
            type="text"
            name="nome"
            placeholder="Nome"
            @change="handleChange"
            :value="form.nome"
          />
        </div>

        <div class="six wide field">
          <label>Descrição</label>
          <input
            type="text"
            name="descricao"
            placeholder="descrição"
            @change="handleChange"
            :value="form.descricao"
          />
        </div>

        <div class="four wide field">
          <label>Unidade de Medida</label>
          <input
            type="number"
            name="unidadeMedida"
            placeholder="unidade de medida"
            @change="handleChange"
            :value="form.unidadeMedida"
            min="0"
          />
        </div>
        <div class="four wide field">
          <label>Quantidade</label>
          <input
            type="number"
            name="quantidade"
            placeholder="Quantidade"
            @change="handleChange"
            :value="form.quantidade"
            min="0"
          />
        </div>

        <div class="two wide field">
          <button :class="btnClass" @click="onFormSubmit">
            {{ btnName }}
          </button>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  name: "MyForm",
  data() {
    return {
      btnName: "Salvar",
      btnClass: "ui primary button submit-button"
    };
  },
  props: {
    form: {
      type: Object
    }
  },
  methods: {
    handleChange(event) {
      const { name, value } = event.target;
      let form = this.form;
      form[name] = value;
      this.form = form;
    },
    onFormSubmit(event) {
      // prevent form submit
      event.preventDefault();

      // form validation
      if (this.formValidation()) {
        // window.console.log("ready to submit");
        this.$emit("onFormSubmit", this.form);

        // change the button to save
        this.btnName = "Salvar";
        this.btnClass = "ui primary button submit-button";

        // clear form fields
        this.clearFormFields();
      }
    },
    formValidation() {
      // first name
      if (document.getElementsByName("nome")[0].value === "") {
        alert("Falta o nome");
        return false;
      }

      // last name
      if (document.getElementsByName("descricao")[0].value === "") {
        alert("Falta a descrição");
        return false;
      }

      if (document.getElementsByName("unidadeMedida")[0].value === "") {
        alert("Falta unidade de Medida");
        return false;
      }
      if (document.getElementsByName("quantidade")[0].value === "") {
        alert("Falta a quantidade");
        return false;
      }

      return true;
    },
    clearFormFields() {
      // clear form data
      this.form.nome = "";
      this.form.descricao = "";
      this.form.unidadeMedida = "";
      this.form.quantidade = "";
      this.form.isEdit = false;

      // clear form fields
      document.querySelector(".form").reset();
    }
  },
  updated() {
    if (this.form.isEdit) {
      this.btnName = "Editar";
      this.btnClass = "ui orange button submit-button";
    }
  }
};
</script>

<style scoped></style>
