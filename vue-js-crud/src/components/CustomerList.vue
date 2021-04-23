<template>
  <div class="customer-list">
    <div class="data">
      <table class="ui celled table" style="text-align:center;">
        <thead>
          <tr>
            <th style="width: 50px; text-align: center;">Id</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Unidade de Medida</th>
            <th>Quantidade</th>
            <th >Action</th>
          </tr>
        </thead>

        <tbody>
          <Customer
            v-for="customer in customers"
            :key="customer.id"
            :customer="customer"
            @onDelete="onDelete"
            @onEdit="onEdit"
          />
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
import Customer from "./Customer";
export default {
  name: "CustomerList",
  components: {
    Customer
  },
  props: {
    customers: {
      type: Array
    }
  },
  methods: {
    onDelete(id) {
      this.$emit("onDelete", id);
    },
    onEdit(data) {
      this.$emit("onEdit", data);
    }
  }
};
</script>

<style scoped></style>
