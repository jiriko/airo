<script setup>
import {computed, ref} from 'vue';
const {
  token,
} = useAuth()
const ageOptions = computed(() => {
  const options = [];
  for (let age = 18; age <= 70; age++) {
    options.push({value: age, label: age.toString()});
  }
  return options;
});

const quotation = ref(null)
const submitQuotation = async (formData) => {
  // Convert the selected ages to a comma-separated string
  formData.age = formData.age.join(', ');

  const headers = {
    'Content-Type': 'application/json',
  }

  if (token.value) {
    headers['Authorization'] = token.value
  }


  try {
    const response = await fetch('http://localhost/api/trip-quotations', {
      method: 'POST',
      headers,
      body: JSON.stringify(formData),
    });

    if (!response.ok) {
      throw new Error(`HTTP error! status: ${response.status}`);
    }

    const data = await response.json();
    quotation.value = data.data
  } catch (error) {
    console.error('Error:', error);
  }
};
</script>
<template>
  <div class="form-container">
    <FormKit
        v-if="! quotation"
        type="form"
        id="quotation-form"
        submit-label="Submit"
        @submit="submitQuotation"
        :actions="false"
        class="space-y-4"
    >
      <FormKit
          type="select"
          name="age"
          label="Age"
          validation="required"
          multiple
          class="p-2"
          :options="ageOptions"
      />
      <FormKit
          type="select"
          name="currency_id"
          label="Currency"
          validation="required"
          class="p-2"
          :options="[{value: 'EUR', label: 'EUR'}, {value: 'USD', label: 'USD'}, {value: 'CAD', label: 'CAD'}]"
      />
      <FormKit
          type="date"
          name="start_date"
          label="Start Date"
          validation="required"
          class="p-2"
      />
      <FormKit
          type="date"
          name="end_date"
          label="End Date"
          validation="required"
          class="p-2"
      />
      <FormKit type="submit" label="Submit" class="p-2"/>
    </FormKit>

    <div v-if="quotation" class="quotation-display">
      <h2>Quotation Details</h2>
      <p><strong>Total:</strong> {{ quotation.total }}</p>
      <p><strong>Currency ID:</strong> {{ quotation.currency_id }}</p>
      <p><strong>Quotation ID:</strong> {{ quotation.quotation_id }}</p>
    </div>
  </div>
</template>

<style scoped>
.form-container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

.quotation-display {
  margin-top: 2rem;
  padding: 1rem;
  border: 1px solid #ccc;
  border-radius: 4px;
  background-color: #f9f9f9;
}
</style>

