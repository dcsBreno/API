<template>
  <tr>
    <td>{{ customer.id }}</td>
    <td>{{ customer.nome }}</td>
    <td> {{ customer.descricao }}</td>
    <td>{{ customer.unidadeMedida }}</td>
    <td>{{ customer.quantidade  }}</td>
    <td>
      <button class="mini ui blue button" @click="onEdit">Editar</button>
      <button class="mini ui red button" @click="onDelete">Deletar</button>
    </td>
  </tr>
</template>

<script>
export default {
  name: "Customer",
  props: {
    customer: {
      type: Object
    }
  },
  methods: {
    onDelete() {
      this.$emit("onDelete", this.customer.id);
    },
    onEdit() {
      this.$emit("onEdit", this.customer);
    }
  }
};
</script>

<style scoped></style>
