<script setup>
definePageMeta({ unauthenticatedOnly: true, navigateAuthenticatedTo: '/' })

const email = ref('')
const phone = ref('')
const password = ref('')

const { signIn, token, data, status, lastRefreshedAt } = useAuth()
async function signInWithCredentials(credentials) {
  // Probably you'll do some validation here before submitting to the backend
  // ...


  try {
    // This sends a POST request to the `auth.provider.endpoints.signIn` endpoint with `credentials` as the body
    console.log(credentials)
    await signIn(credentials, {callbackUrl: '/'})
  } catch (error) {
    console.error(error)
  }
}
</script>

<template>
  <div class="form-container">
    <FormKit
        type="form"
        id="registration-example"
        submit-label="Login"
        @submit="signInWithCredentials"
        :actions="false"
        class="m-x-4"
    >
      <FormKit
          type="text"
          name="email"
          placeholder="test@example.com"
          validation="required|email"
      />
      <div class="double">
        <FormKit
            type="password"
            name="password"
            validation="required"
            placeholder="password"
            class="m-x-4"
        />
      </div>

      <FormKit type="submit" label="Login" />
    </FormKit>
  </div>
</template>

<style scoped>
.form-container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}
</style>
