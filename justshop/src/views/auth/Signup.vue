<template>
  <section class="signup grid-center">
    <div class="signup-box">
      <router-link to="/">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          width="16"
          height="16"
          fill="currentColor"
          class="bi bi-x-lg close-signup"
          viewBox="0 0 16 16"
        >
          <path
            d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"
          />
        </svg>
      </router-link>
      <h4>Create Account</h4>
      <form @submit.prevent="registerUser">
        <div class="form-line">
          <div class="form-item">
            <input type="text" required v-model="firstName" />
            <label>First Name</label>
          </div>
          <div class="form-item">
            <input type="text" required v-model="lastName" />
            <label>Last Name</label>
          </div>
        </div>
        <div class="form-line">
          <div class="form-item">
            <input type="email" required v-model="emailAddress" />
            <label>Email Address</label>
          </div>
          <div class="form-item">
            <input
              :type="showPassword ? 'text' : 'password'"
              required
              minlength="4"
              v-model="password"
            />

            <label>Password</label>
            <svg
              @click="togglePassword"
              v-if="showPassword"
              xmlns="http://www.w3.org/2000/svg"
              width="16"
              height="16"
              fill="currentColor"
              class="bi bi-eye"
              viewBox="0 0 16 16"
            >
              <path
                d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"
              />
              <path
                d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"
              />
            </svg>

            <svg
              v-else
              @click="togglePassword"
              xmlns="http://www.w3.org/2000/svg"
              width="16"
              height="16"
              fill="currentColor"
              class="bi bi-eye-slash"
              viewBox="0 0 16 16"
            >
              <path
                d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z"
              />
              <path
                d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z"
              />
              <path
                d="M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12-.708.708z"
              />
            </svg>
          </div>
        </div>
        <div class="form-line">
          <div class="form-item">
            <input type="tel" required v-model="phoneNumber" />
            <label>Phone number</label>
          </div>
        </div>

        <div class="action-buttons">
          <action-button>
            <button-preloader v-if="userCreated" />
            <span v-else>CREATE ACCOUNT</span>
          </action-button>
        </div>
        <div class="form-footer">
          <p>Already have an account?</p>
          <router-link to="/login">LOGIN</router-link>
        </div>
      </form>
    </div>
  </section>
</template>

<script>
import ActionButton from "@/components/ActionButton.vue";
import ButtonPreloader from "@/components/preloaders/ButtonPreloader.vue";
import axios from "axios";

export default {
  components: { ActionButton, ButtonPreloader },
  name: "Signup",
  data() {
    return {
      firstName: "",
      lastName: "",
      emailAddress: "",
      password: "",
      phoneNumber: "",
      showPassword: false,
      userCreated: false,
    };
  },
  methods: {
    togglePassword() {
      this.showPassword = !this.showPassword;
    },
    async registerUser() {
      // Send a POST request
      this.userCreated = true;
      await axios({
        method: "post",
        url: "http://127.0.0.1:8001/api/register",
        data: {
          name: this.firstName,
          email: this.emailAddress,
          password: this.password,
          phone: this.phoneNumber,
        },
        headers: {
          Accept: "application/json",
        },
      })
        .then((res) => {
          if (res.status == 200) {
            this.userCreated = false;
            this.$router.push("/login");
          } else {
            throw res;
          }
        })
        .catch((err) => {
          this.userCreated = false;
          console.log(err);
          alert("An error occured. Please try again.");
        });
    },
  },
};
</script>

<style scoped>
.grid-center {
  display: grid;
  place-items: center;
}

.signup {
  background-color: var(--grey-2);
  min-height: 100vh;
  padding-inline: 20px;
}

.signup-box {
  background: whitesmoke;
  padding: 30px;
  border-radius: 10px;
  width: 60%;
  margin-inline: auto;
  position: relative;
}

.signup-box .close-signup {
  font-size: 15px;
  position: absolute;
  right: 20px;
  top: 20px;
  cursor: pointer;
}

.signup-box .close-signup:hover {
  color: var(--dim-blue);
}

.signup-box h4 {
  color: var(--brown);
}

form .form-line {
  display: flex;
  margin: 40px 0;
  gap: 20px;
}

.form-item {
  position: relative;
  height: 35px;
  width: 100%;
}

.form-item input {
  border-radius: 0px;
  resize: none;
  padding: 15px 0 10px;
  font-size: 18px;
  display: block;
  background: transparent;
  width: 100%;
  height: 100%;
  border: none;
  border-bottom: 2px solid rgba(0, 0, 0, 0.103);
}

.form-item label {
  position: absolute;
  pointer-events: none;
  font-size: 17px;
  bottom: 10px;
}

.form-item svg {
  position: absolute;
  right: 0;
  font-size: 17px;
  cursor: pointer;
  bottom: 10px;
}

.form-item input:focus {
  outline: none;
  border-bottom: 2px solid var(--brown);
  transform-origin: center;
  transition: all 0.4s ease-in-out;
}

.form-item input:focus + label,
.form-item input:valid + label {
  transform: translateY(-25px);
  color: var(--brown);
  font-size: 15px;
  transition: all 0.4s ease;
}

.form-item input:valid + label {
  color: initial;
}

.action-buttons {
  display: flex;
  flex-direction: column;
  width: 100%;
  margin-bottom: 30px;
}

.action-buttons .or {
  display: grid;
  grid-template-columns: 1fr auto 1fr;
  place-content: center;
  align-items: center;
  margin: 20px 0;
  font-size: 14px;
  gap: 5px;
  width: 100%;
  text-align: center;
}

.action-buttons button {
  width: 100%;
  position: relative;
}

.form-footer {
  text-align: center;
}

.form-footer p {
  margin-bottom: 10px;
}

.form-footer a {
  font-size: 16px;
  font-weight: 500;
}

.form-footer a:hover {
  background-color: #4e453736;
  padding: 10px 7px 6px;
  border-radius: 3px;
}

/* Responsiveness */

@media (max-width: 768px) {
  .signup-box {
    width: 100%;
  }
}
@media (max-width: 580px) {
  form .form-line {
    flex-direction: column;
    gap: 30px;
  }
  .form-item input:focus + label,
  .form-item input:valid + label {
    transform: translateY(-20px);
  }
}
</style>
